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
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo link_tag('css/bootstrap.min.css'); ?>
	<!--   <?php echo link_tag('css/bootstrap-theme.min.css'); ?>-->
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
<div align="center"class="container">
  <h1>Check payment proof of member</h1>
    <form class="form-inline" role="form" action="<?php echo base_url().'Admin/search_member';?>" method="post">
      <div class="form-group">
   
      <?php echo form_input(array(
      							'type'=>"text",'class'=>"form-control",
      							'name'=>"search",'id'=>"search",
      							 'placeholder'=>"search by member id",
      							 'value'=>$this->input->post('search')
								));
								
	  
	  ?>
      </div>
      <button type="submit" class="btn btn-success" name="submit">
	  <span class="glyphicon glyphicon-search"></span> Search</button>
    </form>
    
	<br>
	</div>
	<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#student">All</a></li>
        <li><a href="#Alumini">Pending</a></li>
        <li><a href="#FAuthor">Verified</a></li>
        <li><a href="#PBody">Not Approved</a></li>
    </ul>

    <div class="tab-content">
        
        
        
        <div id="student" class="tab active">
       
	
       
	
	<div align="center"class="container">
	
	<form  action="" method="post">
     <table class="table">
	   <thead>
		<th>MEMBER_ID</th>
		<th>CATEGORY</th>
		<th>ID</th>
		<th>SUB CATEGORY</th>
		<th>file</th>
		<th>STATUS</th>
		<th>VERIFY</th>
	   </thead>
	   <tbody>
	   <?php if($result==null) {
		   echo "<script> alert('NOT FOUND') </script>"; ?>	   
	      <a style="float:left" href="<?php echo base_url().'Admin';?>"class="btn btn-link btn-lg">
	      <span class="glyphicon glyphicon-link"></span> go back</a>	   
	 <?php  }
	    else{ 
	    	?>
	 	 <a style="float:left" href="<?php echo base_url().'Admin';?>"class="btn btn-link btn-lg">
	      <span class="glyphicon glyphicon-link"></span> Go Back</a>
	   <?php foreach($result as $row):?>
	   
	       <tr>
			   <td><?php echo $row->mid;?></td>
			    <td><?php echo $row->category;?></td>
			   <td><?php echo $row->id;?></td>
			   <td><?php echo $row->sub_category;?></td>
			   
			 
			   <td>
			   		<a href = "<?php echo base_url('uploads/document_verification/'.$row->upload_name);?>" class = "btn btn-info btn-sm" target="_blank">
				   <span class="glyphicon glyphicon-open"></span> open</a>
			   	<!--a href="" >click here to view pdf.</a>-->
			   </td>
			   <!--  target="_blank" opens the jpg,pdf etc in new tab--> 
			   
				
				<td>
				<?php echo $row->status;?>
				 </td>
				 
				 <td>
				   <a href="<?php echo base_url('admin/update_status_request/'.$row->mid.'/'.$row->id);?>"class="btn btn-info btn-sm">
				   <span class="glyphicon glyphicon-check"></span> UPDATE</a>
				</td>
			</tr>
	   <?php endforeach;
	   } ?>
		</tbody>
	   </table>
	 
	   </form>
	  <br>
	  <br>
	    </div>
</div>


<!--<h3>Choose your category and fill respective form</h3>-->
	<!--<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#student">All</a></li>
        <li><a href="#Alumini">Pending</a></li>
        <li><a href="#FAuthor">Verified</a></li>
        <li><a href="#PBody">Not Approved</a></li>
    </ul>

    <div class="tab-content">
        <div id="student" class="tab active">
       
	
        </div>
