<div id="register_form">
	<?php 
	
			echo heading('Create an Account!',1);
	
	echo form_open('login/create_member');
	echo form_input('name',set_value('name'),'placeholder="Full name" ');
	
	echo form_input('email',set_value('email'),'placeholder="Email"');echo br();
	//$sem=array('1','2','3','4','5','6');
	
	//	echo form_dropdown('semester',$sem,1);
	//echo "<span>semester</span>";echo br();

	echo form_password('password','','placeholder="Password" class="password"');
	echo form_password('password_confirm','','placeholder="Confirm Password" class="password"');
	
	echo form_submit('submit','SignUp');echo br();
	echo anchor('login','Already have an Account!');
	echo form_close();
	
	
	?>
	<?php echo validation_errors('<p class="error">');
	?>
	
</div>
