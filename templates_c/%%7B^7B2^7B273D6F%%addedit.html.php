<?php /* Smarty version 2.6.26, created on 2010-04-21 23:16:11
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
				<option value='1'>Foo</option>
				<option value='2'>Bar</option>
				<option value='3'>Beep</option>
			</select>
			
			<label for='affectedProject'>Also affects: </label>
			<select name='affectedProject' id='affectedProject'>
				<option value='1'>Foo</option>
				<option value='2'>Bar</option>
				<option value='3'>Beep</option>
			</select>
			
			<br />
			
			<label for='priority'>Priority: </label>
			<select name='priority' id='priority'>
				<option value='1'>low</option>
				<option value='2'>med</option>
				<option value='3'>high</option>
			</select>
			
			<label for='bugType'>Bug type: </label>
			<select name='bugType' id='bugType'>
				<option value='1'>defect</option>
				<option value='2'>feature</option>
				<option value='3'>patch</option>
			</select>
			
			<label for='status'>Status: </label>
			<select name='status' id='status'>
				<option value='1'>new</option>
				<option value='2'>duplicate</option>
				<option value='3'>closed</option>
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