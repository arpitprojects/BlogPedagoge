
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=219520801402619";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php 
	include_once 'includes/connect.inc_blog.php';
	include_once 'includes/function.php';
	if(isset($_GET['post_id']) && $_GET['post_id']!=''){
		$_SESSION['post_id'] = $_GET['post_id'];
		
		
	}else{
		echo 'something is wrong';
	}

?>
<?php 
	function get_user_field($field){
		$query = "SELECT `$field` FROM `pedagoge_blog` WHERE `post_id` = '".$_SESSION['post_id']."'";
			if($query_run = mysql_query($query)){
				if ($query_result = mysql_result($query_run , 0 , $field)){
					return $query_result;
			}
		}
	}
		$post_id = $_GET['post_id'];
		$post_title = get_user_field('post_title');
		$post_desc = get_user_field('post_desc');
		$post_content = get_user_field('post_content');
		$post_date = get_user_field('post_date');
		$post_author = get_user_field('post_author');
		$post_author_desc = get_user_field('post_author_desc');
		$post_author_content = get_user_field('post_author_content');
		$post_like = get_user_field('post_like');
		$post_share = get_user_field('post_share');
		
?>
<?php
	function get_user_field_after($field){
		$query = "SELECT `$field` FROM `pedagoge_blog` WHERE `post_id`  >  '".$_SESSION['post_id']."' LIMIT 1";
		if($query_run = mysql_query($query)){
			if($row = mysql_fetch_array($query_run)){
			return $row[0];
			}else{
				echo '<p style="position:absolute;z-index:-1;">NO RESULT FOUND!</p>';
			}
		}
	}
	
function get_user_field_before($field){
		$query = "SELECT `$field` FROM `pedagoge_blog` WHERE `post_id`  <  '".$_SESSION['post_id']."' LIMIT 1";
		if($query_run = mysql_query($query)){
			if ($rows = mysql_fetch_array($query_run)){
				return $rows[0];
		}else{
			echo '<p style="position:absolute;z-index:-1;">NO RESULT FOUND!</p>';
		}
	}
}
	$post_id_after = get_user_field_after('post_id');
	$post_desc_after = get_user_field_after('post_desc');
	$post_title_after = get_user_field_after('post_title');
	$post_id_before = get_user_field_before('post_id');
	$post_desc_before = get_user_field_before('post_desc');
	$post_title_before = get_user_field_before('post_title');

?>

<?php

		echo '<div class="container-fluid">';
		echo '<div class="row">';
		echo '<div class="col-md-12">';
			echo '<div class="next_prev_post">';
				echo '<div class="prev">';
						echo '<a id="post_prev" href="main.php?post_id='.$post_id_before.'" class="pull-left"><p><img src='.$post_desc_before.' class="img-responsive" height="50 !important;" width="32 "> PREVIOUS POSTS</p><h5>'.$post_title_before.'</h5></a>';
						echo '<a id="post_next" href="main.php?post_id='.$post_id_after.'" class="pull-right"><p><img src='.$post_desc_after.' class="img-responsive" height="50 !important" width="32">NEXT POSTS</p><h5>'.$post_title_after.'</h5></a>';
				echo '</div>';
			echo '</div>';	
		echo '</div>';
	echo '</div>';