-->
	
        <div id="Alumini" class="tab">
           <div align="center"class="container">
	
	<form  action="" method="post">
     <table class="table">
	   <thead>
		<th>MEMBER_ID</th>
		<th>CATEGORY</th>
		<th>ID</th>
		<th>SUB CATEGORY</th>
		<th>file</th>
		<th>STATUS</th>
		<th>VERIFY</th>
	   </thead>
	   <tbody>
	  <?php if($pending==null) {
		  // echo "<script> alert('NOT FOUND') </script>"; ?>	   
	      <a style="float:left" href="<?php echo base_url().'Admin';?>"class="btn btn-link btn-lg">
	      <span class="glyphicon glyphicon-link"></span> go back</a>	   
	 <?php  }
	    else{ 
	    	?>
	 	 <a style="float:left" href="<?php echo base_url().'Admin';?>"class="btn btn-link btn-lg">
	      <span class="glyphicon glyphicon-link"></span> Go Back</a>
	   <?php foreach($pending as $row):?>
	   
	       <tr>
			   <td><?php echo $row->mid;?></td>
			    <td><?php echo $row->category;?></td>
			   <td><?php echo $row->id;?></td>
			   <td><?php echo $row->sub_category;?></td>
			   
			 
			   <td>
			   		<a href = "<?php echo base_url('uploads/document_verification/'.$row->upload_name);?>" class = "btn btn-info btn-sm" target="_blank">
				   <span class="glyphicon glyphicon-open"></span> open</a>
			   	<!--a href="" >click here to view pdf.</a>-->
			   </td>
			   <!--  target="_blank" opens the jpg,pdf etc in new tab--> 
			   
				
				<td>
				<?php echo $row->status;?>
				 </td>
				 
				 <td>
				   <a href="<?php echo base_url('admin/update_status_request/'.$row->mid.'/'.$row->id);?>"class="btn btn-info btn-sm">
				   <span class="glyphicon glyphicon-check"></span> UPDATE</a>
				</td>
			</tr>
	   <?php endforeach;
	   } ?>
		</tbody>
	   </table>
	 
	   </form>
	  <br>
	  <br>
	   </div><!--alumini form div ends -->
     </div><!-- alumini div ends -->

        <div id="FAuthor" class="tab">
            <div align="center"class="container">
	
	<form  action="" method="post">
     <table class="table">
	   <thead>
		<th>MEMBER_ID</th>
		<th>CATEGORY</th>
		<th>ID</th>
		<th>SUB CATEGORY</th>
		<th>file</th>
		<th>STATUS</th>
		<th>VERIFY</th>
	   </thead>
	   <tbody>
	   	<?php if($success==null) {
		 //  echo "<script> alert('NOT FOUND') </script>"; ?>	   
	      <a style="float:left" href="<?php echo base_url().'Admin';?>"class="btn btn-link btn-lg">
	      <span class="glyphicon glyphicon-link"></span> go back</a>	   
	 <?php  }
	    else{ 
	    	?>
	   <a style="float:left" href="<?php echo base_url().'Admin';?>"class="btn btn-link btn-lg">
	      <span class="glyphicon glyphicon-link"></span> Go Back</a>
	   <?php foreach($success as $row):?>
	   
	       <tr>
			   <td><?php echo $row->mid;?></td>
			    <td><?php echo $row->category;?></td>
			   <td><?php echo $row->id;?></td>
			   <td><?php echo $row->sub_category;?></td>
			   
			 
			   <td>
			   		<a href = "<?php echo base_url('uploads/document_verification/'.$row->upload_name);?>" class = "btn btn-info btn-sm" target="_blank">
				   <span class="glyphicon glyphicon-open"></span> open</a>
			   	<!--a href="" >click here to view pdf.</a>-->
			   </td>
			   <!--  target="_blank" opens the jpg,pdf etc in new tab--> 
			   
				
				<td>
				<?php echo $row->status;?>
				 </td>
				 
				 <td>
				   <a href="<?php echo base_url('admin/update_status_request/'.$row->mid.'/'.$row->id);?>"class="btn btn-info btn-sm">
				   <span class="glyphicon glyphicon-check"></span> UPDATE</a>
				</td>
			</tr>
	   <?php endforeach;
	   } ?>
		</tbody>
	   </table>
	 
	   </form>
	  <br>
	  <br>
	    </div>
	    </div>
	    <div id="PBody" class="tab">
            <div align="center"class="container">
	
	<form  action="" method="post">
     <table class="table">
	   <thead>
		<th>MEMBER_ID</th>
		<th>CATEGORY</th>
		<th>ID</th>
		<th>SUB CATEGORY</th>
		<th>file</th>
		<th>STATUS</th>
		<th>VERIFY</th>
	   </thead>
	   <tbody>
	   <?php if($unsuccess==null) {
		 //  echo "<script> alert('NOT FOUND') </script>"; ?>	   
	      <a style="float:left" href="<?php echo base_url().'Admin';?>"class="btn btn-link btn-lg">
	      <span class="glyphicon glyphicon-link"></span> go back</a>	   
	 <?php  }
	    else{ 
	    	?>
	 	 <a style="float:left" href="<?php echo base_url().'Admin';?>"class="btn btn-link btn-lg">
	      <span class="glyphicon glyphicon-link"></span> Go Back</a>
	   <?php foreach($unsuccess as $row):?>
	   
	       <tr>
			   <td><?php echo $row->mid;?></td>
			    <td><?php echo $row->category;?></td>
			   <td><?php echo $row->id;?></td>
			   <td><?php echo $row->sub_category;?></td>
			   
			 
			   <td>
			   		<a href = "<?php echo base_url('uploads/document_verification/'.$row->upload_name);?>" class = "btn btn-info btn-sm" target="_blank">
				   <span class="glyphicon glyphicon-open"></span> open</a>
			   	<!--a href="" >click here to view pdf.</a>-->
			   </td>
			   <!--  target="_blank" opens the jpg,pdf etc in new tab--> 
			   
				
				<td>
				<?php echo $row->status;?>
				 </td>
				 
				 <td>
				   <a href="<?php echo base_url('admin/update_status_request/'.$row->mid.'/'.$row->id);?>"class="btn btn-info btn-sm">
				   <span class="glyphicon glyphicon-check"></span> UPDATE</a>
				</td>
			</tr>
	   <?php endforeach;
	   } ?>
		</tbody>
	   </table>
	 
	   </form>
	  <br>
	  <br>
	    </div>
	    </div>
    </div>
</div>
	</body>
	</html>