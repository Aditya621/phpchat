<?php 

    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn , $_POST['fname']);
    $lname = mysqli_real_escape_string($conn , $_POST['lname']);
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $password = mysqli_real_escape_string($conn , $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        // lets check user email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){// is it valid email
            // email already exist in database or not
            $sql = mysqli_query($conn , "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){ // if email is alredy exist in database
                echo "$email already exists!";
            } else {
                // check user upload file or not
                if(isset($_FILES['image'])){ // if file is uploaded
                    $img_name = $_FILES['image']['name'];// user uploaded file(image) name
                    $img_type = $_FILES['image']['type'];// image type
                    $tmp_name = $_FILES['image']['tmp_name'];// tempary name is used to save/move file in our folder
                    // explode image extension , jpg, png, etc
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);// get user image extension

                    $extensions =['jpg', 'png', 'jpeg'];

                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type,$types) == true){// if extension is matched
                            $time = time();// beacuse i want all the image file is save with unique name with there respective time slot when they uplaod image ;

                            // move user uploaded image to our local folder
                            $new_img_name = $time.$img_name; // always get unique name

                             // if user upload image move to our local folder successfull
                            if(move_uploaded_file($tmp_name, "images/".$new_img_name)){// images is localfolder
                            $status = "Active now"; // when user is signed up , this is active
                            $random_id = rand(time(), 10000000);// random id for user 
                            $encrypt_pass = md5($password);

                            // now insert all user data inside or database table
                            $sql2 = mysqli_query($conn , "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");

                            if($sql2){//if data is inserted 
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];// user unique id in another php file
                                    echo "Success";
                                } else {
                                    echo "This email address not Exist!";
                                }
                            } else {
                                echo "Something went wrong. Please try again!";
                            }
                        }
                    } else {
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                } else {
                    echo "Please upload an image file - jpeg, png, jpg";
                }
            }
        }
        } else {
            echo "$email - Not valid email!";
        }
    } else {
        echo "All input files are required";
    }


?>