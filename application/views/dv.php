<!--
	
	#include views/site/profile_header.pho
	<!DOCTYPE html>
<html>
	<head>
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
</script>
	</head>
	
<body>
-->
<h3>Choose your category and fill respective form</h3>
	<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#student">Student</a></li>
        <li><a href="#Alumini">Alumini</a></li>
        <li><a href="#FAuthor">Foreign Author</a></li>
        <li><a href="#PBody">Professional Body</a></li>
    </ul>

    <div class="tab-content">
        <div id="student" class="tab active">
        	 <?php echo validation_errors('<p class="error">'); ?>
        	<?php echo $error;?>
            <?php
            //$data=array('onsubmit'=>"validateForm()",'name'=>"student_form");
          echo form_open_multipart('verification/student_vf');
          $input_id=array(
		  					'name'=>'id',
		  					'required'=>'required',
		  					'type'=>'number',
		  					'style'=>'width:250px'
							);
		   echo form_input($input_id,set_value('id'),'placeholder="Enter roll no(number only)" ');echo br();echo br();
		   echo form_hidden('category','student');
		   echo form_label('upload student IDcard photo(jpg,jpeg,png)');echo br();echo br();
		   $input_upload=array(
		   						 'type'=>"file" ,
		   						 'name'=>"file",
								 'required'=>'required');
		   echo form_upload($input_upload);echo br();echo br();
		  echo form_submit('studentsubmit','submit details');echo br();echo br();
		  echo form_close();
            ?>
                 
	
	
        </div>

        <div id="Alumini" class="tab">
            <?php
           echo form_open_multipart('verification/alumini_vf'); 
           $input_id=array(
		  					'name'=>'id',
		  					'required'=>'required',
		  					'type'=>'number',
		  					'style'=>'width:250px'
							);
		   echo form_input($input_id,set_value('id'),'placeholder="Enter roll no(number only)" ');echo br();echo br();
		   echo form_hidden('category','alumini');
		   echo form_label('Upload alumini certificate photo(jpg,jpeg,png)');echo br();echo br();
		   $input_upload=array(
		   						 'type'=>"file" ,
		   						 'name'=>"file",
								 'required'=>'required');
		   echo form_upload($input_upload);echo br();echo br();
		  echo form_submit('aluminisubmit','submit details');echo br();echo br();
		  echo form_close();
            ?>
        </div>

        <div id="FAuthor" class="tab">
            <?php
           echo form_open_multipart('verification/fauthor_vf');
		   //echo form_input('id',set_value('rollno'),'placeholder="Enter your ID no" ');echo br();echo br();
		   echo form_hidden('category','Foreign Author');
		   echo form_label('Upload passport photo(jpg,jpeg,png)');echo br();echo br();
		   $input_upload=array(
		   						 'type'=>"file" ,
		   						 'name'=>"file",
								 'required'=>'required');
		   echo form_upload($input_upload);echo br();echo br();
		  echo form_submit('fauthorsubmit','submit details');echo br();echo br();
		  echo form_close();
            ?>
        </div>

        <div id="PBody" class="tab">
            <?php
           echo form_open_multipart('verification/pbody_vf');
		   $input_id=array(
		  					'name'=>'id',
		  					'required'=>'required',
		  					'type'=>'text',
		  					'style'=>'width:250px'
							);
		   echo form_input($input_id,set_value('id'),'placeholder="Enter ID" ');echo br();echo br();
		   echo form_hidden('category','Professional Body');
		   $sub_cat=array('IEEE'=>'IEEE','ISTE'=>'ISTE','CSI'=>'CSI','ICT'=>'ICT');
		   echo form_dropdown('sub_category',$sub_cat,'None');echo br();
		   echo form_label('Upload Membership ID photo(jpg,jpeg,png)');echo br();echo br();
		   $input_upload=array(
		   						 'type'=>"file" ,
		   						 'name'=>"file",
								 'required'=>'required',
								 'required pattern'=>"[a-zA-Z0-9]+");
		   echo form_upload($input_upload);echo br();echo br();
		  echo form_submit('pbodysubmit','submit details');echo br();echo br();
		  echo form_close();
            ?>
            <?php echo validation_errors('<p class="error">');
	?>
        </div>
        <p><?php echo anchor('login/profile_open', 'Back to Profile!'); ?></p>

    </div>
</div>
	</body>
	</html>