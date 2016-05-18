<?php 
	include_once 'connect.inc_blog.php';
	include_once 'function.php';
	include_once 'like_functions.php';
	if(isset($_POST['post_id'] , $_SESSION['id']) && post_exists($_POST['post_id'])){
		$post_id = $_POST['post_id'];
		if(prev_liked($post_id) === true){
			echo 'You have already liked this';
		}else{
			add_liked($post_id);
			echo 's';
		}
	}
?>