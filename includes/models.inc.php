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

function getArrayFromResult($result){
	$rows=array();
	$index = 0;
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
	$query = "INSERT INTO `bugbase`.`bugs` (`id`, `bugName`, `description`, `affectedVersion`, `project`, `affectedProject`, `bugType`, `keywords`, `createdBy`, `createdAt`) VALUES (NULL, '{$bug['bugName']}', '{$bug['description']}', '{$bug['affectedVersion']}', '{$bug['project']}', '{$bug['affectedProject']}', '{$bug['bugType']}', '{$bug['keywords']}', '{$_SESSION['user_id']}', CURRENT_TIMESTAMP);";
	$result = mysql_query($query) or die ("Failed to insert '{$bug['bugName']}'");
	
	$new_bug_id = mysql_insert_id();
	
	$query = "INSERT INTO `bugbase`.`bughistory` (`id`, `bug_id`, `addedBy`, `timestamp`, `status`, `comment`, `assignedTo`, `priority`) VALUES (NULL, '$new_bug_id', '{$_SESSION['user_id']}', CURRENT_TIMESTAMP, '{$bug['status']}', '', '0', '{$bug['priority']}');";
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
	// A generic bug list generator, merges bug and latest bughistory by default results in all bugs
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
		
		// fill in createdBy for this bug
		$query3 = "SELECT name from `users` where `id`={$row['createdBy']};";
		$result3 = mysql_query($query3);
		if ($row3 = mysql_fetch_assoc($result3)){
			$row['createdBy'] = $row3['name'];
		} else {
			$row['createdBy'] = 'unknown';
		}
		
		// fill in affectedProject for this
		$query3 = "SELECT name from `projects` where `id`={$row['affectedProject']};";
		$result3 = mysql_query($query3);
		if ($row3 = mysql_fetch_assoc($result3)){
			$row['affectedProject'] = $row3['name'];
		} else {
			$row['affectedProject'] = '';
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

function getMyFixedBugList(){
	// CONCERN: too much redundant crap code
	$user_id = $_SESSION['user_id'];
	$filtered_query = "SELECT * FROM `bugs` where id in (select bug_id from bughistory where assignedTo = {$user_id} and status in (select id from statuses where label='fixed') group by bug_id having max(id)) order by createdAt desc;";
	$rows = getAllBugList($filtered_query);
	$filtered = array();
	$fi = 0;
	for ($i=0; $i < count($rows); $i++){
		if ($rows[$i]['status'] == 'fixed'){
			$filtered[$fi++] = $rows[$i];
		}
	}
	return $filtered;
}

function getMyOpenBugList(){
	$user_id = $_SESSION['user_id'];
	$filtered_query = "SELECT * FROM `bugs` where id in (select bug_id from bughistory where assignedTo = {$user_id} and status in (select id from statuses where label='open') group by bug_id having max(id)) order by createdAt desc;";
	$rows = getAllBugList($filtered_query);
	// TODO: fix the above WRONG query into actually resulting open bugs for user or redeign the schema to suit the purpose ... ho did someone from Yahoo say that filtering out stuff in php rather than in mysql improves speed... who was it !? bluesmoon?
	$filtered = array();
	$fi = 0;
	for ($i=0; $i < count($rows); $i++){
		if ($rows[$i]['status'] == 'open'){
			$filtered[$fi++] = $rows[$i];
		}
	}
	return $filtered;
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
	$user_id = $_SESSION['user_id'];
	$filtered_query = "SELECT * FROM `bugs` where id in (select bug_id from bughistory where assignedTo = {$user_id} and status in (select id from statuses where label='{$labelfilter}') group by bug_id having max(id)) order by createdAt desc;";
	$rows = getAllBugList($filtered_query);
	// TODO: fix the above WRONG query into actually resulting open bugs for user or redeign the schema to suit the purpose ... ho did someone from Yahoo say that filtering out stuff in php rather than in mysql improves speed... who was it !? bluesmoon?
	$filtered = array();
	$fi = 0;
	for ($i=0; $i < count($rows); $i++){
		if ($rows[$i]['status'] == $labelfilter){
			$filtered[$fi++] = $rows[$i];
		}
	}
	return count($filtered);
}

function getUserNameList(){
	// generates id, username list to be used in pages like bugpage, etc
	return getTableArray('users');
}

function getBugData($bug_id){
	$query="SELECT * from bugs where id = {$bug_id};";
	$rows = getAllBugList($query);
	return $rows;
}

function getBugHistory($bug_id){
	$query = "SELECT * from `bughistory` where bug_id={$bug_id} order by id asc;";
	$result = mysql_query($query);
	$rows = getArrayFromResult($result);
	
	for ($i=0; $i<count($rows); $i++){
		// update each numeric in these rows
		// status
		$query2 = "SELECT label from statuses where id={$rows[$i]['status']};";
		$result2 = mysql_query($query2);
		if ($row2 = mysql_fetch_array($result2)){
			$rows[$i]['status'] = $row2[0];
		}
		// priority
		$query2 = "SELECT label from priorities where id={$rows[$i]['priority']};";
		$result2 = mysql_query($query2);
		if ($row2 = mysql_fetch_array($result2)){
			$rows[$i]['priority'] = $row2[0];
		}
		// addedBy
		$query2 = "SELECT name from users where id={$rows[$i]['addedBy']};";
		$result2 = mysql_query($query2);
		if ($row2 = mysql_fetch_array($result2)){
			$rows[$i]['addedBy'] = $row2[0];
		}
		// assigned to
		$query2 = "SELECT name from users where id={$rows[$i]['assignedTo']};";
		$result2 = mysql_query($query2);
		if ($row2 = mysql_fetch_array($result2)){
			$rows[$i]['assignedTo'] = $row2[0];
		}
	}
	return $rows;
}

function addBugHistory(){
	$hist = pickFromPost(array('bug_id','addedBy','status','comment','priority','assignedTo'));
	$query = "INSERT INTO `bugbase`.`bughistory` (`bug_id`,`addedBy`,`status`,`comment`,`priority`,`assignedTo`) VALUES ({$hist['bug_id']},{$hist['addedBy']},{$hist['status']},'{$hist['comment']}',{$hist['priority']},{$hist['assignedTo']});";
	$result = mysql_query($query) or die ("Failed to update for'{$hist['bug_id']}' with '$query'");
}

function last10bugs(){
	$query = "SELECT * from bughistory where assignedTo = {$_SESSION['user_id']} order by id desc limit 10;";
	$result = mysql_query($query);
	return getArrayFromResult($result);
}

function bugsToday(){
	$query = "SELECT * FROM bughistory WHERE timestamp >= concat( DATE_SUB(curdate(), interval weekday(DATE_SUB(CURDATE(), INTERVAL 6 DAY)) DAY), ' 00:00:00') order by id desc limit 20;";
	$result = mysql_query($query);
	$today = getArrayFromResult($result);
	
	// augument the array with usernames		// these things should be more generic... reusable... etc
	for ($i=0; $i<count($today); $i++){
		$query = "SELECT * from users where id={$today[$i]['addedBy']};";
		$result = mysql_query($query);
		if ($user = mysql_fetch_assoc($result)){
			$today[$i]['addedBy'] = $user['name'];
		}
	}
	
	return $today;
}

function bugsOld(){
	$query = "SELECT * FROM bughistory WHERE timestamp < concat( DATE_SUB(curdate(), interval weekday(DATE_SUB(CURDATE(), INTERVAL 6 DAY)) DAY), ' 00:00:00') order by id desc limit 10;";
	$result = mysql_query($query);
	$old = getArrayFromResult($result);
	
	// augument the array with usernames
	for ($i=0; $i<count($old); $i++){
		$query = "SELECT * from users where id={$old[$i]['addedBy']};";
		$result = mysql_query($query);
		if ($user = mysql_fetch_assoc($result)){
			$old[$i]['addedBy'] = $user['name'];
		}
	}
	
	return $old;
}
?>
