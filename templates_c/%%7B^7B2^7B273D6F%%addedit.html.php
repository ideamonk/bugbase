<?php /* Smarty version 2.6.26, created on 2010-04-19 00:32:34
         compiled from addedit.html */ ?>
<div id='contentSpacer'>
	<h2>Add a new bug</h2>
	<form id='frmReportBug' action='/index.php?page=addNew' method='post'>
		<div class='frmBig'>
			<label for='bugName'>Subject: </label>
			<input type='text' name='bugName' />
			
			<label for='description'>Description: </label>
			<textarea name='description'></textarea>
		</div>
		
		<div class='frmSmall'>
			<label for='affectedVersion'>Affected version: </label>
			<input type='text' name='affectedVersion' />
			
			<label for='project'>Belongs to: </label>
			<select name='project'>
				<option>Foo</option>
				<option>Bar</option>
				<option>Beep</option>
			</select>
			
			<label for='affectedProject'>Also affects: </label>
			<select name='affectedProject'>
				<option>Foo</option>
				<option>Bar</option>
				<option>Beep</option>
			</select>
			
			<br />
			
			<label for='priority'>Priority: </label>
			<select name='priority'>
				<option>low</option>
				<option>med</option>
				<option>high</option>
			</select>
			
			<label for='bugType'>Bug type: </label>
			<select name='bugType'>
				<option>defect</option>
				<option>feature</option>
				<option>patch</option>
			</select>
			
			<label for='status'>Status: </label>
			<select name='status'>
				<option>new</option>
				<option>duplicate</option>
				<option>closed</option>
			</select>
			
			<label for='keywords'>Keywords: </label>
			<input type='text' name='keywords' />
			
		</div>
		<button type='button' onclick='javascript:validateAddNewBug()'>
			<strong>Add</strong>
		</button>
		<button type='button' onclick='javascript:addNewCancel()'>
			<strong>Cancel</strong>
		</button>
	</form>
</div>