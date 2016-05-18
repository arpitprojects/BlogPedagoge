<?php include_once 'includes/connect.inc_blog.php'; ?>
<?php include_once 'includes/function.php';?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            BLOG PEDAGOGE 
        </title>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/main.css" type="text/css">
		<link rel="stylesheet" href="css/jquery.floating-social-share.min.css" type="text/css">
		<link rel="stylesheet/less" type="text/css" href="css/box.less"/>
		<link rel="stylesheet" href="css/socialpic.css" type="text/css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">    
    </head>
	<style>
		.display_none{
			display:none;
		}
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
									<li onclick="win_loc('http://beta.pedagoge.com');" class="hvr-shutter-out-horizontal"><h3 >HOME</h3></li>
									<li class="hvr-shutter-out-horizontal"><h3 id="sign_up">Sign up</h3>
										<ul id="inside_ul">
											<li >As Gurdian</li>
											<li onclick="win_loc('http://beta.pedagoge.com/register/registeras/');">As Teacher</li>
											<li onclick="win_loc('http://beta.pedagoge.com/register/?registeras=student');">As Student</li>
										</ul>
									</li>
									<li onclick="win_loc('http://beta.pedagoge.com/login/'); class="hvr-shutter-out-horizontal"><h3>Sign in</h3></li>
									<li onclick="win_loc('http://beta.pedagoge.com/about/');" class="hvr-shutter-out-horizontal"><h3>About us</h3></li>
									<li onclick="win_loc('http://beta.pedagoge.com/');" class="hvr-shutter-out-horizontal"><h3>Contact us </h3></li>
									<li onclick="win_loc('http://beta.pedagoge.com/terms/');" class="hvr-shutter-out-horizontal"><h3>Terms</h3></li>
									<li onclick="win_loc('http://beta.pedagoge.com/privacypolicy/');" class="hvr-shutter-out-horizontal"><h3>Legal</h3></li>
									
							</div>
						</nav>
					</div>
				</div>
			</div>
				<img src="img/profile-cover.png" id="header_img" class="img img-responsive"/>
		</header>
		<article>
		<br><br><br><br><br>

		</article>
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
			?>
			<div class="container" id="loading">
				<div class="row">
					<div class="col-md-12">
						<h2><a href="#" class="load_more_button" id="load_more">LOAD MORE</a> </h2>
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
		<div id="demo_box">
            <span class="pop_ctrl"><i class="fa fa-spin fa-cog fa-3x" style="color:#1e305e;"></i></span>
            <ul id="demo_ul">
				 <img src="img/log.png" class="img-responsive" height="30" width="180" style="text-align:center;margin-top:3%;padding:1%;"/>	
				<li class="demo_li"><a href="http://beta.pedagoge.com"><div><i class="fa fa-home"></i></div><div>Pedagoge</div></a></li>
                <li class="demo_li"><a href="http://beta.pedagoge.com/register/registeras/"><div><i class="fa fa-user"></i></div><div>Sign up</div></a></li>
                <li class="demo_li"><a href="http://beta.pedagoge.com/login/"><div><i class="fa fa-sign-in"></i></div><div>Sign in</div></a></li>
               
            </ul>
        </div>
		
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/socialpic.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
		<script src="js/box.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="js/jquery.floating-social-share.min.js" type="text/javascript"></script>
		<script src="js/jquery.popmenu.js" type="text/javascript"></script>
		 <script src="js/script.js" type="text/javascript"></script>
		 
		<script>
		$(function(){
			$('img box_image_hover').socialpic();
		});
	<!--nfcekjsbgvfebl-->
			$(document).ready(function() {
				var track_click = 0; //track user click on "load more" button, righ now it is 0 click
				var total_pages = <?php echo $total_page; ?>;
				console.log(total_pages);
				if(total_pages < 7){
					console.log('ok');
					$('#load_more').css('display' , 'none');
				}
				console.log(total_pages);
				$('#results').load("fetch_pages.php", {'page':track_click}, function(){
					track_click++;
				}); 
				$("#load_more").click(function (e) { //user clicks on button
					//console.log('hello going on!!');
					$(this).hide(); 
					$('.animation_image').show('slow'); 
					if(track_click <= total_pages) //user click number is still less than total pages
					{
						//post page number and load returned data into result element
						$.post('fetch_pages.php',{'page': track_click}, function(data) {
						
							$("#load_more").show(); //bring back load more button
							$("#results").append(data); //append data received from server
							
							//scroll page smoothly to button id
							$("html, body").animate({scrollTop: $(".material-card").offset().top+1500},400);
							
							//hide loading image
							$('.animation_image').hide(); //hide loading image once data is received
				
							track_click++; //user click increment on load button
						
						}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
							alert(thrownError); //alert with HTTP error
							$("#load_more").show(); //bring back load more button
							$('.animation_image').hide(); //hide loading image once data is received
						});
						
						
						if(track_click >= total_pages-1) //compare user click with page number
						{
							//reached end of the page yet? disable load button
							$("#load_more").attr("disabled", "disabled");
						}
					}
					  
					});
			});
			
			$('#demo_box').popmenu({
				'controller': true,       // use control button or not
				'width': '100px',         // width of menu
				'background': '#22baa0',  // background color of menu
				'focusColor': '#2962ff',  // hover color of menu's buttons
				'borderRadius': '10px',   // radian of angles, '0' for right angle
				'top': '330',              // pixels that move up
				'left': '-40',              // pixels that move left
				'iconSize': '100px'       // size of menu's buttons
							
				
			});
			
			<!--jquery now fetching-->
					function win_loc(url) {
						window.location = url;
					}
					$(document).ready(function(){
					$('.shareCount').html("");
					});
		</script>
	</body>
</html>
