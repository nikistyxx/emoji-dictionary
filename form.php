<?php
session_start();
date_default_timezone_set( "America/New_York" );
include "inc/insert.php";
include "inc/config.php";

?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Emoji Dictionary Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/my.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
       
       <?php include 'header.php'; 
//printing the definition to the page
       //  // pullemoji();
       // $emoji = $_GET['form'];
       ?>
<!--this is where the form goes-->
        <div class="imgword">
            
        </div>
        
        <div class="formwrapper">
            <img src="img/emoji10.jpg" height="80px">
            <form method="post" action=""  accept-charset="utf-8">
              
                <div><p>Noun (person, place or thing)</p>
                     <input type="text" placeholder="dog" name="noun"/>
                </div>
                <div><p>Verb (action word)</p>
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
                </div>
                <div class="submit">
                    
                    <br><button type="submit">Submit</button>
                    <input method="post" type="hidden" value="<?php echo $emoji ?>" name="emoji"/>
                </div>
            </form> 
            <?php 
            $emoji = $_GET['form'];
            if( isset( $_POST["emoji"] ) ) {
                if( white_list() ) {
                    $noun = ( strlen( $_POST["noun"] ) > 0 ) ? htmlentities( trim( $_POST["noun"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
                    $verb = ( strlen( $_POST["verb"] ) > 0 ) ? htmlentities( trim( $_POST["verb"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
                    $adjective = ( strlen( $_POST["adjective"] ) > 0 ) ? htmlentities( trim( $_POST["adjective"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
                    $define = ( strlen( $_POST["define"] ) > 0 ) ? htmlentities( trim( $_POST["define"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
                    $example = ( strlen( $_POST["example"] ) > 0 ) ? htmlentities( trim( $_POST["example"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";

  
            insert( $emoji, $noun, $verb, $adjective, $define, $example );
            // insert1($emoji, $noun);
            redirect();

                }
            }
        
            ?>
            
                <div id="book">
                    <br><a href="./"><img src="img/book.jpg" height="60px">Return to Dictionary Home</a>
                </div>  
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