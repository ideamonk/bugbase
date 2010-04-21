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

function getAllBugList(){
	$buglist = array();
	$index = 0;
	
	$query = "SELECT * FROM `bugs`;";
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
