<?php

$host ="localhost";
$dbname="user_info";
$username="root";
$password="";

$mysqli = new mysqli(hostname:$host,
                    username: $username,
                    password: $password,
                    database: $dbname);

if ($mysqli->connect_errno){
    die("mysql err".$mysqli->connect_error);
}

$sql="";

if($mysqli->query($sql)){
    echo "sql table createds";
};


?>