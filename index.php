<?php
session_start();
//if this is the first click it takes you to the page home.php with all the emoji
if( !isset( $_GET['action'] ) ) {
   $_GET['action'] = "register";
   header( "Location: home.php" );
}

include "includes/main.php";
if( isset( $_GET['action'] ) )
   if( $_GET['action'] == "login" ) {
      header( "?emoji=",  $row['emoji']);
      $subheading = $button_value = "Login";
   }
   else
      if( $_GET['action'] == "form" ) {
         header( "?form=",  $row['emoji']);
         $subheading = $button_value = "Register";
      }
 ?>

<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible">
        <title>Emoji Dictionary</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/my.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
  </head>
  <body>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='http://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
  </body>
</html>
