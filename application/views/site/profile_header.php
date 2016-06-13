<!DOCTYPE html>
<html>
	<head>
		<title>profile</title>
		<?php echo link_tag('css/profilecss.css'); ?>
		<title>DocumentVerification</title>
		<?php echo link_tag('css/style2.css');?> 
<script src="<?php echo base_url();?>jquery-2.2.4.js">
</script>
<script>
	jQuery(document).ready(function()
	 {
   
   	 jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });
});
function validateForm() {
    var x = document.forms["student_form"]["id"].value;
    if (x == null || x == "") {
        alert("ID must be filled out");
        return false;
    }
}
</script>

		
			</head>
<body>
	<div id="container">
		<div id="navbar">
				<h2 id="company"><a href="<?php echo base_url()?>login/profile_open">Indiacom</h2>
				<ul>
					<!--<li><a href="#" class="tablink">upload</a></li>
					<li><a href="http://localhost:8081/ci_introl/login/logout" >log out</a>	</li>-->
					<li><a href="<?php echo base_url()?>verification">Document upload</a></li>
					<li><a href="<?php echo base_url()?>upload">research paper upload</a></li>
					<li><a href="http://localhost:8081/ci_introl/login/logout" >log out</a>	</li>
				</ul>
			</div>
	<!--	<div id="body">
			<div id="box1">
				
</div>
	<div class="box2" ><?php echo heading('welcome ',1)?>;</div>	
	</div>
	-->