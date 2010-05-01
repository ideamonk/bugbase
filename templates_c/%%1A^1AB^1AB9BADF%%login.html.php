<?php /* Smarty version 2.6.26, created on 2010-05-01 10:38:36
         compiled from login.html */ ?>
  <div id='leftBox'>
    <div class='boxContent'>
      <img src="/static/images/bugbase_medium.png" alt='Bugbase logo' />
      <div id='welcome'>
        <h3> Welcome! </h3>
        <div class='boxContent' style="width:425px" id="__ss_3862973"><strong style="display:block;margin:12px 0 4px"><a href="http://www.slideshare.net/ideamonk/introducing-bugbase-10" title="Introducing BugBase 1.0">Introducing BugBase 1.0</a></strong><object id="__sse3862973" width="425" height="355"><param name="movie" value="http://static.slidesharecdn.com/swf/ssplayer2.swf?doc=bugbase1-100426172406-phpapp01&stripped_title=introducing-bugbase-10" /><param name="allowFullScreen" value="true"/><param name="allowScriptAccess" value="always"/><embed name="__sse3862973" src="http://static.slidesharecdn.com/swf/ssplayer2.swf?doc=bugbase1-100426172406-phpapp01&stripped_title=introducing-bugbase-10" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="355"></embed></object><div style="padding:5px 0 12px">View more <a href="http://www.slideshare.net/">presentations</a> from <a href="http://www.slideshare.net/ideamonk">Abhishek Mishra</a>.</div></div>
        
      </div>
    </div>
  </div>
  <div id='rightBox'>
    <div class='boxContent'>
      <form id='loginForm' method='post' action='/index.php?page=confirm'>
		<h3>Login</h3>
        <label for='username'>Username: </label>
        <input type='text' name='username' />
        <label for='password'>Password: </label>
        <input type='password' name='password'/>
        <?php if (isset ( $this->_tpl_vars['login_error'] )): ?>
			<div class='errorflash'> <?php echo $this->_tpl_vars['login_error']; ?>
 </div>
        <?php endif; ?>
        <button type='submit'> Login </button>
        <span>
          <a href='javascript:$("#regForm").show("medium");$("#loginForm").hide()' title="Don't have an account? Just create one.">Register new account</a>
        </span>
      </form>
      
      <form id='regForm' method='post' action='/index.php?page=regUser'>
		<h3>Register</h3>
		<label for='name'>Your name: </label>
        <input type='text' name='name' />
        <label for='username'>New Username: </label>
        <input type='text' name='username' />
        <label for='password'>Password: </label>
        <input type='password' name='password'/>
        <label for='email'>Email id: </label>
        <input type='text' name='email'/>
        <button type='submit'> Register </button>
        <span>
          <a href='javascript:$("#regForm").hide("fast");$("#loginForm").show("medium")'>hide</a>
        </span>
      </form>
      <?php if (isset ( $this->_tpl_vars['reg_error'] )): ?>
			<div class='errorflash'> <?php echo $this->_tpl_vars['reg_error']; ?>
 </div>
      <?php endif; ?>
      <?php if (isset ( $this->_tpl_vars['reg_success'] )): ?>
			<div class='successflash'> <?php echo $this->_tpl_vars['reg_success']; ?>
 </div>
      <?php endif; ?>
    </div>
    <div class='boxContent'>
		Currently tracking XXX bugs in Y projects, managed by ZZZ users 
    </div>
  </div>