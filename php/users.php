<?php 

    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    // $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ");
    $sql0 = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $sql = mysqli_query($conn, $sql0);
    $output = "";

    if(mysqli_num_rows($sql) == 0){// if there is only one row in database means only one is active 
        $output .= "No user are active for chat ";
    } elseif (mysqli_num_rows($sql) > 0){
        include_once "data.php"; 
    }

    echo $output;

?>
