<html>
<head>
<title>Upload Form</title>
</head>
<body>
	<?php echo $error;?>
<?php
   echo form_open_multipart('login/upload_file');
   echo form_upload('file');
   echo form_submit('upload','Upload File');//name=upload type values=upload
   echo form_close();
?>

<p><?php echo anchor('login/profile_open', 'Back to Profile!'); ?></p>




</body>
</html>