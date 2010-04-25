<?php /* Smarty version 2.6.26, created on 2010-04-26 03:40:09
         compiled from login.html */ ?>
  <div id='leftBox'>
    <div class='boxContent'>
      <img src="/static/images/bugbase_medium.png" alt='Bugbase logo' />
      <div id='welcome'>
        <h3> Welcome! </h3>
        <p>
          Say hello to Bugbase. Your one stop shop for managing issues and bugs related to your project.
        </p>
        <p>
          Default admin account - admin<br />
          
        </p>
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
		Currently tracking 500 bugs in 6 projects, managed by 50 users 
    </div>
  </div>