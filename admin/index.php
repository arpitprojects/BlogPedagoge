<?php include_once '../includes/connect.inc_blog.php';
	ob_start();
	//include_once'function.php';
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			ADMIN PANEL
		</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/admin.css" type="text/css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/easyeditor.css" type="text/css"/>
		<link rel="stylesheet" href="../css/easyeditor-modal.css" type="text/css"/>
		
	</head>
	<body>
		<!--code here-->
		<header>
		<div class="conatiner-fluid">
			<div class="row">
				<div class="col-md-2">
					<div class="navbar">
						<div class="navbar-inner">
							<a href="http://dev.pedagoge.com/"><img src="../img/logo.png" class="img-responsive pull-left" height="auto" width="12%"/></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</header>
		<br><br><br><br><br>
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<center>
						<h1>Pedagoge</h1>
					<?php 
							if(isset($_POST['title']) && isset($_FILES['desc']['tmp_name']) &&isset($_FILES['author_desc']['tmp_name']) && isset($_POST['content']) && isset($_POST['written_by']) && isset($_POST['author_content'])){
								$title  = mysql_real_escape_string($_POST['title']);
								$title  = trim($_POST['title']);
								$desc = $_FILES['desc']['tmp_name'];
								$content = mysql_real_escape_string($_POST['content']);
								$content = trim($_POST['content']);
								
								$written_by = trim($_POST['written_by']);
								$written_by = mysql_real_escape_string($_POST['written_by']);
								
								$author_content = trim($_POST['author_content']);
								$author_content = mysql_real_escape_string($_POST['author_content']);
								$date = date("Y/m/d");
								$time  = date("h:i:sa");
								$date1 = date('m-d-Y_H:i:s');
								$author_desc = addslashes($_FILES['author_desc']['tmp_name']);//for author image
								$desc = addslashes( $_FILES['desc']['tmp_name']);
								$desc_type = $_FILES['desc']['type'];
								$author_desc_type = $_FILES['author_desc']['type'];//name of the desc type
								$author_desc_name = $_FILES['author_desc']['name'];//name of author image
								$desc_name = $_FILES['desc']['name'];//we are not using this
								//for resising of images 
								$format_check = explode('.' , $desc_name);
								$format_check_author = explode('.',$author_desc_type);
								
								$date_compres  = date("Y-m-d h:i:s");
								$date_compres = str_replace(array("-",' ',':'), "" , $date_compres);
								mkdir("../pedagoge_content/" . $date_compres , 0755);
								$desc_name = md5($format_check[0]).".".$format_check[1];
								$author_desc_name = md5($format_check_author[0]).".".$format_check_author[1];
								
								
								$path = "/pedagoge_content/".$date_compres;
								$target_file= $path."/$desc_name";
								$target_file_author = $path."/$author_desc_name";
								$resized_file =$path."/resized_$desc_name";
								$wmax = 1920;
								$hmax = 1080;
								$counter = 0;
								$author_desc_name = "/".$author_desc_name;
								if(!empty($title) && !empty($desc) && !empty($content) && !empty($written_by) && !empty($author_content)){
									if(($format_check[1] == 'png') || ($format_check[1] == 'jpg') || ($format_check[1] == 'jpeg') || ($format_check[1] == 'gif') || ($format_check_author[1] == 'png') || ($format_check_author[1] == 'jpg') || ($format_check_author[1] == 'jpeg') || ($format_check_author[1] == 'gif')){
									move_uploaded_file($_FILES['desc']['tmp_name'] ,'../../blog'.$target_file);
									move_uploaded_file($_FILES['author_desc']['tmp_name'] , '../../blog'.$target_file_author);
									ak_img_resize('../../blog'.$target_file , '../../blog'.$resized_file , $wmax  , $hmax , $format_check[1]);//function defined at last
								}else{
									echo 'Image type should be JPEG | JPG | PNG | GIF | ';
								}
									$desc_name = '/resized_'.$desc_name;//to fetch same image as resied images 
									$query = "INSERT INTO `pedagoge_blog` VALUES('' , '".mysql_real_escape_string($title)."' ,'$path$desc_name','".mysql_real_escape_string($content)."','$date.$time','".mysql_real_escape_string($written_by)."','$path$author_desc_name','".mysql_real_escape_string($author_content)."','$counter','$counter')";
										
										if($query_run = mysql_query($query)){
												
											echo '<h5>' . 'SUCESSFYLLY INSERTED INTO DATABASE' . '</h5>' ;
											header('Location:admin_success.php');
											ob_end_flush();
										}else{
												echo mysql_error();
											}
									}else{
										echo '<h5>' . 'FIELDS CAN\'T BE EMPTY ..PLEASE RECHECK'.'</h5>';	
			
									}
								}
							?>
						</center>
					</div>
				</div>
			</div>
		</section>
		<br><br><br>
		<article>
		<form action="index.php" method="POST" onsubmit="return Validate(this);" enctype="multipart/form-data">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="title">Title of the Post : (limit:50 words)</label>
							<input type="text" name="title" maxlength="50" class="form-control" id="title" placeholder="Title" required>
							
						 </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputFile">Description : </label>
							<input type="file" id="file"  onchange="return ValidateFileUpload()"  name="desc" required>
							<p class="help-block">Please Upload image related to posts.</p>
						  </div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="title">Content of the Posts : </label>
							<textarea id="editor" name="content" placeholder="Put your Content here......." required><?php if(isset($content)){echo $content;}?></textarea>
						</div>
					</div>
				</div>
			</div>
			
	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="written">Written By :(limit:50 words) </label>
						<input type="text" name="written_by" maxlength="50" class="form-control" id="written" placeholder="Written By : " required>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputFile">Image Of the Author : </label>
						<input type="file" id="file1" name="author_desc">
							<p class="help-block">Note : This is an optional stuff :</p>
				</div>
			</div>
		</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="author_content">Author Description : </label>
						<input type="text" name="author_content" maxlength="500" class="form-control" id="author_content" placeholder="Author Desc: " required>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<center>
						<input type="submit" id="button" class="btn btn-success btn-lg btn-block" value="Submit the posts">
					</center>
				</div>
			</div>
		</div>
		</form>
		</article>
		<br><br><br><br><br>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-4">
							<br><br>
							<h4>CONNECT</h4>
							<br><br>
							<a href="#!"> About Us</a>
							<br><br>
							<a href="#!">Get In touch </a>
						</div>
						<div class="col-md-4">
							<br><br>
							<h4>LEGAL</h4>
							<br><br>
							<a href="#!">Privacy Policy</a>
							<br><br>
							<a href="#!">Terms and Conditions</a>
						
						</div>
						<div class="col-md-4">
							<br><br>
							<h4>SERVICE</h4>
							<br><br>
							<a href="#!">Pedagoe for Teacher</a>
							<br><br>
							<a href="#!">Pedagoge for Students</a>
						
						</div>
					</div>
					<br><br>
				</div>
			</div>
			<br><br>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<center>
							<img src="img/nasscom.png" class="img-responsive" width="20%" height="20%"/> 
						</center>
					</div>
				</div>
			</div>
		</footer>
		<div class="easyeditor-modal is-hidden" id="easyeditor-modal-1">
		<div class="easyeditor-modal-content">
        <div class="easyeditor-modal-content-header">Upload image</div>
        <div class="easyeditor-modal-content-body">
            <div class="easyeditor-modal-content-body-loader"></div>
            <button class="easyeditor-modal-close">x</button>

            <form action="../pedagoge_content/index.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" id="easyeditor-file">
                <button type="submit" name="easyeditor-upload">Upload and insert</button>
            </form>
			
        </div>
    </div>
