<?php include_once'connect.inc_blog.php'; ?>
<?php 
	function get_user($field){
		$new_array  = array();
		$query = "SELECT `$field` FROM `pedagoge_blog` ORDER BY `post_id` DESC LIMIT 6";
		if($query_run = mysql_query($query)){
		while(($row = mysql_fetch_assoc($query_run)) !==  false){
			$new_array =  $row[$field];
			echo $new_array. "<br/>";
		}
		
	}
}
//get_user('post_date');
//jus for checking purpose
//get_user('post_title');
?>

<?php 
		function get_user_image($desc_name){
		$new_image_array = array();
		$query = "SELECT `post_desc` FROM `pedagoge_blog` ORDER BY `post_id` DESC LIMIT 6";
		if($query_run = mysql_query($query)){
			while(($row = mysql_fetch_assoc($query_run)) !== false){
				$new_image_array = $row[$desc_name];
				//print_r ($new_image_array) ;
				?>
				<img src="database_image/<?php echo $row['post_desc'] ?>"/>
				<?php
			}
		}
		
	}
?>


$extension = explode('.' ,  $desc_name);
								//echo $extension[1];
								if($extension=="jpg" || $extension=="jpeg" )
								{
									$src = imagecreatefromjpeg($desc);
								}
								else if($extension=="png")
								{
									$src = imagecreatefrompng($desc);
								}
								else 
								{
									$src = imagecreatefromgif($desc);
								}
								list($width , $height) = getimagesize($desc);
								// this will assign the height and width pixel to e.g 1920x 1080px]
								
								$newwidth = 60;
								$newheight = ($height/$width)*$newwidth1;
								$tmp = imagecreatetruecolor($newwidth , $newheight);
								imagecopyresampled($tmp , $src , 0, 0, 0, 0,$newwidth , $newheight , $width , $height  );
								$filename = "../database_image/".$_FILES['desc']['name'];
								imagejpeg($tmp , $filename , 100);