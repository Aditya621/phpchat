<?php

// response  sending ajax to php and getting from php to ajax 
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";

    // $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}  AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')");

    $sql0 = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    $sql = mysqli_query($conn, $sql0);

    if(mysqli_num_rows($sql) > 0){
        include_once "data.php"; 

    } else {
        $output .= "No users found related to yours search term";
    }

    echo $output;

    // $outgoing_id = $_SESSION['unique_id'];
    // $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    // $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    // $output = "";
    // $query = mysqli_query($conn, $sql);
    // if(mysqli_num_rows($query) > 0){
    //     include_once "data.php";
    // }else{
    //     $output .= 'No user found related to your search term';
    // }
    // echo $output;
?>