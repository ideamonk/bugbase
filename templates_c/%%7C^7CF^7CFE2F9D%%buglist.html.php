<?php /* Smarty version 2.6.26, created on 2010-04-24 18:23:02
         compiled from buglist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'buglist.html', 16, false),array('modifier', 'date_format', 'buglist.html', 28, false),)), $this); ?>
<div id='contentSpacer'>
	<h2><?php echo $this->_tpl_vars['buglist_heading']; ?>
</h2>
	<div id='buglist'>
		<ul>
			<li class='heading'>
				<div class='l_bid'> Bug id </div>
				<div class='l_subject'> Subject </div>
				<div class='l_status'> Status </div>
				<div class='l_affects'> Project </div>
				<div class='l_priority'> Priority </div>
				<div class='l_category'> Category </div>
				<div class='l_lastupdate'> Last updated </div>
			</li>
			
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
					<a href='/index.php?page=bug&bug_id=<?php echo $this->_tpl_vars['buglist'][$this->_sections['i']['index']]['id']; ?>
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
			
			<!-- template reference begins
			<li class='open'>
				<div class='l_bid'> #34 </div>
				<div class='l_status'> open </div>
				<div class='l_affects'> Crm4.x </div>
				<div class='l_priority'> high </div>
				<div class='l_subject'> Crashes on linux </div>
				<div class='l_category'> defect </div>
				<div class='l_lastupdate'> 23-5-10 </div>
			</li>
			
			<li class='inprogress'>
				<div class='l_bid'> #33 </div>
				<div class='l_status'> working </div>
				<div class='l_affects'> Crm4.1 </div>
				<div class='l_priority'> low </div>
				<div class='l_subject'> Crashes on linux </div>
				<div class='l_category'> defect </div>
				<div class='l_lastupdate'> 23-5-10 </div>
			</li>
			
			<li class='closed'>
				<div class='l_bid'> #31 </div>
				<div class='l_status'> closed </div>
				<div class='l_affects'> Crm4.0 </div>
				<div class='l_priority'> low </div>
				<div class='l_subject'> Crashes on linux </div>
				<div class='l_category'> defect </div>
				<div class='l_lastupdate'> 21-5-10 </div>
			</li>
			
			<li class='fixed'>
				<div class='l_bid'> #31 </div>
				<div class='l_status'> closed </div>
				<div class='l_affects'> Crm4.0 </div>
				<div class='l_priority'> low </div>
				<div class='l_subject'> Crashes on linux </div>
				<div class='l_category'> defect </div>
				<div class='l_lastupdate'> 21-5-10 </div>
			</li>
			end of template reference 
			-->
		</ul>
	</div>
</div>