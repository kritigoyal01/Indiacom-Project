<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>UPLOAD</title>
		<?php echo link_tag('css/bootstrap.min.css'); ?>
		<!--<?php echo link_tag('css/bootstrap-theme.min.css'); ?>
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>-->
	</head>
    <body>
	<br>
	<br>
    <form class="form-horizontal" role="form" method="post"	action="<?php echo base_url().'Admin/update_status_submit';?>">
	<div class="form-group">
    <label class="control-label col-sm-2" for="MEMBER_ID">MEMBER_ID:  <?php echo $result->mid;?></label>
    <label class="control-label col-sm-2" for="ID">MEMBER_ID:<?php echo $result->id;?></label>
	<div class="col-sm-6">
    <input type="hidden" name="mid" class="form-control" id="MEMBER_ID" value="<?php echo $result->mid;?>" >
    <input type="hidden" name="id" class="form-control" id="MEMBER_ID" value="<?php echo $result->id;?>" >
    </div>
	</div>
	<div class="form-group">
    <label  class="control-label col-sm-2" for="verify">VERIFICATION:</label>
   	             <input type = "radio"
                 name = "verify"
                 id = "sizeSmall"
                 value = "Verified"
                 checked = "checked" />
                 <label for = "sizeSmall">Verified</label>
          
                <input type = "radio"
                 name = "verify"
                 id = "sizeMed"
                 value = "Not Approved" />
                 <label for = "sizeMed">Not Approved</label>
                
    </div>
	<div class="form-group"> 
		
    <div class="col-sm-offset-2 col-sm-10">
	<button type="submit" name="submit" class="btn btn-info ">Submit</button>
	</div>
	<a style="float:left" href="<?php echo base_url().'Admin';?>"class="btn btn-link btn-lg">
	      <span class="glyphicon glyphicon-link"></span> go back</a
	</div>
	</form>
	</body>
	</html>
