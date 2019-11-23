<?php
if ( isset( $_GET['submit'] ) ) 
{  
$text = $_GET['announce'];

  
 $file=fopen("load.txt",w);
 fwrite($file,$text);
 echo $text ;
 exit;
}
?>