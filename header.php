
<?php
//include("logincheck.php");
?> 

<!DOCTYPE html>
<html class="no-js" lang="en">  
<head>
    <title>Fundlr</title>
    <meta charset="UTF-8">
	<link rel="shortcut icon" type="image/png" href="img/badge.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 
    <!--<script   src="https://code.jquery.com/jquery-3.1.0.min.js"  ></script>--->
	<script src="js/angular.js"></script>
	<script src="js/jquery-1.10.2.min.js"></script>  
    <script src="js/bootstrap.min.js"></script>     	 
    <script src="js/custom.js"></script>	 
    <script src="js/video.js"></script>	 
    <script src="js/editor.js"></script>	 
    <script src="js/m.no.js"></script>	 
    <script src="js/strength.js"></script>
	<script src="js/custom1.js"></script>
	<script src = "js/pace.js"></script>
	<!--script src="js/cropper.min.js"></script>
	<script src="js/cropper-main.js"></script-->
	<script src="js/clipboard.min.js"></script>
	<script type= "text/javascript" src= "js/jquery-2.2.0.js"></script>
	<script src="js/submit_disabled_enabled.js"></script>
	
 
    <!-- CSS Bootstrap & Custom -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/font-awesome.min.css" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" href="css/style.css">    
    <link rel="stylesheet" href="css/mob.css">    
    <link rel="stylesheet" href="css/editor.css">    
    <link rel="stylesheet" href="css/video-js.css">    
	<!--link href="css/cropper.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="css/cropper-main.css"-->
	 <link rel="stylesheet" href="css/media.css">    
	<script src="js/amaje.kickstart.min.js"></script> 
    <link href="css/amaje.min.css" rel="stylesheet" media="screen">
	<link href = "css/feedback.css" rel = "stylesheet">
	<link href = "css/pace.css" rel = "stylesheet">
	<link href = "css/terms.css" rel = "stylesheet">	
    <link rel="stylesheet" href="css/checbox.css">
    <link rel="stylesheet" href="css/radiobtn.css">
<style type = "text/css">
	#urllink
	{
		color:#37bc9b; 
		
	}
	#urllink:hover
	{
		color:#fff;
		background-color:#37bc9b;
		transition:all .2s ease-in-out;
		border-radius:5px;
		
	} 
	#embedlink
	{
		color:#ff8c1a; 

	}
	#embedlink:hover
	{
		color:#fff;
		background-color:#ff8c1a;
		transition:all .2s ease-in-out;
		border-radius:5px;
		
	} 

	/* for show hide in js for url and embed in: Start */
	#cpd{display:none;}

	#embed_span{display:none;}
    
/*    navbar toggle:start*/
    .navbar-toggle .icon-bar:nth-of-type(2) {
	  top: 1px;
    }

    .navbar-toggle .icon-bar:nth-of-type(3) {
        top: 2px;
    }

    .navbar-toggle .icon-bar {
          position: relative;
          transition: all 500ms ease-in-out;
    }
    .navbar-toggle.active .icon-bar:nth-of-type(1) {
          top: 6px;
          transform: rotate(45deg);
    }

    .navbar-toggle.active .icon-bar:nth-of-type(2) {
          background-color: transparent;
    }

    .navbar-toggle.active .icon-bar:nth-of-type(3) {
          top: -6px;
          transform: rotate(-45deg);
    }
/*    navbar toggle:finished*/
	/* for show hide in js for url and embed in: End */
/*    border of top navbar*/
    .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
        border-color: #ccc;
    }
/*    background color of hamburger*/
    .navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover,.navbar-inverse .navbar-toggle:active, .navbar-inverse .navbar-toggle.active {
        background-color: transparent;
    }
</style>
<!-- ========== COPY CURRENT URL FROM BUTTON / LINK CLICK: START ==========   -->

<script>
		$('.urllink').click(function(){
		var $this = $(this);
		$this.toggleClass('urllink');
		if($this.hasClass('urllink')){
			$this.text('Url Link');			
		} else {
			$this.text('Url Link Copied');
		}
	});
//    navbar toggle:start js
    $(document).ready(function () {
			  $(".navbar-toggle").on("click", function () {
				    $(this).toggleClass("active");
			  });
		});
</script>

