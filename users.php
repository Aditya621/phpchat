<?php 
// if seesion is not set then user go to login page
    session_start();
  include_once "php/config.php";
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>

<?php include_once  "header.php"; ?>

  <body>
    <div class="wrapper">
    <section class="users">
        <header>
            <div class="content">
                <?php 
                // include_once "php/config.php";
                // select all the data  of current logged in user using session key
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id ={$_SESSION['unique_id']}");

                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
                // this $row help me to add name dyanamically
            ?>            
                <img src="php/images/<?php echo $row['img']?>" alt="">
                <div class="details">
                    <!-- dyanmically data name update -->
                    <span><?php echo $row['fname'] . " " . $row['lname']  ?></span> 
                    <!-- <p>Active now</p> -->
                    <p><?php  echo $row['status'] ?></p>
                </div>
            </div>
            <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
        </header>
        <div class="search">
            <span class="text">Select an user to start chat</span>
            <input type="text" placeholder="Enter name to search..">
            <button><i class = "fas fa-search"></i></button>
        </div>
        <div class="users-list">
        </div>
    </section>
</div>
    <script src="javascript/users.js"></script>

  </body>
</html>