echo '</div>';
			
			echo '<header>';
			echo '<div class="container-fluid" id="head_color">';
			echo '<img src="img/log.png" class="head_logo pull-left img-responsive" onclick="win_loc(\'http://beta.pedagoge.com/\');" height="70" width="170" style="cursor:pointer;">';
			
			echo '<a href="#" class="toggle pull-right"><i class="fa fa-bars fa-2x"></i></a>';
			echo '</div>';
			echo '<div class="container-fluid">';
				echo '<div class="row">';
					echo '<div class="col-md-6" id="top_adjust">';
						echo '<nav class="menu-side">';
							echo '<div class="menu-side-inside">';
								echo '<ul>';
									echo '<i class="toggle1 fa fa-times pull-right fa-2x"></i>';
									echo '<br><br>';
								echo '<li onclick="win_loc(\'http://beta.pedagoge.com\');" class="hvr-shutter-out-horizontal"><h3>Home</h3></li>';
								echo '	<li onclick="win_loc(\'http://beta.pedagoge.com/register/registeras/\');" class="hvr-shutter-out-horizontal"><h3 id="sign_up">Sign up</h3>';
									echo '	<ul id="inside_ul">';
									echo '		<li onclick="win_loc(\'http://beta.pedagoge.com/register/?registeras=guardian\')" >As Gurdian</li>';
									echo '		<li onclick="win_loc(\'http://beta.pedagoge.com/register/registeras/\');">As Teacher</li>';
									echo '	<li onclick="win_loc(\'http://beta.pedagoge.com/register/?registeras=student\');">As Student</li>';
									echo '	</ul>';
									echo '</li>';
									echo '<li onclick="win_loc(\'http://beta.pedagoge.com/login\');" class="hvr-shutter-out-horizontal"><h3>Sign in</h3></li>';
									echo '<li onclick="win_loc(\'http://beta.pedagoge.com/about\');" class="hvr-shutter-out-horizontal"><h3>About us</h3></li>';
									echo '<li onclick="win_loc(\'http://beta.pedagoge.com/about/#contacts\');" class="hvr-shutter-out-horizontal"><h3>Contact us </h3></li>';
									echo '<li onclick="win_loc(\'http://beta.pedagoge.com/terms\');" class="hvr-shutter-out-horizontal"><h3>Terms</h3></li>';
									echo '<li onclick="win_loc(\'http://beta.pedagoge.com/privacypolicy\');" class="hvr-shutter-out-horizontal"><h3>Legal</h3></li>';
							echo '</div>';
						echo '</nav>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		
				echo '<div class="container-fluid">';
					echo '<div class="row">';
						echo '<div class="col-md-12">';
							echo '<center>';
								echo '<i id="scroller" class="fa fa-chevron-down fa-2x"></i>';
							echo '</center>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
		
		echo '</div>';	
		echo ' <div class="container">';
				echo '<div class="row">';
					echo '<div class="col-md-12">';
						echo '<div class="middle_text_div">';
							echo '<h1 id="middle_text"><strong>'.$post_title.'</strong></h1>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';	
		echo '<img src='.$post_desc.' id="header_img" class="img img-responsive"/>';
		
		
		
		
		echo '</header>';
		echo '<br><br><br><br>';
		
				
		echo '<div class="row" style="width:100%;">';
		echo '<div class="container" style="width:80%;margin-left:3%;">';
		echo '<ul class="social-icons icon-circle list-unstyled list-inline"><li><i href="#" class="click_like bitTooltip  fa-2x fa fa-heart-o" style="cursor:pointer; color:red;" onclick="add_like(',$post_id,')"><span><i  class="post_'.$post_id.'_like">'.$post_like.'</i></span></i></li><li><a class="facebook pop-upper" target="a_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://blog.pedagoge.com/main.php?post_id='.$post_id.'&t='.$post_title.'"><i onclick="add_share(',$post_id,')" class="fb-share-button bitTooltip fa fa-facebook" ><span><i  class="post_'.$post_id.'_share">'.$post_share.'</i></span></i></a></li><li><a target="_blank" class="twitter pop-upper" href="https://twitter.com/home?status=http://blog.pedagoge.com/main.php?post_id='.$post_id.'"><i onclick="add_share(',$post_id,')" class="bitTooltip fa fa-twitter"><span><i  class="post_'.$post_id.'_share">'.$post_share.'</i></span></i></a></li><li><a class="whatsapp" data-link="http://blog.pedagoge.com/main.php?post_id='.$post_id.'" data-text="'.$post_title.'"><i onclick="add_share(',$post_id,')" class="bitTooltip fa fa-whatsapp"><span><i  class="post_'.$post_id.'_share">'.$post_share.'</i></span></i></a></li></ul>';
		echo '</div>';
		echo '</div>';
		echo '<br><br><br>';
	echo ' <div class="container">';
				echo '<div class="row">';
					echo '<div class="col-md-12">';
						echo '<center>';
							echo '<h1 id="middle_text"><strong>'.$post_title.'</strong></h1>';
							echo '</center>';
						echo '</div>';
		echo '</div>';	
		echo '<article>';
		echo '<div id="wrapper">';
		echo '<div class="container-fluid">';
		echo '<div class="row">';
					echo '<div class="col-md-12 text-justify">'; 
						echo $post_content;
				echo '</div>';
			echo'</div>';
		echo '</div>';
		echo '<br><br><br>';
		echo'</article>';
		echo'<br><br><br>';
		echo'<section>';
		echo'<center>';
			echo'<div class="container">';
				echo'<div class="row" id="about_the_author">';
					echo '<br/>';
					echo '<h5 id="about_author">ABOUT THE AUTHOR</h5>';
					echo '<p id="author_name"><i class="fa fa-pencil"></i>'.$post_author.'</p>';
					echo'<div class="col-md-4 col-sm-5  col-xs-5">';
				
					echo '<img src='.$post_author_desc.' alt="AUTHOR"  class="img-responsive pull-right" style="height:150px;width:150px;"/>';
					
					echo '</div>';
						
					echo '<div class="col-md-6 col-sm-7 col-xs-7">';
					echo '<p id="author_content" class="pull-left text-justify">'.$post_author_content.';</p>';
					echo '</div>';
							
							
					echo '<br>';		
					
					//center
					echo'</div>';//col-md-12
				echo'</div>';//row
			echo'</div>';
			//container
		echo'</center>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-md-12">';
			echo '<center>';
			echo '<br><br><br>';
			echo'<h5 id="tagline"><i class="fa fa-clock-o"></i> '.$post_date.'</h5>';
			echo '</center>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo'</section>';
		echo '<br><br><br>';
		echo '<center>';
		echo '<div class="row" style="width:100%;">';
		echo '<div class="container" style="width:80%;margin-left:3%;">';
		echo '<ul class="social-icons icon-circle list-unstyled list-inline"><li><i href="#" class="click_like bitTooltip  fa-2x fa fa-heart-o" style="cursor:pointer; color:red;" onclick="add_like(',$post_id,')"><span><i  class="post_'.$post_id.'_like">'.$post_like.'</i></span></i></li><li><a class="facebook pop-upper" target="a_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://blog.pedagoge.com/main.php?post_id='.$post_id.'&t='.$post_title.'"><i onclick="add_share(',$post_id,')" class="fb-share-button bitTooltip fa fa-facebook" ><span><i  class="post_'.$post_id.'_share">'.$post_share.'</i></span></i></a></li><li> <a target="_blank" class="twitter pop-upper" href="https://twitter.com/home?status=http://blog.pedagoge.com/main.php?post_id='.$post_id.'"><i onclick="add_share(',$post_id,')" class="bitTooltip fa fa-twitter"><span><i  class="post_'.$post_id.'_share">'.$post_share.'</i></span></i></a></li><li><a class="whatsapp" data-link="http://blog.pedagoge.com/main.php?post_id='.$post_id.'" data-text="'.$post_title.'"><i onclick="add_share(',$post_id,')" class="bitTooltip fa fa-whatsapp"><span><i  class="post_'.$post_id.'_share">'.$post_share.'</i></span></i></a></li></ul>';
		echo '</div>';
		echo '</div>';
		
		echo '<br><br>';
		
		echo '</center>';
		echo'<br>';
		echo'<br>';
		echo'<br>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo'<aside>';
			echo'<div class="container">';
				echo'<div class="row">';
					echo'<div class="col-md-12">';
						echo'<center>';
							echo'<h3>RELATED ARTICLES</h3>';
							//echo get_user_field_before();
						echo'</center>';
					echo'</div>';
			echo'</div>';
			echo'</div>';
			echo'<br><br><br>';
			 
			echo'<div class="container-fluid" style="max-width:100%;">';
				echo'<div class="row">';
					echo '<center>';
					echo '<div  class="col-md-5 col-md-offset-1 col-sm-12"> ';
					echo '<a href="main.php?post_id='.$post_id1.'">'.'<img src='.$post_desc2.' class="img-responsive" id="image_fetch">';
			
					echo '<div class="overlay"><h2 id="t1"><i href="#" class="click_like fa fa-thumbs-up" onclick="add_like(',$post_id1,')"></i><i id="like_button" class="post_'.$post_id1.'_like">'.$post_like1.'</i><i onclick="add_share(',$post_id1,')" class="fa fa-share-alt"></i><i id="share_button" class="post_'.$post_id1.'_share">'.$post_share1.'</i></h2></div></a>';
			
					echo '<h3 id="post">'.$post_title1.'</h3>';
					echo  '</div>';
					echo '<div  class="col-md-5  col-sm-12"> ';
					echo '<a href="main.php?post_id='.$post_id2.'">'.'<img src='.$post_desc2.' class="img-responsive" id="image_fetch">';
			
					echo '<div class="overlay"><h2 id="t1"><i href="#" class="click_like fa fa-thumbs-up" onclick="add_like(',$post_id2,')"></i><i id="like_button" class="post_'.$post_id2.'_like">'.$post_like2.'</i><i onclick="add_share(',$post_id2,')" class="fa fa-share-alt"></i><i id="share_button" class="post_'.$post_id2.'_share">'.$post_share2.'</i></h2></div></a>';
			
					echo '<h3 id="post">'.$post_title2.'</h3>';
					echo  '</div>';
					echo '</center>';
						echo '</div>';
					echo '</div>';
			echo '</div>';
		echo '</div>';
		echo '</aside>';
		echo'</div>';
		
		echo'<br><br>';