<!-- Copying URL From Address Bar: Start -->
<script>
  function copyTextToClipboard(text) {
  	// alert(text);
  var textArea = document.createElement("textarea");
  $(".urllink", function(){			//jquery function for changing text after clicked: Start
    $("#cpd").show(0);
    // $("#cpd").hide(1500)
});									//jquery function for changing text after clicked: End
  // alert(text);

  //
  // *** This styling is an extra step which is likely not required. ***
  //
  // Why is it here? To ensure:
  // 1. the element is able to have focus and selection.
  // 2. if element was to flash render it has minimal visual impact.
  // 3. less flakyness with selection and copying which **might** occur if
  //    the textarea element is not visible.
  //
  // The likelihood is the element won't even render, not even a flash,
  // so some of these are just precautions. However in IE the element
  // is visible whilst the popup box asking the user for permission for
  // the web page to copy to the clipboard.
  //

  // Place in top-left corner of screen regardless of scroll position.
  textArea.style.position = 'fixed';
  textArea.style.top = 0;
  textArea.style.left = 0;

  // Ensure it has a small width and height. Setting to 1px / 1em
  // doesn't work as this gives a negative w/h on some browsers.
  textArea.style.width = '2em';
  textArea.style.height = '2em';

  // We don't need padding, reducing the size if it does flash render.
  textArea.style.padding = 0;

  // Clean up any borders.
  textArea.style.border = 'none';
  textArea.style.outline = 'none';
  textArea.style.boxShadow = 'none';

  // Avoid flash of white box if rendered for any reason.
  textArea.style.background = 'transparent';


  textArea.value = text;

  document.body.appendChild(textArea);

  textArea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Copying text command was ' + msg);
    // alert("successfully copied");
  } catch (err) {
    console.log('Oops, unable to copy');
  }

  document.body.removeChild(textArea);
}

function CopyLink(button_name) {
	// alert(button_name);
  copyTextToClipboard(location.href);

}
</script>
<!-- Copying URL From Address Bar: End -->

<!-- Copying URL From Embed: Start -->
<script>

function c(text){

	 $(".embedlink", function(){			//jquery function for changing text after clicked: Start
	    $("#embed_span").show(0);
	    // $("#cpd").hide(1500)
	});	
    var id = "mycustom-clipboard-textarea-hidden-id";
    var existsTextarea = document.getElementById(id);

    if(!existsTextarea){
        console.log("Creating textarea");
        var textarea = document.createElement("textarea");
        textarea.id = id;
        // Place in top-left corner of screen regardless of scroll position.
        textarea.style.position = 'fixed';
        textarea.style.top = 0;
        textarea.style.left = 0;

        // Ensure it has a small width and height. Setting to 1px / 1em
        // doesn't work as this gives a negative w/h on some browsers.
        textarea.style.width = '1px';
        textarea.style.height = '1px';

        // We don't need padding, reducing the size if it does flash render.
        textarea.style.padding = 0;

        // Clean up any borders.
        textarea.style.border = 'none';
        textarea.style.outline = 'none';
        textarea.style.boxShadow = 'none';

        // Avoid flash of white box if rendered for any reason.
        textarea.style.background = 'transparent';
        document.querySelector("body").appendChild(textarea);
        console.log("The textarea now exists :)");
        existsTextarea = document.getElementById(id);
    }else{
        console.log("The textarea already exists :3")
    }

    existsTextarea.value = text;
    existsTextarea.select();

    try {
        var status = document.execCommand('copy');
        if(!status){
            console.error("Cannot copy text");
        }else{
            console.log("The text is now on the clipboard");
        }
    } catch (err) {
        console.log('Unable to copy.');
    }
}
	function CopyEmbed(abc) {
		var $a = '<iframe width="560" height="315" src="https://www.youtube.com/embed/zKkUN-mJtPQ?list=PL6n9fhu94yhWKHkcL7RJmmXyxkuFB3KSl&quot; frameborder="0" allowfullscreen></iframe>';
		//alert(a);

		c($a);

		// $a.select();
		// var successful = document.execCommand('copy');
	}
</script>
<!-- Copying URL From Embed: End -->

<!-- ========== COPY CURRENT URL FROM BUTTON / LINK CLICK: END ==========   -->

