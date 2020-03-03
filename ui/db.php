<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "clearance";

$conn = mysqli_connect("$mysql_hostname", "$mysql_user", "$mysql_password", "$mysql_database");

if(!$conn){
    echo "unable to connect";
    exit();
}

?>