</div>
<style>
	a , h4 , h5 , h6 , h2 , h1 , h2{
		color:black !important;
	}
</style>
		<script src="../js/jquery.js" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="../js/jquery.form.min.js" type="text/javascript"/></script>
		<script src="../js/jquery.easyeditor.js" type="text/javascript"></script>
		<script src="../js/admin.js" type="text/javascript"></script>
		<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js"></script>-->
		<script>
var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}	
	
$('#button').click( function() {

    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#file')[0].files[0].size;
        
        if(fsize>1048576) //do something vhjvif file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big! Put less than 1Mb");
			
			return false;
        }
    }else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
    }
});
$('#button').click( function() {
    //check whether browser fully supports all File API
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#file1')[0].files[0].size;
        
        if(fsize>512000) //do something if file size more than 1 mb (1048576)
        {
            alert(fsize +" \nToo big! Less than 512 kb");
			
			return false;
        }
    }else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
    }
});


<!--egnfuerg-->
 EasyEditor.prototype.image = function(){
        var _this = this;
        var settings = {
            buttonIdentifier: 'insert-image',
            buttonHtml: 'Insert image',
            clickHandler: function(){
                _this.openModal('#easyeditor-modal-1');
            }
        };

        _this.injectButton(settings);
    };

    jQuery(document).ready(function($) {
        var easyEditor = new EasyEditor('#editor', {
            buttons: ['bold', 'italic', 'link', 'h2', 'h3', 'h4', 'alignleft', 'aligncenter', 'alignright', 'quote', 'code', 'x', 'image' , 'youtube']
	
		});

        // form uploader starts using jquery.form.min.js
        $loader = $('.easyeditor-modal-content-body-loader');
        $('.easyeditor-modal-content-body').find('form').ajaxForm({
            beforeSend: function() {
                $loader.css('width', '0%');
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $loader.css('width', percentComplete + '%');
            },
            success: function() {
                $loader.css('width', '100%');
            },
            complete: function(get) {
                if(get.responseText != 'null') {
                    console.log(get.responseText);
					
					easyEditor.insertHtml('<figure><img src="../pedagoge_content/'+ get.responseText +'" alt="" class="img img-responsive"></figure>');
					//this is just for fetchong the image to show up in the DOM
					easyEditor.closeModal('#easyeditor-modal-1');
                }
            }
        });
        // form uploader ends using jquery.form.min.js
    });
	EasyEditor.prototype.youtube = function(){
        var _this = this;
        var settings = {
            buttonIdentifier: 'insert-youtube-video',
            buttonHtml: 'Insert youtube video',
            clickHandler: function(){
                var videoLink = prompt('Insert youtube video link', '');
                var videoId = _this.getYoutubeVideoIdFromUrl(videoLink);

                if(videoId.length > 0) {
                    var iframe = document.createElement('iframe');
                    $(iframe).attr({ width: '560', height: '315', frameborder: 0, allowfullscreen: true, src: 'https://www.youtube.com/embed/' + videoId });
                    _this.insertAtCaret(iframe);
                }
                else {
                    alert('Invalid YouTube URL!');
                }

            }
        };

        _this.injectButton(settings);
    };
	  function ValidateFileUpload() {
        var fuData = document.getElementById('file');
        var FileUploadPath = fuData.value;

//To check if user upload any file
        if (FileUploadPath == '') {
            console.log("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();



if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {


                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
				return false;

            }
        }
    }

	</script>
	</body>
</html>
<style>
em{
	font-style:italic;
}
</style>

<?php 
function ak_img_resize($target, $newcopy, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    if (($w / $h) > $scale_ratio) {
           $w = $h * $scale_ratio;
    } else {
           $h = $w / $scale_ratio;
    }
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){ 
      $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
      $img = imagecreatefrompng($target);
    } else { 
      $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagejpeg($tci, $newcopy, 80);
}
?>