</head>
<body ng-app="myApp"> 

 
<!--  navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display navbar-fixed-top-->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		</div>

		<a href="index1.php" class="navbar-brand"><img class="logo" src="img/logo.png" alt="logo"/></a>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
		 

		  <ul class="nav navbar-nav navbar-left">
			<li><a href="profile-index.php">Explore</a></li>
			<li><a href="profile-campaign1.php">Start a Campaign</a></li>
			<!--<li><a href="#">About Us</a></li>-->
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<!-- <li><a href="logout.php" style="color: inherit;">Logout</a></li> -->
			<a href="search.php">
			    <form class="search navbar-left" role="search">
					<div class="search-box "> 
						<input   placeholder="Search here.." type="text" class="form-control" />
						<i class="fa fa-search"></i>
					</div>
				  </form>	
			</a>
			<li><a href="" data-target="#login" data-toggle="modal"> <i class="fa fa-user"></i> </a></li>
		  </ul>
		  
		</div><!-- /.navbar-collapse -->
	</div>
 
  
 <div class="modal fade login in" id="login"  >
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Sign In  </h4>
                    </div>
                    <div class="modal-body">  
                        <div class="box ">
                             <div class="row ">
								 <div class="content col-xs-12">
									<div class="social">
										<a class="circle facebook" href="#">
											<i class="fa fa-facebook "></i>
										</a>
										<a class="circle twitter" href="#">
											<i class="fa fa-twitter "></i>
										</a>
										<a class="circle google" href="#">
											<i class="fa fa-google-plus "></i>
										</a>
										
										<a class="circle linkedin" href="#">
											<i class="fa fa-linkedin "></i>
										</a>
									</div>
									<div class="division">
										<div class="line l"></div>
										  <span>or</span>
										<div class="line r"></div>
									</div>
							
								<div class="form loginBox">
                                    <form method="POST" name = "signin" action="signin-dbm.php" >
                                    <input class="form-control" type="text" placeholder="someone@somewhere.com" name="uemail" required autofocus>
                                    <input class="form-control" type="password" placeholder="Password" name="password" required autofocus>
									<center><small><font color = "#cc0000"><b><div id = "errors"><?php echo @$_GET["e_login"];?></div></b></font></small></center>
			
									<a href="reset-password2.php"> <span class="frgt-p"> Forgot? </span> </a>
									 
									 <div class="col-xs-12">
										 <div class="row">
											 <div class="col-xs-6">
											 <div class="row"><a  href="signup.php"class="btn btn-lg btn-default " type="button" value="Sign Up" >Sign Up</a></div>
											</div>
											 <div class="col-xs-6">
											 <div class="row"><input style="margin-left: 5px;"  class="btn  btn-lg btn-primary" type="submit" name = "login" value="Sign In"/></div>
											</div>
										</div> 
									</div> 
                                    </form>
                                </div>
								 </div>
                             </div>
                        </div>
                        
                    </div>
                   <!-- <div class="modal-footer">
                        <div class="forgot login-footer">
                           <input class="btn btn-lg btn-default btn-block " type="button" value="Sign Up" >
                        </div>                        
                    </div>  -->      
    		      </div>
		      </div>
		  </div>
		  
		  
		  
		  
	
	<div class="modal fade " id="widget"  >
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"> Embed</h4>
                    </div>
                    <div class="modal-body">  
                        <div class="box">
                             <div class="content">
								 <div class="row ">
											   
									<div class="col-sm-7 ">
									<h4 class="modal-title "> Preview </h4>
										<div class="card">
											<img src="img/thirs.png" alt="project image" class="img-responsive"/>
											 
											<div class="pad-lr-25">
												<h5 class="author pad-15"> Nura - Headset reinvented for perfect silence 
				and luxury that your ears deserve<span> </span> </h5>
												<ul class="list-inline bdr-btm">
												<li>  Nura Inc.  </li> 
												<li class="pull-right">   New Delhi, DL </li> 								
												</ul>
												<p> Project description  sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. Aliquam in felis econ. </p>
												
																				
												<div class="progress mt-20">
												  <div class="progress-bar " role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
													<span class="sr-only">70% Complete</span>
												  </div>
												</div>

												<ul class="list-inline card-stage">
												<li>  207% <p> Funded </p> </li> 
												<li>  $25 <p> Pledged </p> </li>  
												<li class="pull-right">  32 <p> Days to go </p> </li> 
												
												</ul>
											</div>
										</div>							   

									</div>
									<div class="col-sm-5 ">
										<h4 class="modal-title">  Code</h4>
									   <textarea style="padding-left:10px;" rows="8" cols="25"><iframe frameborder="0" height="420" scrolling="no" src=" http://chasingpapers.com/fund/project/nura-headset.php" width="220"></iframe> </textarea> 
										 

									</div>  
									
									
								</div> 
								
                             </div>
                        </div>
                        
                    </div>
                   <!-- <div class="modal-footer">
                        <div class="forgot login-footer">
                           <input class="btn btn-lg btn-default btn-block " type="button" value="Sign Up" >
                        </div>                        
                    </div>  -->      
    		      </div>
		      </div>
		  </div>
	<div class="modal fade login in " id="widget-url"  >
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"> Embed Hyperlink</h4>
                    </div>
                    <div class="modal-body">  
                        <div class="box">
                             <div class="content">
								 <div class="row ">
											   
									 
									<div class="col-sm-6 ">
										 
										<h4 class="modal-title">  Hyperlink Code</h4>
									   <textarea rows="6" cols="43"> http://chasingpapers.com/fund/project/nura-headset.php </textarea> 

									</div>  
									
									
								</div> 
								
                             </div>
                        </div>
                        
                    </div>
                   <!-- <div class="modal-footer">
                        <div class="forgot login-footer">
                           <input class="btn btn-lg btn-default btn-block " type="button" value="Sign Up" >
                        </div>                        
                    </div>  -->      
    		      </div>
		      </div>
		  </div>

	 <!-- Share popup -->	  
		  
		  <div class="modal fade in   share_popup" id="connect"  >
		      <div class="modal-dialog ">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"> Connect to Campaign</h4>
                    </div>
                    <div class="modal-body ">  
                        <div class="box">
                            
								 <div class="pad-10 text-left">
									<a href="" class="web">
									<i class="fa fa-globe"></i> chasingpapers.com</a>
								 </div>
								 <div class="pad-10 text-left">
									<a href="" class="fb">
									<i class="fa fa-facebook"></i> facebook.com/xyz_123</a>
								 </div>
								
								 <div class="pad-10 text-left">
									<a href="" class="twtr">
									<i class="fa fa-twitter"></i>  twitter.com/xyz_123 </a>
								 </div>
							
								 <div class="pad-10 text-left">
									<a href="" class="google-plus">
									<i class="fa fa-google-plus"></i>  google.com/xyz_123 </a>
								 </div>
								 
								 <div class="pad-10 text-left">
									<a href="" class="linkedin">
									<i class="fa fa-linkedin"></i>  linkedin.com/xyz_123</a>
								 </div>
							  
                        </div>
                        
                    </div>
                   <!-- <div class="modal-footer">
                        <div class="forgot login-footer">
                           <input class="btn btn-lg btn-default btn-block " type="button" value="Sign Up" >
                        </div>                        
                    </div>  -->      
    		      </div>
		      </div>
		  </div>
		  <div class="modal fade in share_popup" id="share"  >
		      <div class="modal-dialog ">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"> Share Campaign</h4>
                    </div>
                    <div class="modal-body ">  
                        <div class="box">
                             
								 <div class="pad-10 text-center">
									<a href="" class="fb">
									<i class="fa fa-facebook"></i> 180k</a>
								 </div>
								
								 <div class="pad-10 text-center">
									<a href="" class="twtr">
									<i class="fa fa-twitter"></i> 205k </a>
								 </div>
							
								 <div class="pad-10 text-center">
									<a href="" class="google-plus">
									<i class="fa fa-google-plus"></i> 20k </a>
								 </div>
								 
								 <div class="pad-10 text-center">
									<a href="" class="linkedin">
									<i class="fa fa-linkedin"></i> 404k</a>
								 </div>
								 
								
								 <div class="pad-10 text-center">
									<a href="" class="urllink" onclick="CopyLink(this)">
									<i class="fa fa-link"></i> URL Link <span id = "cpd">Copied</span></a>

								 </div>
								 
								 <div class="pad-10 text-center">
									<a href="" class="embedlink" onclick="CopyEmbed(this)">
									 <i class="fa fa-code"></i>Embed <span id = "embed_span">Copied</span></a>
								 </div>

								 <!-- For Passing Embed Variable through some php variable: Start -->

								 <?php /*$a = "Amir";*/ ?>
								<!-- <div class="pad-10 text-center">
									<a href="" class="embedlink" onclick="CopyEmbed('<?php echo $a;?>')">
									 <i class="fa fa-code"></i>Embed <span id = "embed_span">Copied</span></a>
								 </div> -->

								<!-- For Passing Embed Variable through some php variable: End -->
								 								 
					
                        </div>
                        
                    </div>
                   <!-- <div class="modal-footer">
                        <div class="forgot login-footer">
                           <input class="btn btn-lg btn-default btn-block " type="button" value="Sign Up" >
                        </div>                        
                    </div>  -->      
    		      </div>
		      </div>
		  </div>
 
 

 <script>
  //copy to clipnord js
var clipboard = new Clipboard('.btn');
     clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
 </script>
 