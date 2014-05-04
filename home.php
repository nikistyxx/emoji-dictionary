<?php
session_start();
date_default_timezone_set( "America/New_York" );
include "inc/config.php";
// include 'inc/ChromePhp.php';
 include "inc/insert.php";
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <?php include 'header.php';
           ?>
 <?php
                if (isset($_GET['emoji']))
                    //safe checks? 
                    {
             ?> 
        
        
              <div class="wordwrapper">
            <div class="addword"><a href="form.php"><img src="img/add.jpg" id="addbut"></a>           
            </div>

            <?php
          
               $emoji = $_GET['emoji'];
                
                print_posts();

            }
            ?> 
         </div>

        <div class="wrapper">
         <?php
            ChromePhp::log('Hello console!');
            $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password); 
               
                            // print("<li><a class='cover' href='" . $_SERVER['PHP_SELF']. "?book_id=" . $row['book_id'] . "'> <img src='img/" . $row['Cover'] . "' alt='" . $row['Name'] . "' /> </a></li>\n");
                             
         $statement=$db->prepare('SELECT EmojiCode from emojiname');

         $statement->execute();

          while ($row = $statement->fetch()) {
            if ($row['EmojiCode'] != NULL) {
                 echo "<a href='", $_SERVER['PHP_SELF'];
                 echo "?emoji=",  $row['EmojiCode'];
                 echo "'>";
                 echo"<img src=img/" ;
               
        echo "{$row['EmojiCode']} \n";
         echo "  height='80px'></a>\n";
         
          }
        }
          $statement = null;
          ?>
    
            
        </div>
            <!-- <a href="word.php"><img src="img/emoji10.jpg" height="80px"></a>
            <img src="img/emoji11.jpg" height="80px";>
            <img src="img/emoji13.jpg" height="80px";>
            <img src="img/emoji14.jpg" height="80px";>
            <img src="img/emoji15.jpg" height="80px";>
            <img src="img/emoji16.jpg" height="80px";>
            <img src="img/emoji17.jpg" height="80px";>
            <img src="img/emoji18.jpg" height="80px";>
            <img src="img/emoji19.jpg" height="80px";>
            <img src="img/emoji20.jpg" height="80px";>
            <img src="img/emoji21.jpg" height="80px";>
            <img src="img/emoji22.jpg" height="80px";>
            <img src="img/emoji23.jpg" height="80px";>
            <img src="img/emoji24.jpg" height="80px";>
            <img src="img/emoji25.jpg" height="80px";>
            <img src="img/emoji26.jpg" height="80px";>
            <img src="img/emoji27.jpg" height="80px";>
            <img src="img/emoji28.jpg" height="80px";>
            <img src="img/emoji29.jpg" height="80px";>
            <img src="img/emoji30.jpg" height="80px";>
            <img src="img/emoji31.jpg" height="80px";>
            <img src="img/emoji32.jpg" height="80px";>
            <img src="img/emoji33.jpg" height="80px";>
            <img src="img/emoji34.jpg" height="80px";>
            <img src="img/emoji35.jpg" height="80px";>
            <img src="img/emoji36.jpg" height="80px";>
            <img src="img/emoji37.jpg" height="80px";>
            <img src="img/emoji38.jpg" height="80px";>
            <img src="img/emoji39.jpg" height="80px";>
            <img src="img/emoji40.jpg" height="80px";>
            <img src="img/emoji41.jpg" height="80px";>
            <img src="img/emoji42.jpg" height="80px";>
            <img src="img/emoji43.jpg" height="80px";>
            <img src="img/emoji44.jpg" height="80px";>
            <img src="img/emoji45.jpg" height="80px";>
            <img src="img/emoji46.jpg" height="80px";>
            <img src="img/emoji47.jpg" height="80px";>
            <img src="img/emoji48.jpg" height="80px";>
            <img src="img/emoji49.jpg" height="80px";>
            <img src="img/emoji50.jpg" height="80px";>
            <img src="img/emoji51.jpg" height="80px";>
            <img src="img/emoji52.jpg" height="80px";>
            <img src="img/emoji53.jpg" height="80px";>
            <img src="img/emoji54.jpg" height="80px";>
            <img src="img/emoji55.jpg" height="80px";>
            <img src="img/emoji56.jpg" height="80px";>
            <img src="img/emoji57.jpg" height="80px";>
            <img src="img/emoji58.jpg" height="80px";>
            <img src="img/emoji59.jpg" height="80px";>
            <img src="img/emoji60.jpg" height="80px";>
            <img src="img/emoji61.jpg" height="80px";>
            <img src="img/emoji62.jpg" height="80px";>
            <img src="img/emoji63.jpg" height="80px";>
            <img src="img/emoji64.jpg" height="80px";> -->



        

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
