<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "chat";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    // this is show error when database is not connected 
    if(!$conn){
        echo "Database connection".mysqli_connect_error();
    } 
    // else{
    //     echo "Database connection";
    // }

?>
