<?php /* Smarty version 2.6.26, created on 2010-04-18 15:38:42
         compiled from header.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>BugBase - <?php echo $this->_tpl_vars['subtitle']; ?>
</title>

  <!-- Stylesheets, javascripts -->
  <link rel="stylesheet" href="/static/style.css" type="text/css" media="screen" title="bugbase stylesheet" charset="utf-8" />
  <script src="static/scripts/jquery-1.3.2.min.js" type="text/javascript" language="javascript" charset="utf-8"></script>
  <script src="/static/scripts/bugbase.js" type="text/javascript" language="javascript" charset="utf-8" ></script>
  
  <!--[if IE 6]>
    <script src="static/scripts/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>
      DD_belatedPNG.fix('div');
      DD_belatedPNG.fix('img');
      DD_belatedPNG.fix('a');
    </script>
  <![endif]-->

  <!--  page specifig js    -->
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['scripts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['scripts'][$this->_sections['i']['index']]; ?>
" ></script>
    <?php endfor; endif; ?>
</head>

<body>
<div id='wrapper'>
  <div id='headarea'>
    <div id='topmenu'>
		<?php if (isset ( $this->_tpl_vars['user_id'] )): ?>
		<a href='#'><?php echo $this->_tpl_vars['user_name']; ?>
</a> | <a href='/index.php?page=logout'>logout</a>
		<?php endif; ?>
    </div>
    <div id='headcontent'>
      
    </div>
  </div>
  <!-- end of #headarea -->
  
  <div id='content'>
    