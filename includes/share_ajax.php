<?php 
	include_once 'connect.inc_blog.php';
	include_once 'function.php';
	include_once 'like_functions.php';
	if(isset($_POST['post_id'] , $_SESSION['id']) && post_exists($_POST['post_id'])){
		$post_id = $_POST['post_id'];
		add_shared($post_id);
		echo 't';
	}
?>