<?php /* Smarty version 2.6.26, created on 2010-04-25 15:08:21
         compiled from projectlist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'projectlist.html', 14, false),array('modifier', 'date_format', 'projectlist.html', 26, false),)), $this); ?>
<div id='contentSpacer'>
	<h2><?php echo $this->_tpl_vars['project_heading']; ?>
</h2>
	<div id='buglist'>
		<ul>
			<li class='heading'>
				<div class='l_pid'> Id </div>
				<div class='l_projectname'> Project name </div>
				<div class='l_owner'> Owner </div>
				<div class='l_open'> Open bugs </div>
				<div class='l_keywords'> Keywords </div>
			</li>
			<!--
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['buglist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<li class='<?php echo ((is_array($_tmp=$this->_tpl_vars['buglist'][$this->_sections['i']['index']]['status'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '') : smarty_modifier_replace($_tmp, ' ', '')); ?>
' 
					<?php if (( isset ( $this->_tpl_vars['highlight'] ) && $this->_tpl_vars['highlight'] == $this->_tpl_vars['buglist'][$this->_sections['i']['index']]['id'] )): ?> id='highlighted' <?php endif; ?>>
				<div class='l_bid'> #<?php echo $this->_tpl_vars['buglist'][$this->_sections['i']['index']]['id']; ?>
 </div>
				<div class='l_subject'> 
					<a href='/index.php?page=showbug&id=<?php echo $this->_tpl_vars['buglist'][$this->_sections['i']['index']]['id']; ?>
'>
						<?php echo $this->_tpl_vars['buglist'][$this->_sections['i']['index']]['bugName']; ?>
 
					</a>
				</div>
				<div class='l_status'> <?php echo $this->_tpl_vars['buglist'][$this->_sections['i']['index']]['status']; ?>
 </div>
				<div class='l_affects'><?php echo $this->_tpl_vars['buglist'][$this->_sections['i']['index']]['project_name']; ?>
</div>
				<div class='l_priority'> <?php echo $this->_tpl_vars['buglist'][$this->_sections['i']['index']]['priority']; ?>
 </div>
				<div class='l_category'> <?php echo $this->_tpl_vars['buglist'][$this->_sections['i']['index']]['bugType']; ?>
 </div>
				<div class='l_lastupdate'> <?php echo ((is_array($_tmp=$this->_tpl_vars['buglist'][$this->_sections['i']['index']]['timestamp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
 </div>
			<?php endfor; endif; ?>
			-->
			
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['projectlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<li class='l_project'>
					<div class='l_pid'> #<?php echo $this->_tpl_vars['projectlist'][$this->_sections['i']['index']]['id']; ?>
 </div>
					<div class='l_projectname'>
						<a href='/index.php?page=list&filter=project&project_id=<?php echo $this->_tpl_vars['projectlist'][$this->_sections['i']['index']]['id']; ?>
'>
							<?php echo $this->_tpl_vars['projectlist'][$this->_sections['i']['index']]['name']; ?>

						</a>
					</div>
					<div class='l_owner'><?php echo $this->_tpl_vars['projectlist'][$this->_sections['i']['index']]['owner']; ?>
</div>
					<div class='l_open'><?php echo $this->_tpl_vars['projectlist'][$this->_sections['i']['index']]['open_count']; ?>
</div>
					<div class='l_keywords'><?php echo $this->_tpl_vars['projectlist'][$this->_sections['i']['index']]['keywords']; ?>
</div>
				</li>
			<?php endfor; endif; ?>
		</ul>
	</div>
	
	<?php if (( $this->_tpl_vars['isadmin'] == '1' )): ?>
	<div class='h_revisionbox'>
			<div id='validationErrors' class='validationError'></div>
			<h3>Add a new project</h3>
			<form action='/index.php?page=addProject' method='post' id='frmAddProject'>
				<div id='buglist'>
					<ul>
						<li class='heading'>
							<div class='l_pid'> id </div>
							<div class='l_projectname'> Project name </div>
							<div class='l_owner'> Owner </div>
							<div class='l_open'> Open bugs </div>
							<div class='l_keywords'> Keywords </div>
						</li>
						
						<li class='heading'>
							<div class='l_pid'> * </div>
							<div class='l_projectname'>
								<input type='text' name='name' id='txtName'/>
							</div>
							<div class='l_owner'>
								<select name='owner'>
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
							<div class='l_open'> <span class='greenbox'>none</span> </div>
							<div class='l_keywords'>
								<input type='text' name='keywords'  id='txtKeyword'/>
							</div>
							
							<div id='h_rev_comment'>
								<h4>Description:</h4>
								<textarea name='description' id='txtComment'></textarea>
							</div>
							<button type='button' onclick='javascript:validateNewProject()'>
								<strong>Add</strong>
							</button>
						</li>
					</ul>
				</div>
			</form>
		</div>
	<?php endif; ?>
</div>