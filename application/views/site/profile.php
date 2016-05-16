<!DOCTYPE html>
<html>
	<head>
		<title>profile</title>
		<?php echo link_tag('css/profilecss.css'); ?>
		

		
			</head>
<body>
	<div id="container">
		<div id="navbar">
				<h2 id="company">Indiacom</h2>
				<ul>
					<!--<li><a href="#" class="tablink">upload</a></li>
					<li><a href="http://localhost:8081/ci_introl/login/logout" >log out</a>	</li>-->
					<li><a href="<?php echo base_url()?>login/upload_file">upload</a></li>
					<li><a href="http://localhost:8081/ci_introl/login/logout" >log out</a>	</li>
				</ul>
			</div>
		<div id="body">
			<div id="box1">
			<?php
//$name= $this->session->userdata('username');
echo br();
//echo nbs(10);
    echo heading("Welcome $name, Membership id=$mid",1);
//echo anchor('login/logout','Log Out');
?>
	</div>
	<div class="box2" ><?php echo heading('welcome ',1)?>;</div>	
	</div>
	
</body>
</html>
