<?php /* Smarty version 2.6.26, created on 2010-04-21 21:15:48
         compiled from addedit.html */ ?>
<div id='contentSpacer'>
	<h2>Add a new bug</h2>
	<form id='frmReportBug' action='/index.php?page=addNew' method='post'>
		<div class='frmBig'>
			<label for='bugName'>Subject: </label>
			<input type='text' name='bugName' id='bugName'/>

			<label for='description'>Description: </label>
			<textarea name='description' id='description'></textarea>
		</div>
		
    <div id='validationErrors' class='validationError'>
    </div>

		<div class='frmSmall'>
			<label for='affectedVersion'>Affected version: </label>
			<input type='text' name='affectedVersion' id='addectedVersion'/>

			<label for='project'>Belongs to: </label>
			<select name='project' id='project'>
				<option>Foo</option>
				<option>Bar</option>
				<option>Beep</option>
			</select>
			
			<label for='affectedProject'>Also affects: </label>
			<select name='affectedProject' id='affectedProject'>
				<option>Foo</option>
				<option>Bar</option>
				<option>Beep</option>
			</select>
			
			<br />
			
			<label for='priority'>Priority: </label>
			<select name='priority' id='priority'>
				<option>low</option>
				<option>med</option>
				<option>high</option>
			</select>
			
			<label for='bugType'>Bug type: </label>
			<select name='bugType' id='bugType'>
				<option>defect</option>
				<option>feature</option>
				<option>patch</option>
			</select>
			
			<label for='status'>Status: </label>
			<select name='status' id='status'>
				<option>new</option>
				<option>duplicate</option>
				<option>closed</option>
			</select>
			
			<label for='keywords'>Keywords: </label>
			<input type='text' name='keywords' id='keywords' />
			
		</div>
		<button type='button' onclick='javascript:validateAddNewBug()'>
			<strong>Add</strong>
		</button>
		<button type='button' onclick='javascript:addNewCancel()'>
			<strong>Cancel</strong>
		</button>
	</form>
</div>