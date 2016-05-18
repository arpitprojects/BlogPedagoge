<?php 
include_once 'connect.inc_blog.php';
include_once 'function.php';
include_once 'like_functions.php';
	if(isset($_POST['post_id'] , $_SESSION['id']) && post_exists($_POST['post_id'])){
		echo share_count($_POST['post_id']);
	}
?>