<?php /* Smarty version 2.6.26, created on 2010-04-25 00:44:07
         compiled from home.html */ ?>
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
            <h3>You last 10 bugs</h3>
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
					<a href="#">#<?php echo $this->_tpl_vars['last10'][$this->_sections['i']['index']]['bug_id']; ?>
</a>
					<small><i><?php echo $this->_tpl_vars['last10'][$this->_sections['i']['index']]['timestamp']; ?>
</i> - <?php echo $this->_tpl_vars['last10'][$this->_sections['i']['index']]['comment']; ?>
</small>
				</p>
            <?php endfor; endif; ?>
        </div>
    </div>
    <div id='rightBox'>
        <div class='welcomeReport'>
            <h2>Activity</h2>
            <div class='activityBox'>
                <h3>Today</h3>
                <ul>
                    <li>
                        Feature #4342 (closed) by Abhishek
                    </li>
                    <li>
                        Bug #342 (commented) by Mrigank
                        <br />
                        <small> lorem ipsum dolor bla bla</small>
                    </li>
                </ul>
            </div>
            <div>
                <h3>Last week</h3>
                <ul>
                    <li>
                        Feature #4342 (closed) by Abhishek
                    </li>
                    <li>
                        Bug #342 (commented) by Mrigank
                        <br />
                        <small> lorem ipsum dolor bla bla</small>
                    </li>
                </ul>
            </div>
            <div>
                <h3>Last week</h3>
                <ul>
                    <li>
                        Feature #4342 (closed) by Abhishek
                    </li>
                    <li>
                        Bug #342 (commented) by Mrigank
                        <br />
                        <small> lorem ipsum dolor bla bla</small>
                    </li>
                </ul>
            </div>
            <div>
                <h3>Last week</h3>
                <ul>
                    <li>
                        Feature #4342 (closed) by Abhishek
                    </li>
                    <li>
                        Bug #342 (commented) by Mrigank
                        <br />
                        <small> lorem ipsum dolor bla bla</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>