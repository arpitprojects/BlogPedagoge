<?php 
	include_once 'connect.inc_blog.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			ADMIN PANEL
		</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/admin.css" type="text/css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/easyeditor.css" type="text/css"/>
		<link rel="stylesheet" href="../css/ee-theme-disqus.css" type="text/css"/>
	</head>
	<body>
		<!--code here-->
		<h1>You have Sucessfully submitted all the details</h1>
			<?php
				header('Location:index.php');
				ob_end_flush();
			?>
	
		
		<style>
			h1{
				text-align:center;
				
			}
		</style>
		<script src="../js/jquery.js" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="../js/jquery.easyeditor.js" type="text/javascript"></script>
		<script src="../js/admin.js" type="text.javascript"></script>
	</body>
</html>