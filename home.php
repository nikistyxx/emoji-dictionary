<?php
session_start();
date_default_timezone_set( "America/New_York" );
include "inc/config.php";
include "inc/insert.php";
?>
<!DOCTYPE html>
 <html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Emoji Dictionary</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/my.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
<!-- Add your site or application content here -->
<?php include 'header.php';
//This activates the div with the info about each emoji or print
      if ( isset( $_GET['emoji'] ) )
{
?>
      <div class="wordwrapper">
        <div class="addword">
<?php
  echo "<a href='form.php";
  echo "?form=", $_GET['emoji'];
  echo "'>";
?>
          <img alt="add" src="img/add.jpg" id="addbut"></a>
        </div>
<?php
  $emoji = $_GET['emoji'];
  print_posts();
?>
      </div>
<?php
}
?>
      <div class="wrapper">
<!--   This allows me to print all the emoji to the screen by pulling names from the database. -->
<?php
tile ();
?>
 <!--   end tile function -->
      </div>
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