?>
<style>
		@font-face {
    font-family: myFirstFont;
    src: url(../fonts/fonts.ttf);
}
body{
	font-family:myFirstFont;
}
</style>
<style>
@media all and (max-width:600px){
	.overlay{
	position: absolute;
    height: 82%;
    opacity: 0;
    z-index: 1 !important;
    width: 92%;
    max-width: 100%;
    top: 0%;
    left: 4%;
    overflow: hidden;
    border-radius: 5px;
    background-color: rgba(0, 0 , 0 , .60);
	}
}
#author_name{
	font-weight:bold;
	font-size:15px;
}
#tagline{
	font-size:20px !important;
}
#author_content{
	width:100%;
}
#author{
	font-weight:bold;
}
.card{
	height:260px !important;
}
#about_author{
	font-size:20px;
}
#about_the_author{
	color:black !important;
	font-family: Lato, Helvetica, sans-serif !important;
}
@media all and (max-width:395px){
	ul.social-icons{
		right:-3%;
	}
}
@media all and (max-width:996px) and (min-width:700px) {
	.overlay{
		left:26%;
		width:48%;
	}
}
.fb-share-button{
	padding:2%;
}
	.bitTooltip {
    position: relative;
}

.bitTooltip span {
    margin-left: -999em;    
    position: absolute;
}

