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
 //This activates the div with the form
                if (isset($_GET['form']))
                    //safe checks? 
                    {
                ?>
            <div class="formwrapper">
                <?php
                $emoji = $_GET['form'];
            echo"<img src=img/" ;  
                echo "$emoji \n";
                echo "  height='80px'>\n";

                ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  accept-charset="utf-8">
                <input method="post" type="hidden" value="<?php echo $emoji ?>" name="emoji"/>
                <div><p>Noun (person, place or thing)</p>
                     <input type="text" placeholder="dog" name="noun"/>
                </div>
                <!-- <div><p>Verb (action word)</p>
                      <input type="text" placeholder="to run" name="verb"/>
                </div>
                <div><p>Adjective (descriptive word)</p>
                      <input type="text" placeholder="fluffy" name="adjective"/>
                </div>
                <div><br>What does this emoji mean to you?.<br>
                </div>
                <div>              
                    <br><textarea name="define" placeholder="The fluffy dog ran far."> </textarea>
                </div>
                <div><br>Please type and example sentence using one or all of the words above.<br>
                </div>
                <div>              
                    <br><textarea name="example" placeholder="The fluffy dog ran far."> </textarea>
                </div> -->
                <div class="submit">
                    
                    <br><button type="submit">Submit</button>
                </div>
            </form> 
            <?php 
                if( white_list() ) {
                    $emoji = ( strlen( $_POST["emoji"] ) > 0 ) ?
            htmlentities( trim( $_POST["emoji"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
                     $noun = ( strlen( $_POST["noun"] ) > 0 ) ?
            htmlentities( trim( $_POST["noun"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
            //         $verb = ( strlen( $_POST["verb"] ) > 0 ) ?
            // htmlentities( trim( $_POST["verb"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
            //         $adjective = ( strlen( $_POST["adjective"] ) > 0 ) ?
            // htmlentities( trim( $_POST["adjective"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
            //         $define = ( strlen( $_POST["define"] ) > 0 ) ?
            // htmlentities( trim( $_POST["define"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
            //         $example = ( strlen( $_POST["example"] ) > 0 ) ?
            // htmlentities( trim( $_POST["example"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";


            insertnoun( $emoji, $noun );
            // redirect();

                }
            }
        
            ?>
            
                 
        </div>
            
           
        
 <?php
 //This activates the div with the info about each emoji or print
                if (isset($_GET['emoji']))
                    //safe checks? 
                    {
             ?> 
        
        
              <div class="wordwrapper">
            <div class="addword">

       
                <?php
                echo "<a href='", $_SERVER['PHP_SELF'];
                 echo "?form=",   $_GET['emoji'];
                 echo "'>";
                 ?>
                <img src="img/add.jpg" id="addbut"></a>           
            </div>

            <?php
          
               $emoji = $_GET['emoji'];
                
                print_posts();

            }
            ?> 
         </div>

 <!--   This allows me to print all the emoji to the screen by pulling names from the database. -->

        <div class="wrapper">

         <?php

            ChromePhp::log('Hello console!');
            $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password); 
               
                          
         $statement=$db->prepare('SELECT emoji from emojiname');

         $statement->execute();

          while ($row = $statement->fetch()) {
            if ($row['emoji'] != NULL) {
                 echo "<a href='", $_SERVER['PHP_SELF'];
                 echo "?emoji=",  $row['emoji'];
                 echo "'>";
                 echo"<img src=img/" ;
               
        echo "{$row['emoji']} \n";
         echo "  height='80px'></a>\n";
         
          }
        }
          $statement = null;
          ?>
    
            
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
