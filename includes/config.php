<?php
// all database config written here 

session_start();
// define constant variables
define('DB_NAME', 'epiz_28503743_musicshop');
define('DB_USER', 'epiz_28503743');
define('DB_PASSWORD', 'V8mQQAuC');
define('DB_HOST', 'sql307.epizy.com');
try{

    // connection variable
    // $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con) {
       
    } else if(!$con) {
    	?>
    	<script>
    		console.error("connect to database failed:( please contact to mansajami2020@gmail.com");
    	</script>
    	<?php
    	print "failed to connect database";
    	die();
    }
    mysqli_set_charset($con,'utf8');


} catch (Exception $ex){
    print "An Exception occurred. Message: " . $ex->getMessage();
} catch (Error $e){
    print "The system is busy please try later";
}

