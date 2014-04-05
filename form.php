<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
       
       <?php include 'header.php'; ?>
<!--this is where the form goes-->
        <div class="formwrapper">
        <div><p>Noun (person, place or thing)</p>
                    <input type="text" placeholder="dog" name="Noun"/>
        </div>
        <div><p>Verb (action word)</p>
                    <input type="text" placeholder="to run" name="Noun"/>
        </div>
        <div><p>Adjective (descriptive word)</p>
                    <input type="text" placeholder="fluffy" name="Noun"/>
        </div>
        <div><br>Please type and example sentence using one or all of the words above.<br>
        </div>
        <div>              
            <br><textarea name="ExampleSentence" placeholder="The fluffy dog ran far."> </textarea>
        </div>
        <div class="submit">
            <br><button type="submit">Submit</button>
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