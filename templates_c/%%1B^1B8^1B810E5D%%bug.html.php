<?php /* Smarty version 2.6.26, created on 2010-04-25 11:21:14
         compiled from bug.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'bug.html', 39, false),)), $this); ?>
<div id='contentSpacer' class='bugContainer'>
	<h2><?php echo $this->_tpl_vars['bugdata'][0]['bugType']; ?>
 #<?php echo $this->_tpl_vars['bugdata'][0]['id']; ?>
</h2>
	<div class='bug_desc'>
		<h3><?php echo $this->_tpl_vars['bugdata'][0]['bugName']; ?>
</h3>
		<div>
			<?php echo $this->_tpl_vars['bugdata'][0]['description']; ?>

		</div>
		<div class='bug_desc_end'>
			<p>Created by <span><?php echo $this->_tpl_vars['bugdata'][0]['createdBy']; ?>
</span></p>
			<p>at <span><?php echo $this->_tpl_vars['bugdata'][0]['createdAt']; ?>
</span></p>
			<?php if (( $this->_tpl_vars['bugdata'][0]['affectedVersion'] != '' )): ?>
				<p>affects version 
					<span><?php echo $this->_tpl_vars['bugdata'][0]['affectedVersion']; ?>
</span>
				</p>
			<?php endif; ?>
			<?php if (( $this->_tpl_vars['bugdata'][0]['affectedProject'] != '' )): ?>
				<p>
					<?php if (( $this->_tpl_vars['bugdata'][0]['affectedVersion'] != '' )): ?> and <?php else: ?> affects <?php endif; ?>the project <span><?php echo $this->_tpl_vars['bugdata'][0]['affectedProject']; ?>
</span>
				</p>
			<?php endif; ?>
			<p>Keywords <span><?php echo $this->_tpl_vars['bugdata'][0]['keywords']; ?>
</span></p>
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
				
				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['bughistory']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<li class='<?php echo ((is_array($_tmp=$this->_tpl_vars['bughistory'][$this->_sections['i']['index']]['status'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '') : smarty_modifier_replace($_tmp, ' ', '')); ?>
'>
						<div class='h_rid'> #<?php echo $this->_sections['i']['index']+1; ?>
 </div>
						<div class='h_status'> <?php echo $this->_tpl_vars['bughistory'][$this->_sections['i']['index']]['status']; ?>
 </div>
						<div class='h_priority'> <?php echo $this->_tpl_vars['bughistory'][$this->_sections['i']['index']]['priority']; ?>
 </div>
						<div class='h_commenter'> <?php echo $this->_tpl_vars['bughistory'][$this->_sections['i']['index']]['addedBy']; ?>
 </div>
						<div class='h_owner'> <?php if (( $this->_tpl_vars['bughistory'][$this->_sections['i']['index']]['assignedTo'] != '0' )): ?> <?php echo $this->_tpl_vars['bughistory'][$this->_sections['i']['index']]['assignedTo']; ?>
 <?php else: ?> no one <?php endif; ?> </div>
						<div class='h_timestamp'> <?php echo $this->_tpl_vars['bughistory'][$this->_sections['i']['index']]['timestamp']; ?>
 </div>
					</li>
					<?php if (( $this->_tpl_vars['bughistory'][$this->_sections['i']['index']]['comment'] != '' )): ?>
						<li class='h_comment'>
							<p>
								<span class='bluebox'><?php echo $this->_tpl_vars['bughistory'][$this->_sections['i']['index']]['addedBy']; ?>
</span> says:
								<span class='h_comment_text'><?php echo $this->_tpl_vars['bughistory'][$this->_sections['i']['index']]['comment']; ?>
</span>
							</p>
						</li>
					<?php endif; ?>
				<?php endfor; endif; ?>
			</ul>
		</div>
	
		<div class='h_revisionbox'>
			<div id='validationErrors' class='validationError'></div>
			<h3>Add a new revision</h3>
			<form action='/index.php?page=updateBug' method='post' id='frmBugStatus'>
				<input type='hidden' value='<?php echo $this->_tpl_vars['bugdata'][0]['id']; ?>
' name='bug_id' />
				<input type='hidden' value='<?php echo $this->_tpl_vars['user_id']; ?>
' name='addedBy' />
				<div id='buglist'>
					<ul>
						<li class='heading'>
							<div class='h_rid'> Rev. id </div>
							<div class='h_status'> Status </div>
							<div class='h_priority'> Priority </div>
							<div class='h_commenter'> Revised by </div>
							<div class='h_owner'> Assigned to </div>
							<div class='h_timestamp'> Updated at </div>
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
' <?php if (( $this->_tpl_vars['statuses'][$this->_sections['i']['index']]['label'] == $this->_tpl_vars['bugdata'][0]['status'] )): ?> selected <?php endif; ?> ><?php echo $this->_tpl_vars['statuses'][$this->_sections['i']['index']]['label']; ?>
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
' <?php if (( $this->_tpl_vars['priorities'][$this->_sections['i']['index']]['label'] == $this->_tpl_vars['bugdata'][0]['priority'] )): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['priorities'][$this->_sections['i']['index']]['label']; ?>
</option>
									<?php endfor; endif; ?>
								</select>
							</div>
							<div class='h_commenter'> <span class='greenbox'>Abhishek</span> </div>
							<div class='h_owner'>s
								<select name='assignedTo'>
									<option value='0'>no one</option>
									<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
										<option value='<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['id']; ?>
' <?php if (( $this->_tpl_vars['users'][$this->_sections['i']['index']]['id'] == $this->_tpl_vars['bugdata'][0]['assignedTo'] )): ?> selected <?php endif; ?> ><?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['name']; ?>
</option>
									<?php endfor; endif; ?>
								</select>
							</div>
							<div class='h_timestamp'> <span class='greenbox'>right now</span> </div>
							
							<div id='h_rev_comment'>
								<h4>Comment:</h4>
								<textarea name='comment' id='txtComment'></textarea>
							</div>
							<button type='button' onclick='javascript:validateBugStatus()'>
								<strong>Add</strong>
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