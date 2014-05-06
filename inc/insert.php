
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


//insert into the database
  function insert( $noun, $verb, $adjective, $define, $example )
  {
      require "config.php";
      try {
        ChromePhp::log('Hello console!');
         $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password); 
       
    	 $statement = $db->prepare( "INSERT INTO smilingface (emoji, noun, verb, adjective, define, example) VALUES (:emoji, :noun, :verb, :adjective, :define, :example)" );
    	 
      	 $statement->execute( array(
           ":emoji" => $emoji,
             ":noun" => $noun, 
             ":verb" => $verb,
             ":adjective" => $adjective,
             ":define" => $define,
             ":example" => $example
             ) );  
         ChromePhp::log('FML!');

         } 

catch( Exception $error ) {
      die("Insert failed: " . $error->getMessage());
   }
  }

//The whitelist to make sure the noun posts are acurate. 
function white_listn()
{
   $state = false;
   $count = 0;
   $whitelist = array( "emoji", "noun" );

   if( isset( $_POST ) )
      foreach( $_POST as $key => $value )
         if( in_array( $key, $whitelist ) )
            $count++;

   if( $count == count( $_POST ) )
      $state = true;

   return $state;
}


// insert into noun table
  function insertnoun( $emoji, $noun )
  {
      require "config.php";
      try {
        ChromePhp::log('Hello console!');
         $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password); 
       
       $statement = $db->prepare( "INSERT INTO nouns (emoji, noun) VALUES (:emoji, :noun)" );
        // $emoji = $_GET['form'];
         //declare in the order variable
   $statement->execute( array(
            ":emoji" => $emoji,
             ":noun" => $noun
              ) ); 

         ChromePhp::log('$noun, $emoji');
    
         } 
 // echo "{$noun[emoji]\n";
  

catch( Exception $error ) {
      die("Insert failed: " . $error->getMessage());
   }

  }


  //test function!

  function test( $PHP_SELF, $noun )
  {
      require "config.php";
      try {
        ChromePhp::log('Hello console!');
         $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password); 
       
       $statement = $db->prepare( "INSERT INTO smilingface (EmojiCode, noun) VALUES (smilingface, :noun)" );
       
         $statement->execute( array(
             "PHP_SELF" => PHP_SELF, 
             ":noun" => $noun, 
        
             ) );  
         ChromePhp::log('FML!');
         } 

catch( Exception $error ) {
      die("Insert failed: " . $error->getMessage());
   }
  }

//redirecting back home 
function redirect(){
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Location: home.php');
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
      $statement=$db->prepare( "SELECT * FROM  noun WHERE emoji = '$emoji'");
        // foreach ($db->prepare( 'SELECT noun FROM  noun WHERE EmojiCode = ' . $emoji) as $row)

       $statement->execute();

      // Return an entire table’s worth

        echo "<div class=\"post\">";
         echo"<div id='big'><img src=img/" ;  
                echo "$emoji \n";
                echo "  ></div>\n";
         
          echo "   <table>\n";
         echo "      <tbody>\n";
          echo "         <tr>\n";

        
       
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
         $statement=$db->prepare( "SELECT * FROM  verb WHERE emoji = '$emoji'");
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
            if ($row['adj'] != NULL) {
         echo "{$row['adj']}, \n";
          }
          }
         echo "         </td></tr>\n";

         //def array
         $statement=$db->prepare( "SELECT * FROM  define WHERE emoji = '$emoji'");
          echo "         <tr>\n";
          echo "            <th>Definition</th><td> ";
          $statement->execute();
          while ($row = $statement->fetch()) {
           
         echo"  ". nl2br( $row['def'] ) . " \n";
          
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
    ?>
 