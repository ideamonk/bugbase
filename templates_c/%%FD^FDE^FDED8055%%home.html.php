<?php /* Smarty version 2.6.26, created on 2010-04-25 13:02:22
         compiled from home.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'home.html', 18, false),array('modifier', 'escape', 'home.html', 18, false),array('modifier', 'date_format', 'home.html', 34, false),)), $this); ?>
<div id='contentSpacer'>
    <div id='leftBox'>
        <div class='welcomeReport'>
            <h3>
                Hi <a href='#'> <?php echo $this->_tpl_vars['user_fullname']; ?>
 </a> !
            </h3>
            <p class='userOpen'>
                You have <a href='/index.php?page=list&filter=self_open'><?php echo $this->_tpl_vars['my_open_count']; ?>
</a> open bugs assigned to you.
            </p>
            <p class='userClose'>
                So far, you have fixed <a href='/index.php?page=list&filter=self_fixed'><?php echo $this->_tpl_vars['my_fixed_count']; ?>
</a> bugs.
            </p>
            <br />
            <h3>You've been upto -</h3>
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['last10']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<p>
					<a href="/index.php?page=bug&bug_id=<?php echo $this->_tpl_vars['last10'][$this->_sections['i']['index']]['bug_id']; ?>
">#<?php echo $this->_tpl_vars['last10'][$this->_sections['i']['index']]['bug_id']; ?>
</a>
					<small><i><?php echo $this->_tpl_vars['last10'][$this->_sections['i']['index']]['timestamp']; ?>
</i> - <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['last10'][$this->_sections['i']['index']]['comment'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100, "...") : smarty_modifier_truncate($_tmp, 100, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</small>
				</p>
            <?php endfor; endif; ?>
        </div>
    </div>
    <div id='rightBox'>
        <div class='welcomeReport'>
            <h2>Activity</h2>
            <div class='activityBox' style='background:#fff;'>
                <h3>Today</h3>
                <ul>
					<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['bugsToday']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<li>
							<a href="/index.php?page=bug&bug_id=<?php echo $this->_tpl_vars['bugsToday'][$this->_sections['i']['index']]['bug_id']; ?>
">
								#<?php echo $this->_tpl_vars['bugsToday'][$this->_sections['i']['index']]['bug_id']; ?>

							</a> by <span class='bluebox'><small><?php echo $this->_tpl_vars['bugsToday'][$this->_sections['i']['index']]['addedBy']; ?>
</small></span>
							<small><i><?php echo ((is_array($_tmp=$this->_tpl_vars['bugsToday'][$this->_sections['i']['index']]['timestamp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%H:%M %p') : smarty_modifier_date_format($_tmp, '%H:%M %p')); ?>
</i> 
							<br />
							<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['bugsToday'][$this->_sections['i']['index']]['comment'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100, "...") : smarty_modifier_truncate($_tmp, 100, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</small>
						</li>
					<?php endfor; endif; ?>
                </ul>
            </div>
            <div class='activityBox' style='background:#fff;'>
                <h3>Previously</h3>
                <ul>
                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['bugsOld']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<li>
							<a href="/index.php?page=bug&bug_id=<?php echo $this->_tpl_vars['bugsToday'][$this->_sections['i']['index']]['bug_id']; ?>
">
								#<?php echo $this->_tpl_vars['bugsOld'][$this->_sections['i']['index']]['bug_id']; ?>

							</a> by <span class='bluebox'><small><?php echo $this->_tpl_vars['bugsOld'][$this->_sections['i']['index']]['addedBy']; ?>
</small></span>
							<small><i><?php echo $this->_tpl_vars['bugsOld'][$this->_sections['i']['index']]['timestamp']; ?>
</i> - <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['bugsOld'][$this->_sections['i']['index']]['comment'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100, "...") : smarty_modifier_truncate($_tmp, 100, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</small>
						</li>
					<?php endfor; endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>