
    <?php
    include 'ChromePhp.php';

function white_list()
{
   $state = false;
   $count = 0;
   $whitelist = array( "noun", "verb", "adj", "def", "example" );

   if( isset( $_POST ) )
      foreach( $_POST as $key => $value )
         if( in_array( $key, $whitelist ) )
            $count++;

   if( $count == count( $_POST ) )
      $state = true;

   return $state;
}


  function insert( $noun, $verb, $adj, $def, $example )
  {
      require "config.php";
      try {
        ChromePhp::log('Hello console!');
         $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password); 
       
    	 $statement = $db->prepare( "INSERT INTO smilingface (noun, verb, adj, def, example) VALUES (:noun, :verb, :adj, :def, :example)" );
    	 
      	 $statement->execute( array(
             ":noun" => $noun, 
             ":verb" => $verb,
             ":adj" => $adj,
             ":def" => $def,
             ":example" => $example
             ) );  
         ChromePhp::log('FML!');

         } 

catch( Exception $error ) {
      die("Insert failed: " . $error->getMessage());
   }

  }

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

function redirect(){
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Location: word.php');
 }
  }

  function print_posts()
{
   require "config.php";

   try {
      $db = new PDO("mysql:host=$database_hostname; dbname=$database_name", $database_username, $database_password);
      
       ChromePhp::log('print posts works!');
      // $statement=$db->prepare( 'SELECT * FROM  noun WHERE EmojiCode =' . $emoji);
        $statement=$db->prepare( 'SELECT noun FROM  noun');

      $statement->execute();

      // Return an entire table’s worth

        $emoji = $_GET['emoji'];
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
          echo "         <tr>\n";
          echo "            <th>Definition</th><td> ";
          $statement->execute();
          while ($row = $statement->fetch()) {
           
         echo"  ". nl2br( $row['def'] ) . " \n";
          
        }
         echo "         </td></tr>\n";
         //def array
          echo "         <tr>\n";
          echo "            <th>Example of Use</th><td> ";
          $statement->execute();
          while ($row = $statement->fetch()) {
            if ($row['example'] != NULL) {
            }
         echo"  ". nl2br( $row['example'] ) . " \n";
          }
         echo "         </td></tr>\n";

         // echo "         <tr>\n";
         // echo "            <th>Adjective</th><td>{$row['adj']}</td>\n";
         // echo "         </tr>\n";
         // echo "         <tr>\n";
         // echo "            <th>Verb</th><td>{$row['verb']}</td>\n";
         // echo "         </tr>\n";
         // echo "         <tr>\n";
         // echo "            <th>Definition</th><td>". nl2br( $row['def'] ) . "</td>\n";
         // echo "         </tr>\n";
         // echo "         <tr>\n";
         // echo "            <th>Example of use</th><td>". nl2br( $row['example'] ) . "</td>\n";
         // echo "         </tr>\n";
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
 