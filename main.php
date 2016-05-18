
<!DOCTYPE html>
<html>
    <head>
        <title>
            Pedagoge Blogs
			
        </title>
		<link rel="icon" href="http://www.pedagoge.com/favicon.ico" type="image/icon">
        <meta charset="UTF-8">
		<meta property="fb:app_id" content="219520801402619" />
        <meta property="og:site_name" content="meta site name"/>
        <meta property="og:url" content="http://blog.pedagoge.com/main.php?type=<?php echo $post_id; ?>"/>
       
        <meta property="og:title" content="<?php echo $post_title; ?>"/>
       
        <meta property="og:description" content="<?php echo $post_content; ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/main1.css" type="text/css">
		<link rel="stylesheet" href="css/jquery.floating-social-share.min.css" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		
    </head>
		 <body class="body">
		 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=219520801402619";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
			<div id="preloading">
			
				 <div class="KW_progressContainer">
					<div class="KW_progressBar">
						<h3></h3>
					</div>
			</div>
			</div>
			<style>
			body{
				font-family:myfirstfont !important;
			}
				#post_prev img , #post_prev h5{
					float :left;
					color:black;
				}
				#post_prev p{
					color:black  !important;
				}
				#post_next img, #post_next p , #post_next h5{
					float:right;
					color:black;
				}
				#post_prev img,#post_next img{
					padding-top:2%;
				} 
				.prev {
					letter-spacing:2px;
					cursor:pointer !important;
					font-family:myfirstfont;
				}
				#post_prev img , #post_next img{
					padding:2%;
				}
				#post_prev h5 , #post_next h5{
					padding-top:0 !important;
					
				}
				#post_prev img , #post_prev p , #post_next p , #post_next img{
					padding-top: 0 !important;
				}
				
			</style>

				<div id="loading">
				<!-- all page gets loaded-->
					<?php include_once 'fetch_posts.php'; ?>
				</div>
		<br><br><br>
		<br><br><br>
		
		<footer>
			<div class="container">
				<div class="row" style="border-bottom:1px solid white;">
					<br>
					<div class="col-md-4" >
						<h5>CONNECT</h5>
						<br>
						<p><a href="http://beta.pedagoge.com/about/"> About Us</a></p>
						<p><a href="http://beta.pedagoge.com/">Get in Touch</a></p>
						
					</div>
					<div class="col-md-4">
						<h5> LEGAL</h5>
						<br>
						<p><a href="http://beta.pedagoge.com/privacypolicy/">Privacy Policy</a></p>
						<p><a href="http://beta.pedagoge.com/terms/">Terms and Conditions</a></p>
					</div>
					<div class="col-md-4">
						<h5 onclick="win_loc('http://beta.pedagoge.com')">SERVICE</h5>
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
		<script src="js/share.min.js" type="text/javascript"></script>
		<!--<script src="js/jquery.progressScroll.js" type="text/javascript"></script>-->
		<script src="js/jquery.floating-social-share.min.js" type="text/javascript"></script>
		<script src="js/script1.js" type="text/javascript"></script>
		<script>
			function win_loc(url) {
						window.location = url;
					}
		</script>
				<script>
		var link  =  "<?php echo 'http://blog.pedagoge.com/main.php?post_id='.$post_id.'';?>";
		var title = "<?php echo $post_title; ?> ";
			 $("body").floatingSocialShare({
		place : "top-right",
        buttons: ["facebook", "twitter", "linkedin" , "envelope"],
        text: "share with: ",
        url: link,
		title : title , 
		place:'bottom-left'
 });
		</script>
		<script>
			
$(document).ready(function() {

var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
 $(document).on("click", '.whatsapp', function() {
        if( isMobile.any() ) {

            var text = $(this).attr("data-text");
            var url = $(this).attr("data-link");
            var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
            var whatsapp_url = "whatsapp://send?text=" + message;
            window.location.href = whatsapp_url;
        } else {
            alert("Please share this article in mobile device");
        }

    });
});
		</script>
    </body>
</html>