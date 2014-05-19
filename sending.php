<?php 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
LET's SEND THE EMAIL :)
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$yourEmail = 'youremail@email.fr'; //set your email here..

//If the form is submitted
if(isset($_POST['submitted'])) { 
    //Check to make sure that the name field is not empty
    if($_POST['contact_name'] === '') { 
            $hasError = true;
    } else {
            $name = $_POST['contact_name'];
    }

    //Check to make sure sure that a valid email address is submitted
    if($_POST['contact_email'] === '')  { 
            $hasError = true;
    } else if (!preg_match("/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i", $_POST['contact_email'])) {
            $hasError = true;
    } else {
            $email = $_POST['contact_email'];
    }

    //Check to make sure comments were entered	
    if($_POST['contact_textarea'] === '') {
            $hasError = true;
    } else {
            if(function_exists('stripslashes')) {
                    $comments = stripslashes($_POST['contact_textarea']);
            } else {
                    $comments = $_POST['contact_textarea'];
            }
    }

    //If there is no error, send the email
    if(!isset($hasError)) {

            $emailTo = $yourEmail ;
            $subject = "Message from your website";
            $body = "Name: $name \n\nEmail: $email \n\nMessage: $comments";
            $headers = 'From : my site <'.$emailTo.'>' . "\r\n" . 'answer to : ' . $email;

            mail($emailTo, $subject, $body, $headers);

            $emailSent = true; 
    }
    
}
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- PAGE TITLE -->
    <title>Sending the email ...</title>
    <meta charset="UTF-8">
    <!-- MAKE IT RESPONSIVE -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEO -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- BOOTSTRAP -->
    <link href="styles/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- MAIN STYLESHEET -->
    <link href="styles/style.css" rel="stylesheet" media="screen">
    <!-- LOAD FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Amatic+SC:700,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- START BODY -->
  <body>
  
  	<section id="mail-message" <?php if(isset($emailSent) && $emailSent == true){ ?> class="email-sent" <?php } ?>>
	  	<?php if(isset($emailSent) && $emailSent == true) { ?>
	  		<i class="fa fa-check"></i>
	        <h1><?php echo'Thanks, '. $name  .'.';?></h1>
	        <p>
	        	<?php echo'Your message was sent successfully. You will receive a response shortly. <strong>(You will be redirected in 4 seconds)</strong>'; ?>
	        </p>
	    <?php } ?>
	    <?php if(isset($hasError) && $hasError == true) { ?>
	    	<i class="fa fa-times"></i>
	        <h1><?php echo'Sorry,'; ?></h1>
	        <p>
	        	<?php echo'Your message can\'t be send...check if your email is correct otherwise a field is missing... <strong>(You will be redirected in 5 seconds)</strong>'; ?>
	        </p>
	    <?php } ?>
  	</section>
	
	<div id="layer"></div>
	
	<div id="background">
		<!-- BACKGROUND IMAGES -->
		<ul class="slides-container">
			<li><img src="images/slider1.jpg" alt="Background Image"/></li>
			<li><img src="images/slider2.jpg" alt="Background Image"/></li>
			<li><img src="images/slider3.jpg" alt="Background Image"/></li>
			<li><img src="images/slider4.jpg" alt="Background Image"/></li>
		</ul>
	</div>

    <!-- LOAD JAVASCRIPTS FILES -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/jquery.form-validator.min.js"></script>
    <script src="js/custom.js"></script>
    
    <!-- THEN REDIRECT TO MAIN PAGE -->
    <script type="text/JavaScript">
	setTimeout("location.href = 'index.html';",4000);
	</script>
  </body>
  <!-- END BODY -->
</html>
