<?php /* Smarty version 2.6.26, created on 2010-04-18 13:12:18
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
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
      </div>
    </div>
  </div>
  <div id='rightBox'>
    <div class='boxContent'>
      <h3>Login</h3>
      <form id='loginForm' method='post' action='/index.php?page=confirm'>
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
          <a href='/index.php?page=register' title="Don't have an account? Just create one.">Register new account</a> |
          <a href='/index.php?page=forgot' title='Forgot your password?'>Forgot password?</a>
        </span>
        
      </form>
    </div>
  </div>