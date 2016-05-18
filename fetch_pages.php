<?php 
	include_once 'includes/connect.inc_blog.php';
	include_once 'includes/function.php';	
?>
<!DOCTYPE html>
<html>
	<head>
	</head>

<body>
<?php 

	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	//throw HTTP error if page number is not valid
	if(!is_numeric($page_number)){
		header('HTTP/1.1 500 Invalid page number!');
		exit();
	}
	//get current starting point of records
	$position = ($page_number * $item_per_page);
	//Limit our results within a specified range. 
	if($results = mysql_query("SELECT `post_id` , `post_like` ,`post_share`  , `post_title` , `post_desc` FROM `pedagoge_blog` ORDER BY `post_id` DESC LIMIT  $position,$item_per_page")){
		echo '<div class="container active-with-click" style="z-index:99 !important;max-width:100%;">';
		while($row = mysql_fetch_assoc($results)){
			echo '<center>';
			echo '<div class="col-md-5 col-sm-10 col-xs-10" style="margin-left:5.5%;margin-top:5%;max-width:100%;" id="container"> ';
			
			echo '<a href="main.php?post_id='.$row['post_id'].'">'.'<img src='.$row['post_desc'].' class="img-responsive" id="image_fetch">';
			
			echo '<div class="overlay"><h2 id="t1"><i href="#" class="click_like fa fa-thumbs-up" onclick="add_like(',$row['post_id'],')"></i><i id="like_button" class="post_'.$row['post_id'].'_like">'.$row['post_like'].'</i><i onclick="add_share(',$row['post_id'],')" class="fa fa-share-alt"></i><i id="share_button" class="post_'.$row['post_id'].'_share">'.$row['post_share'].'</i></h2></div></a>';
			
			echo '<h3 id="post">'.$row['post_title'].'</h3>';
			echo '</div>';
			
			echo '</center>';
	}
	echo '</div>';//mysql query closed
}

?>
<!--optional php code need to be removed -->
<style>
@media all and (max-width:445px){
	.overlay{
		width:90%;
		height:76%;
	}
}
	.active-with-click{
		margin-top:-8%;
	}
	#like_button{
		margin-left:2% !important;
	}
	#share_button{
		margin-left:2% !important;
	}
	#post{
		font-size:21px !important;
	}
</style>
<script>
	function win_loc(url){
		window.location = url;
	}
	
</script>
<script>
	function add_like(post_id){
	$.post('includes/like_ajax.php',{post_id:post_id},function(data){
		if(data == 's'){
			like_get(post_id);
			alert('You like this post!');
		}else{
			console.log('fail');
			alert(data);
		}
	});
}
function like_get(post_id){
		$.post('includes/get_ajax.php',{post_id:post_id},function(data){
			$('.post_'+post_id+'_like').text(data); 
		});
	}
function add_share(post_id){
	$.post('includes/share_ajax.php' , {post_id : post_id }, function(data){
		if(data == 't'){
			share_get(post_id);
		}else{
			alert(data);
		}
	});
}
function share_get(post_id){
	$.post('includes/set_ajax.php' , {post_id : post_id} , function(data){
		$('.post_'+post_id+'_share').text(data);
	});
}
</script>

	</body>
</html>
