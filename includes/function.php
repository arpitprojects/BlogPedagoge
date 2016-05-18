<?php include_once'connect.inc_blog.php'; ?>
<?php 
	function get_user_load($field){
		$new_array  = array();
		$query = "SELECT `$field` FROM `pedagoge_blog` ORDER BY `post_id` DESC";
		if($query_run = mysql_query($query)){
			if(($row = mysql_fetch_row($query_run)) !==  false){
			return $row[0];
			}
		
	}
}
function get_user_load_asc($field){
	$query = "SELECT `$field` FROM `pedagoge_blog` ORDER BY `post_id` ASC";
		if($query_run = mysql_query($query)){
			if(($row = mysql_fetch_row($query_run)) !==  false){
			return $row[0];
			}	
		}
	}
?>
<?php 
	function get_user1($field , $i){
		//$new_array  = array();
		$query = "SELECT `$field` FROM `pedagoge_blog` ORDER BY `post_id` DESC LIMIT 0,6";
		if($query_run = mysql_query($query)){
			if($query_result = mysql_result($query_run , $i, $field)){
				return $query_result;
			
		}
	}
}
?>
<?php 
	function get_user2($desc_name, $i){
		//$new_array  = array();
		$query = "SELECT `post_desc` FROM `pedagoge_blog` ORDER BY `post_id` DESC LIMIT 0,6";
		if($query_run = mysql_query($query)){
			if($query_result = mysql_result($query_run , $i, $desc_name)){
				return $query_result;
		}			
	}
}
$upper_limit = get_user_load('post_id');
			$lower_limit = get_user_load_asc('post_id');
			$rand_mid = ceil(($upper_limit + $lower_limit)/2);
			$rand1 = rand($lower_limit+1 ,$rand_mid);
			$rand2 = rand($rand_mid +1 ,$upper_limit-1);
			
			function rand_func($field){
				global $rand1;
			$query = "SELECT `$field` FROM `pedagoge_blog` WHERE `post_id` = '$rand1' ";
				if($query_run = mysql_query($query)){
					if(($row = mysql_fetch_row($query_run)) !==  false){
					return $row[0];
					}		
				}
			}
			
			$post_title1=rand_func('post_title');
			$post_desc1 =rand_func('post_desc');
			$post_like1 = rand_func('post_like');
			$post_share1 = rand_func('post_share');
			$post_id1 = $rand1;
			function rand_func1($field){
				global $rand2;
			$query = "SELECT `$field` FROM `pedagoge_blog` WHERE `post_id` = '$rand2'";
				if($query_run = mysql_query($query)){
					if(($row = mysql_fetch_row($query_run)) !==  false){
					return $row[0];
					}	
				}
			}
			$post_id2 = $rand2;
			$post_title2 =rand_func1('post_title');
			$post_desc2 = rand_func1('post_desc'); 
			$post_like2 = rand_func1('post_like');
			$post_share2 = rand_func1('post_share');
?>
