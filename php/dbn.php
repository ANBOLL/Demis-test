<?php
$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "contact";
$dbarticles = "news";
$connection = mysqli_connect("$host", "$dbuser", "$dbpassword", "$dbname");
if(!$connection)
    {
      die('Could not Connect MySql Server:' .mysql_error());
    }
?>
