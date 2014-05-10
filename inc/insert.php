
<?php
    include "ChromePhp.php";

//The whitelist to make sure the posts are acurate.
function white_list()
{
   $state = false;
   $count = 0;
   $whitelist = array( "emoji", "noun", "verb", "adjective", "define", "example" );
   if( isset( $_POST ) )
      foreach( $_POST as $key => $value )
         if( in_array( $key, $whitelist ) )
            $count++;
   if( $count == count( $_POST ) )
      $state = true;
   return $state;
}

//This allows me to print all the emoji to the screen by pulling names from the database. 
function tile()
{
  require "config.php";
ChromePhp::log( 'Hello console!' );
$db = new PDO( "mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password );
$statement=$db->prepare( 'SELECT emoji from emojiname' );
$statement->execute();

while ( $row = $statement->fetch() ) {
  if ( $row['emoji'] != NULL ) {
    echo "<a href='", $_SERVER['PHP_SELF'];
    echo "?emoji=",  $row['emoji'];
    echo "'>";
    echo"<img alt='emoji' src=img/" ;
    echo "{$row['emoji']} \n";
    echo " height='80' ></a>\n";
  }
 }
$statement = null;
}

//insert into the database
function insert( $emoji, $noun, $verb, $adjective, $define, $example )
  {
      require "config.php";
      try {
        ChromePhp::log('Hello console!');
         $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password);
    	 $statement = $db->prepare( "INSERT INTO nouns (emoji, noun) VALUES (:emoji, :noun)" );
      	 $statement->execute( array(
           ":emoji" => $emoji,
             ":noun" => $noun
             ) );

   $emoji = $_GET['form'];
    ChromePhp::log('FML!');
         }

catch( Exception $error ) {
      die("Insert failed: " . $error->getMessage());
   }
//verb
     try {
        ChromePhp::log('Hello console!');
         $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password);
       $statement = $db->prepare( "INSERT INTO verbs (emoji, verb) VALUES (:emoji, :verb)" );
         $statement->execute( array(
           ":emoji" => $emoji,
             ":verb" => $verb

             ) );

  }
 catch( Exception $error ) {
      die("Insert failed: " . $error->getMessage());
  }
//adjective
     try {
        ChromePhp::log('Hello console!');
         $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password);

       $statement = $db->prepare( "INSERT INTO adjective (emoji, adjective) VALUES (:emoji, :adjective)" );

         $statement->execute( array(
           ":emoji" => $emoji,
             ":adjective" => $adjective

             ) );

  }
 catch( Exception $error ) {
      die("Insert failed: " . $error->getMessage());
  }
//define
     try {
        ChromePhp::log('Hello console!');
         $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password);

       $statement = $db->prepare( "INSERT INTO define (emoji, define) VALUES (:emoji, :define)" );

         $statement->execute( array(
           ":emoji" => $emoji,
             ":define" => $define
             ) );
  }
 catch( Exception $error ) {
      die("Insert failed: " . $error->getMessage());
  }
//example
     try {
        ChromePhp::log('Hello console!');
         $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password);

       $statement = $db->prepare( "INSERT INTO example (emoji, example) VALUES (:emoji, :example)" );

         $statement->execute( array(
           ":emoji" => $emoji,
             ":example" => $example

             ) );
  }
 catch( Exception $error ) {
      die("Insert failed: " . $error->getMessage());
  }
  }//function end

//redirecting back home
function redirect(){
$emoji = $_GET['form'];
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // header('Location: home.php');
header( "Location: home.php?emoji=$emoji");
 }
}

//printing the definition to the page
  function print_posts()
{
   require "config.php";
   try {
      $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password);

       ChromePhp::log('print posts works!');
        $emoji = $_GET['emoji'];
      $statement=$db->prepare( "SELECT * FROM  nouns WHERE emoji = '$emoji'");

       $statement->execute();

// Return an entire table’s worth
        echo "<div class=\"post\">";
         echo"<div id='big'><img alt='emoji' src=img/" ;
                echo "$emoji \n";
                echo "  ></div>\n";

          echo "   <table>\n";
         echo "      <tbody>\n";
 //noun array
         echo "         <tr>\n";
          echo "            <th>Noun</th><td>";
          while ($row = $statement->fetch()) {
            if ($row['noun'] != NULL) {
        echo "{$row['noun']}, \n";
          }
        }
         echo "         </td></tr>\n";
//verb array
         $statement=$db->prepare( "SELECT * FROM  verbs WHERE emoji = '$emoji'");
          echo "         <tr>\n";
          echo "            <th>Verb</th><td>";
          $statement->execute();

          while ($row = $statement->fetch()) {
            if ($row['verb'] != NULL) {
         echo "{$row['verb']}, \n";
          }
        }
         echo "         </td></tr>\n";

//adjective array
         $statement=$db->prepare( "SELECT * FROM  adjective WHERE emoji = '$emoji'");
          echo "         <tr>\n";
          echo "            <th>Adjective</th><td>";
          $statement->execute();
          while ($row = $statement->fetch()) {
            if ($row['adjective'] != NULL) {
         echo "{$row['adjective']}, \n";
          }
          }
         echo "         </td></tr>\n";

//def array
         $statement=$db->prepare( "SELECT * FROM  define WHERE emoji = '$emoji'");
          echo "         <tr>\n";
          echo "            <th>Definition</th><td> ";
          $statement->execute();
          while ($row = $statement->fetch()) {
         echo"  ". nl2br( $row['define'] ) . " \n";
        }
         echo "         </td></tr>\n";

//example array
         $statement=$db->prepare( "SELECT * FROM  example WHERE emoji = '$emoji'");
          echo "         <tr>\n";
          echo "            <th>Example of Use</th><td> ";
          $statement->execute();
          while ($row = $statement->fetch()) {
            if ($row['example'] != NULL) {
            }
         echo"  ". nl2br( $row['example'] ) . " \n";
          }
         echo "         </td></tr>\n";
         echo "      </tbody>\n";
         echo "   </table>\n";
         echo "</div>\n";


      $statement = null;
   }
   catch( Exception $error ) {
      die("Reading DB failed: " . $error->getMessage());
   }
}

//printing the definition to the page
function pullemoji()
{
ChromePhp::log('Hello console!');
$db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password);

         $statement=$db->prepare('SELECT emoji from emojiname');
         $statement->execute();

          while ($row = $statement->fetch()) {
            if ($row['emoji'] != NULL) {
                 echo "<a href='", $_SERVER['PHP_SELF'];
                 echo "?emoji=",  $row['emoji'];
                 echo "'>";
          }
        }
 $statement = null;
}
?>