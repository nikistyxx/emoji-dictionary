  <?php 
 session_start();
include "ChromePhp.php";
include "inc/insert.php";
include "inc/config.php";
                
                pullemoji();

                if( white_list() ) {
                    if( isset( $noun ) ) {
                        $noun = ( strlen( $_POST["noun"] ) > 0 ) ? htmlentities( trim( $_POST["noun"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
                        echo "The noun is $emoji";
                    $verb = ( strlen( $_POST["verb"] ) > 0 ) ? htmlentities( trim( $_POST["verb"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
                    $adjective = ( strlen( $_POST["adjective"] ) > 0 ) ? htmlentities( trim( $_POST["adjective"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
                    $define = ( strlen( $_POST["define"] ) > 0 ) ? htmlentities( trim( $_POST["define"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";
                    $example = ( strlen( $_POST["example"] ) > 0 ) ? htmlentities( trim( $_POST["example"] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" ) : "";

                        insert( $emoji, $noun);
                     }
                     else {
                        echo "Noun is not set";
                        exit;
                     }
            // redirect();
                }      
?>
            