.bitTooltip:hover span {
   font-family: myFirstFont !important;
    position: absolute;
    left: -.24em;
    top:-3.4em;
    z-index: 99;
    margin-left: 0;
    background-color: #000;
    color: white;
	opacity:.9;
    padding: 0.1em;
    min-width: 50px;
    font-size: 12pt;
    border-radius:20%;


}

.bitTooltip:hover span.fancy {
    font-family: myFirstFont !important;
    position: absolute; left: 1em; top: 2em; z-index: 99;
    margin-left: 0; 
    border-radius: 4px;
    -webkit-box-shadow: 0px 0px 10px 2px #C1C1C1;
    -moz-box-shadow: 0px 0px 10px 2px #C1C1C1;
    box-shadow: 0px 0px 10px 2px #C1C1C1;
    background-color: white;    
    color:#4F4F4F;
    padding: 0.5em;
    min-width:100px;
    font-size:20pt !important;
}
	#like_button{
		margin-left:2% !important;
	}
	#share_button{
		margin-left:2% !important;
	}
	ul.social-icons{
		width:119%;
		text-align:right;
		position:relative;
		right:20%;
	}
</style>
<style>

	#t1{
		position:absolute;
		
	}
	.middle_text_div{
	position:absolute;
	color:white;
	top:277px;
	max-width:100%;
	text-align:center;
	width:95% !important;
	font-family:myFirstFont;
}
@font-face {
    font-family: myFirstFont;
    src: url(../fonts/fonts.ttf);
}
.menu-side ul h3{
	font-size:22px;
	font-family:myFirstFont !important;
	letter-spacing:2px;
	border-radius:5px;
	padding:1%;
}
.menu-side ul h3:hover{
	background-color:#22baa0;
	transition:all .5s ease-in-out;
}
nav.menu-side li{
	margin-top:3%;
}

