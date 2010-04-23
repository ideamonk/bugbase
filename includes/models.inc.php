<?php
// Reusable db code to be used in the main controllers

function getTableArray($tablename){
	$rows = array();
	$index = 0;
	$query = "SELECT * from $tablename;";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
		$rows[$index++] = $row;
	}
	return $rows;
}

function pickFromPost($values){
	// picks values from POST and returns an associative array
	$a = array();
	foreach ($values as $key){
		$a[$key] = $_POST[$key];
	}
	return $a;
}

function addNewBug(){
	$bug = pickFromPost(array('bugName','description','affectedVersion',
								'project','affectedProject','priority',
										'bugType','status','keywords'));
	$query = "INSERT INTO `bugbase`.`bugs` (`id`, `bugName`, `description`, `affectedVersion`, `project`, `affectedProject`, `bugType`, `keywords`, `createdBy`, `createdAt`) VALUES (NULL, '{$bug['bugName']}', '{$bug['description']}', '{$bug['affectedVersion']}', '{$bug['project']}', '{$bug['affectedProject']}', '{$bug['bugType']}', '{$bug['keywords']}', '{getCurrentUid()}', CURRENT_TIMESTAMP);";
	$result = mysql_query($query) or die ("Failed to insert '{$bug['bugName']}'");
	
	$new_bug_id = mysql_insert_id();
	
	$query = "INSERT INTO `bugbase`.`bughistory` (`id`, `bug_id`, `addedBy`, `timestamp`, `status`, `comment`, `assignedTo`, `priority`) VALUES (NULL, '$new_bug_id', '{getCurrentUid()}', CURRENT_TIMESTAMP, '{$bug['status']}', '', '', '{$bug['priority']}');";
	$result = mysql_query($query) or die ("Failed to insert '{$bug['bugName']}'");
	
	return $new_bug_id;
}

function getNewFormData(){
	// generates form data for new bug report form
	$formdata = array ( 'projects' => getTableArray('projects'),
						'priorities' => getTableArray('priorities'),
						'statuses' => getTableArray('statuses'),
						'categories' => getTableArray('categories')
					);
	
	return $formdata;
}

function getAllBugList($myquery=""){
	// A generic bug list generator, by default results in all bugs
	$buglist = array();
	$index = 0;
	
	$query = "SELECT * FROM `bugs` order by createdAt desc;";
	if ($myquery != ""){
		$query = $myquery;
	}
	
	$result = mysql_query($query) or die ("Failed to fetch bug list");
	
	while ($row = mysql_fetch_assoc($result)){
		// augument a row with latest bughistory info
		$query2 = "SELECT * from `bughistory` where bug_id = '{$row['id']}' order by timestamp desc;";
		$result2 = mysql_query($query2);
		if ($row2 = mysql_fetch_assoc($result2)){
			foreach ($row2 as $key=>$val){
				// merge both assoc arrays
				if ($key!='id'){
					$row[$key] = $val;
				}
			}
		}
		
		// fill in status of this row
		$query3 = "SELECT `label` from `statuses` where `id`='{$row['status']}';";
		$result3 = mysql_query($query3);
		if ($row3 = mysql_fetch_assoc($result3)){
			$row['status'] = $row3['label'];
		} else {
			$row['status'] = 'undefined';
		}
		
		// fill in priority of this row
		$query3 = "SELECT `label` from `priorities` where `id`='{$row['priority']}';";
		$result3 = mysql_query($query3);
		if ($row3 = mysql_fetch_assoc($result3)){
			$row['priority'] = $row3['label'];
		} else {
			$row['priority'] = ' ';
		}
		
		// fill in category of this row
		$query3 = "SELECT `label` from `categories` where `id`='{$row['bugType']}';";
		$result3 = mysql_query($query3);
		if ($row3 = mysql_fetch_assoc($result3)){
			$row['bugType'] = $row3['label'];
		} else {
			$row['bugType'] = 'unknown';
		}
		
		// fill in project name of this row
		$query3 = "SELECT name from `projects` where `id`='{$row['project']}';";
		$result3 = mysql_query($query3);
		if ($row3 = mysql_fetch_assoc($result3)){
			$row['project_name'] = $row3['name'];
		} else {
			$row['project_name'] = 'unknown';
		}
		
		$buglist[$index++] = $row;				// add this row to buglist
	}
	return $buglist;
}


function getMyBugList(){
	$user_id = $_SESSION['user_id'];
	$filtered_query = "SELECT * FROM `bugs` where id in (select  bug_id from bughistory where assignedTo = {$user_id}) order by createdAt desc;";
	return getAllBugList($filtered_query);
}

function getProjectList(){
	$projectlist = array();
	$index = 0;
	
	$query = "SELECT * FROM `projects` order by id asc;";
	$result = mysql_query($query) or die ("Failed to fetch project list");
	
	while ($row = mysql_fetch_assoc($result)){
		// augument a row with open bugs count
		$query2 = "SELECT count(id) from `bughistory` where `bug_id` in (SELECT id from `bugs` where  `project`={$row['id']}) and `status` in (SELECT `id` from `statuses` where label='open');";
		$result2 = mysql_query($query2);
		if ($row2 = mysql_fetch_array($result2)){
			$row['open_count'] = $row2[0];
		}
		
		// augument a row with project owner name
		$query2 = "SELECT name from users where id={$row['owner']};";
		$result2 = mysql_query($query2);
		if ($row2 = mysql_fetch_array($result2)){
			$row['owner'] = $row2[0];
		}
		$projectlist[$index++] = $row;
	}
	return $projectlist;
}


function getMyBugCount($labelfilter){
	// generic bug counter for user, counts according to status label.
	$query = "SELECT count(id) from `bughistory` where `assignedTo`={$_SESSION['user_id']} and `status` = (select id from statuses where label='{$labelfilter}') group by bug_id;";
	$result = mysql_query($query);
	return mysql_num_rows($result);
}
