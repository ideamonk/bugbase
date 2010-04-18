<?php /* Smarty version 2.6.26, created on 2010-04-18 21:56:33
         compiled from addedit.html */ ?>
<div id='contentSpacer'>
	<h3>Add a new bug</h3>
	<form id='frmReportBug' action='/index.php?page=addNew' method='post'>
		<label for='bugName'>Summary</label>
		<input type='text' name='bugName' />
		
		<label for='description'>Description</label>
		<textarea name='description'></textarea>
		
		<label for='affectedVersion'>Description</label>
		<input type='text' name='affectedVersion' />
		
		<label for='project'>Belongs to</label>
		<select name='project'>
			<option>Foo</option>
			<option>Bar</option>
			<option>Beep</option>
		</select>
		
		<label for='affectedProject'>Also affects</label>
		<select name='affectedProject'>
			<option>Foo</option>
			<option>Bar</option>
			<option>Beep</option>
		</select>
		
		<label for='priority'>Priority</label>
		<select name='priority'>
			<option>low</option>
			<option>med</option>
			<option>high</option>
		</select>
		
		<label for='bugType'>Bug type</label>
		<select name='bugType'>
			<option>defect</option>
			<option>feature</option>
			<option>patch</option>
		</select>
		
		<label for='status'>Status</label>
		<select name='status'>
			<option>new</option>
			<option>duplicate</option>
			<option>closed</option>
		</select>
		
	</form>
</div>