.menu-side ul h3{
	font-size:22px;
	font-family:myFirstFont !important;
	letter-spacing:2px;
	border-radius:5px;
	padding:1%;
}
nav.menu-side li{
	margin-top:3%;
}

.hvr-shutter-out-horizontal  h3:hover{
	background-color:#22baa0 !important;
}
#inside_ul li{
	margin-left:3%;
	font-family:myFirstFont;
	display:none;
	display:inline-block;
	font-size:15px;
	
}
#inside_ul{
	margin-left:-10%;
}
#inline-listing li{
	display:inline-block;
	margin-left:5%;

}
#align{
	margin-left:0 !important;
	letter-spacing:2.2px;
	font-size:18px !important;
}

			.card{
				max-width:100%;
				border-radius:2%;
				padding:0.5%;
				letter-spacing:1.5px;
				background-color:white;
				padding-bottom:1.5%;

			}
			.card img{
				  //box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
				  
				  padding-right:2%;
				 
			}
		
		
			 
.wrapper,.copyright {
	padding: 20px;
	text-align: center;
}
hr{
	margin: 30px 20px;
	border-top:2px solid #1C1E26 ;
	border-bottom:2px solid #38404D;
}
.list-unstyled {
	padding-left: 0;
	list-style: none;
}
.list-inline li {
	display: inline-block;
	padding-right: 5px;
	padding-left: 5px;
	margin-bottom: 10px;
}
.social-icons .fa {
	font-size: 1.8em;
}

.social-icons .fa {
	width: 1.5em;
	height: 1.5em;
	line-height: 40px;
	text-align: center;
	color: #FFF;
	color: rgba(255, 255, 255, 0.8);
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-ms-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
}

.social-icons.icon-circle .fa{ 
	border-radius: 50%;
}
.social-icons.icon-rounded .fa{
	border-radius:5px;
}
.social-icons.icon-flat .fa{
	border-radius: 0;
}

.social-icons .fa:hover, .social-icons .fa:active {
	color: #FFF;
	-webkit-box-shadow: 1px 1px 3px #333;
	-moz-box-shadow: 1px 1px 3px #333;
	box-shadow: 1px 1px 3px #333; 
}
.social-icons.icon-zoom .fa:hover, .social-icons.icon-zoom .fa:active { 
 	-webkit-transform: scale(1.1);
	-moz-transform: scale(1.1);
	-ms-transform: scale(1.1);
	-o-transform: scale(1.1);
	transform: scale(1.1); 
}
.social-icons.icon-rotate .fa:hover, .social-icons.icon-rotate .fa:active { 
	-webkit-transform: scale(1.1) rotate(360deg);
	-moz-transform: scale(1.1) rotate(360deg);
	-ms-transform: scale(1.1) rotate(360deg);
	-o-transform: scale(1.1) rotate(360deg);
	transform: scale(1.1) rotate(360deg);
}
 
.social-icons .fa-facebook,.social-icons .fa-facebook-square{background-color:#3C599F;}  
.social-icons .fa-github,.social-icons .fa-github-alt,.social-icons .fa-github-square{background-color:#070709;} 
.social-icons .fa-google-plus,.social-icons .fa-google-plus-square{background-color:#CF3D2E;} 

.social-icons .fa-instagram{background-color:#A1755C;}
.social-icons .fa-linkedin,.social-icons .fa-linkedin-square{background-color:#0085AE;} 
 
.social-icons .fa-twitter,.social-icons .fa-twitter-square{background-color:#32CCFE;} 
.social-icons .fa-whatsapp{background-color:#34ad00;}
.social-icons .fa-youtube,.social-icons .fa-youtube-play,.social-icons .fa-youtube-square{background-color:#C52F30;}

</style>
<script>
	function win_loc(url) {
						window.location = url;
			}

		
</script>

<script>
	function add_like(post_id){
	$.post('includes/like_ajax.php',{post_id:post_id},function(data){
		if(data == 's'){
			like_get(post_id);
		}else{
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
