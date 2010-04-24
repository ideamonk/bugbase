<?php /* Smarty version 2.6.26, created on 2010-04-24 18:34:36
         compiled from bug.html */ ?>
<div id='contentSpacer' class='bugContainer'>
	<h2>Bug/Feature/Defect #3424</h2>
	<div class='bug_desc'>
		<h3>Foo doesn't work under linux</h3>
		<div>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
		<div class='bug_desc_end'>
			<p>Created by <span>Abhishek</span></p>
			<p>Created on <span>Sat Apr 24 11:35:30 IST 2010</span></p>
			<p>Keywords <span>foo</span><span>bar</span></p>
		</div>
	</div>
	
	<div class='bughistory'>
		<h3>Bug history</h3>
		<div id='buglist'>
			<ul>
				<li class='heading'>
					<div class='h_rid'> Rev. id </div>
					<div class='h_status'> Status </div>
					<div class='h_priority'> Priority </div>
					<div class='h_commenter'> Revised by </div>
					<div class='h_owner'> Assigned to </div>
					<div class='h_timestamp'> Updated on </div>
				</li>
				
				<li class='open'>
					<div class='h_rid'> #1 </div>
					<div class='h_status'> open </div>
					<div class='h_priority'> low </div>
					<div class='h_commenter'> Abhishek Mishra </div>
					<div class='h_owner'> Ram Kumar </div>
					<div class='h_timestamp'> Sat Apr 24 12:02:26 IST 2010 </div>
				</li>
				<li class='h_comment'>
					<p>
						<span class='bluebox'>Abhishek</span> says:
						this bug needs to be fixed immediately.
					</p>
				</li>
				
				<li class='fixed'>
					<div class='h_rid'> #1 </div>
					<div class='h_status'> open </div>
					<div class='h_priority'> low </div>
					<div class='h_commenter'> Abhishek Mishra </div>
					<div class='h_owner'> Ram Kumar </div>
					<div class='h_timestamp'> Sat Apr 24 12:02:26 IST 2010 </div>
				</li>
				<li class='h_comment'>
					<p>
						<span class='bluebox'>Abhishek</span> says:
						this bug needs to be fixed immediately.
					</p>
				</li>
			</ul>
		</div>
		<div class='h_revisionbox'>
			<h3>Add a new revision</h3>
			<form action='/index.php?page=updateBug' method='post'>
				<div id='buglist'>
					<ul>
						<li class='heading'>
							<div class='h_rid'> Rev. id </div>
							<div class='h_status'> Status </div>
							<div class='h_priority'> Priority </div>
							<div class='h_commenter'> Revised by </div>
							<div class='h_owner'> Assigned to </div>
							<div class='h_timestamp'> Updated on </div>
						</li>
						<li class=''>
							<div class='h_rid'> #10 </div>
							<div class='h_status'>
								<select name='status' id='status'>
									<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['statuses']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
										<option value='<?php echo $this->_tpl_vars['statuses'][$this->_sections['i']['index']]['id']; ?>
'><?php echo $this->_tpl_vars['statuses'][$this->_sections['i']['index']]['label']; ?>
</option>
									<?php endfor; endif; ?>
								</select>
							</div>
							<div class='h_priority'>
								<select name='priority' id='priority'>
									<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['priorities']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
										<option value='<?php echo $this->_tpl_vars['priorities'][$this->_sections['i']['index']]['id']; ?>
'><?php echo $this->_tpl_vars['priorities'][$this->_sections['i']['index']]['label']; ?>
</option>
									<?php endfor; endif; ?>
								</select>
							</div>
							<div class='h_commenter'> <span class='greenbox'>Abhishek</span> </div>
							<div class='h_owner'> Ram Kumar </div>
							<div class='h_timestamp'> <span class='greenbox'>today</span> </div>
							
							<div id='h_rev_comment'>
								<h4>Comment:</h4>
								<textarea name='txtComment' id='txtComment'></textarea>
							</div>
							<button type='button' onclick='javascript:validateAddNewBug()'>
								<strong>Add</strong>
							</button>
							<button type='button' onclick='javascript:addNewCancel()'>
								<strong>Cancel</strong>
							</button>
						</li>
					</ul>
				</div>
			</form>
		</div>
	</div>
	<!--
	<div class='statusline'>
		<p>Created - <span>Sat Apr 24 09:31:57 IST 2010</span></p>
		<p>Initial status - <span>Open</span></p>
		<p>Affected project - <span>Gwibber</span></p>
		<p>Versions affected - <span>1.2, 1.4</span></p>
		<p>Also affects - <span>gwibbly</span></p>
		<p>Priority - <span>Low</span></p>
	</div>
	-->
</div>