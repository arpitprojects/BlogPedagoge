<?php include_once 'connect.inc_blog.php';
	include_once 'function.php';
?>
<?php 
	function post_exists($post_id){
		$post_id = (int)$post_id;
		return (mysql_result(mysql_query("SELECT COUNT(`post_id`) FROM `pedagoge_blog` WHERE `post_id` = '$post_id'") , 0) == 0) ? false : true;
		
	}
	function prev_liked($post_id){
		$post_id = (int)$post_id;
		return (int)(mysql_result(mysql_query("SELECT COUNT(`id`) FROM `like_button` WHERE `liked_by` =".$_SESSION['id']." AND `post_id` = '$post_id'"),0) == 0 ) ? false : true;
	}
	function like_count($post_id)
	{
		$post_id = (int)$post_id;
		return (int)mysql_result(mysql_query("SELECT `post_like` FROM `pedagoge_blog` WHERE `post_id` ='$post_id'") , 0 );
			
	}
	function add_shared($post_id){
			$post_id = (int)$post_id;
			mysql_query("UPDATE `pedagoge_blog` SET `post_share` = `post_share`+1 WHERE `post_id` = '$post_id'");
			mysql_query("INSERT INTO `share_button` VALUES('' , '$post_id' , ".$_SESSION['id']." )");
	}
	function prev_shared($post_id){
		$post_id = (int)$post_id;
		return (int)(mysql_result(mysql_query("SELECT COUNT(`id`) FROM `share_button` WHERE `shared_by` =".$_SESSION['id']." AND `post_id` = '$post_id'"),0) == 0 ) ? false : true;
	}
	function share_count($post_id)
	{
		$post_id = (int)$post_id;
		return (int)mysql_result(mysql_query("SELECT `post_share` FROM `pedagoge_blog` WHERE `post_id` ='$post_id'") , 0 );
			
	}
	function add_liked($post_id){
			$post_id = (int)$post_id;
			mysql_query("UPDATE `pedagoge_blog` SET `post_like` = `post_like`+1 WHERE `post_id` = '$post_id'");
			mysql_query("INSERT INTO `like_button` VALUES('' , '$post_id' , ".$_SESSION['id']." )");
	}
?>