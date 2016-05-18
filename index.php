<?php include_once 'includes/connect.inc_blog.php'; ?>
<?php include_once 'includes/function.php';?>
<?php include_once 'includes/like_functions.php';?>

<html>
    <head>
        <title>
            Pedagoge Blogs
			
        </title>
		<link rel="icon" href="http://www.pedagoge.com/favicon.ico" type="image/icon">
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/main.css" type="text/css">
		<link rel="stylesheet" href="css/jquery.floating-social-share.min.css" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="icon" href="http://www.pedagoge.com/favicon.ico" type="image/icon">
		
    </head>
	<style>
		.display_none{
			display:none;
		}
		.color{}
	</style>
    <body class="body">
		<header>
			<div class="container-fluid" id="head_color">
			<img src="img/log.png" class="head_logo pull-left img-responsive" height="70" width="170" style="cursor:pointer;" onclick="win_loc('http://beta.pedagoge.com/');">
			<a href="#" class="toggle pull-right"><i class="fa fa-bars fa-2x"></i></a>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<nav class="menu-side">
							<div class="menu-side-inside">
								<ul>
									<i class="toggle1 fa fa-times pull-right fa-2x"></i>
									<br><br>
									<li onclick="win_loc('http://beta.pedagoge.com');" class="hvr-shutter-out-horizontal"><h3 >Home</h3></li>
									<li class="hvr-shutter-out-horizontal"><h3 id="sign_up">Sign up</h3>
										<ul id="inside_ul">
											<li onclick="win_loc('http://beta.pedagoge.com/register/?registeras=guardian');" >As Gurdian</li>
											<li onclick="win_loc('http://beta.pedagoge.com/register/registeras/');">As Teacher</li>
											<li onclick="win_loc('http://beta.pedagoge.com/register/?registeras=student');">As Student</li>
										</ul>
									</li>
									<li onclick="win_loc('http://beta.pedagoge.com/login/'); class="hvr-shutter-out-horizontal"><h3>Sign in</h3></li>
									<li onclick="win_loc('http://beta.pedagoge.com/about/');" class="hvr-shutter-out-horizontal"><h3>About us</h3></li>
									<li onclick="win_loc('http://beta.pedagoge.com/register/?registeras=student');" class="hvr-shutter-out-horizontal"><h3>Contact us </h3></li>
									<li onclick="win_loc('http://beta.pedagoge.com/terms/');" class="hvr-shutter-out-horizontal"><h3>Terms</h3></li>
									<li onclick="win_loc('http://beta.pedagoge.com/privacypolicy/');" class="hvr-shutter-out-horizontal"><h3>Legal</h3></li>
									
							</div>
						</nav>
					</div>
				</div>
			</div>
					<div class="container">
					<div class="row">
					<center>
						<div class="col-md-12" id="main_head_text">
							<h1 class="head_text_tagline"><strong>Reader's time is a valuable asset.</strong><br><strong>We promise not to waste it </strong></h1>
						</div>
					</center>
					</div>
				</div>
				<img src="img/art.jpg" id="header_img" class="img img-responsive"/>
			
		</header>
		<article>
		<br><br><br><br><br>

		</article>
		<br><br><br><br>
		<div id="results">
		</div>
		<section>
			<br><br><br><br>
			<?php 
				$get_total_rows =  get_user_load('post_id');
				//echo $get_total_rows;
				//echo '<br>';
				$total_page = 0;
				$total_page= ceil($get_total_rows/$item_per_page);
				//echo $total_page;
				$load_more_visible = $upper_limit - $lower_limit;
				
			?>
			<br><br><br>
			<div class="container" id="loading">
				<div class="row">
					<div class="col-md-12">
						<br><br><br><br>
						<h2><button style="background-color:transparent;" type="button" class="load_more_button" id="load_more">LOAD MORE</button> </h2>
						<h2><img src="img/pre.gif" alt="ANIMATED IMAGWE" class="animation_image display_none" height="25" width="25"/> </h2>
					</div>
				</div>
			</div>
		</section>
		<br><br><!--just to make a distance between load more--> 
		<footer>
			<div class="container">
				<div class="row" style="border-bottom:1px solid white;">
					<br>
					<div class="col-md-4" >
						<h5>CONNECT</h5>
						<br>
						<p><a href="http://beta.pedagoge.com/about/"> About Us</a></p>
						<p><a href="#">Get in Touch</a></p>
						
					</div>
					<div class="col-md-4">
						<h5 onclick="win_loc('http://beta.pedagoge.com/privacypolicy/')">LEGAL</h5>
						<br>
						<p><a href="http://beta.pedagoge.com/privacypolicy/">Privacy Policy</a></p>
						<p><a href="http://beta.pedagoge.com/terms">Terms and Conditions</a></p>
					</div>
					<div class="col-md-4">
						<h5>SERVICE</h5>
						<br
						<p><a href="http://beta.pedagoge.com/register/registeras/">Pedagoge for Teacher</a></p>
						<p><a href="http://beta.pedagoge.com/register/?registeras=student">Pedagoge for Students</a></p>
					</div>
						
				</div>
				
			<div class="row">
				<div class="col-md-12">
					<center>
					<br>				
						<img src="img/nasscom.png" alt="footer_image" width="300" height="91" class="img-responsive"/>
					</center>
				</div>
			</div>
		</div>
		<br>
		<div class="container" id="copyright">
			<div class="row">
				<div class="col-md-12">
					<center>
						<p>2015 &copy; Pedagoge</p>
					</center>
				</div>
			</div>
		</div>
		</footer>
		
		<script src="js/jquery.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="js/jquery.floating-social-share.min.js" type="text/javascript"></script>
		<script src="js/jquery.popmenu.js" type="text/javascript"></script>
		 <script src="js/script.js" type="text/javascript"></script>
		<script>
			 $("body").floatingSocialShare({
		place : "top-right",
        buttons: ["facebook", "twitter", "linkedin" , "envelope"],
        text: "share with: ",
        url: "http://www.pedagoge.com",
		place:'bottom-left'
 });
 
		</script>
		
		
		
		<script>

	<!--nfcekjsbgvfebl-->
	
			$(document).ready(function() {
				var track_click = 0; //track user click on "load more" button, righ now it is 0 click
				var total_pages = <?php echo $total_page; ?>;//this is to set total page to javascript total page. 
				var total_rows = <?php echo $get_total_rows; ?>;//this is to set total no of rows of the whole page .
				var load_more_visible = <?php echo $load_more_visible ;?>;// this is for the show button functionality
				console.log(total_pages);
				<?php
					
					$query = "SELECT COUNT(`post_id`) FROM `pedagoge_blog`";
					$query_run = mysql_query($query);
					$mysql_result = mysql_result($query_run , 0);
				?>
				var total_post_fetched = <?php echo $mysql_result?>;
				if(total_post_fetched < 6 ){
				
					$('#load_more').css('display' , 'none');
				}
				console.log(track_click);
				$('#results').load("fetch_pages.php", {'page':track_click}, function(){
					track_click++;
					console.log(track_click);
				}); //once it come after the fetching the 6 posts page it ++'s the track_click
				//till this without load more 6 post will be fetfched
				$("#load_more").click(function (e) { //user clicks on button
					//console.log('hello going on!!');
					$(this).hide(); 
					//$('.animation_image').show('slow'); 
					if(track_click < total_pages) //user click number is still less than total pages
					{
						//post page number and load returned data into result element
						$.post('fetch_pages.php',{'page': track_click}, function(data) {
						
							$("#load_more").show(); //bring back load more button
							$("#results").append(data); //append data received from server
							
							//scroll page smoothly to button id
							
							
							//hide loading image
							//$('.animation_image').hide(); //hide loading image once data is received
				
							track_click++; //user click increment on load button
							console.log(track_click);
						});
						if(track_click >= total_pages) 
						{
							console.log('done');
							$("#load_more").css('display' , 'none');
						}
					}
					  
					});
			});
			
			
			
			<!--jquery now fetching-->
					function win_loc(url) {
						window.location = url;
					}
					$(document).ready(function(){
					$('.shareCount').html("");
					});
				<!--jaavascript for like button concept-->	
					
	</script>
<script>
	function win_loc(url){
		window.location = url;
	}
</script>
	</body>
</html>
