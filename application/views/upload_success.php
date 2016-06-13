<!--<html>
<head>
<title>Upload Form</title>
<style>
	#count{
		
		font-weight:bolder;
		background:#99BC99;
	}
</style>
</head>
<body>
-->
<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
<!--$arr=$this->upload->data();//not required
foreach($arr as $item=>$value)
echo $item.':'.$value.'<br/>';
?>-->

</ul>
<h1 id="count">PAGE COUNT=<?php
echo $pagecount;?></h1>
<p><?php echo anchor('upload/upload_file', 'Upload Another File!'); ?></p>
<p><?php echo anchor('login/profile_open', 'Back to Profile!'); ?></p>

</body>
</html>