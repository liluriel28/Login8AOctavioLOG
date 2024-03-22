<?php
    $server="localhost:3307";
    $user="root";
    $pass="";
    $database= "loginoctavio";
    $connection=new mysqli($server,$user,$pass,$database);
    $connection->set_charset("utf8");
?>