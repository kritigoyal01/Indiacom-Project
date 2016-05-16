<div id="login_form">
	<?php 
	if(isset($account_created))
			echo heading($account_created,1);
	else
			echo heading('Login Please!',1);
	
	echo form_open('login/validate_credentials');
	echo form_input('email','Email',set_value('email'),'placeholder="Email ID"');
	echo form_password('password','','placeholder="Password" class="password"');
	echo br();
	echo form_submit('submit','Login');
	echo br();
	echo anchor('login/signup','Create Account');//
	echo form_close();
	
	
	?>
</div>
