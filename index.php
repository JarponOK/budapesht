<?php
if( $_SERVER['REQUEST_URI'] == "/index.php" ) {
 header( "Location: /", TRUE, 301 );
 exit();
 }
?>