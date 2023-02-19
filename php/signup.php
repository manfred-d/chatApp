<?php 
    session_start();
    include_once "config.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        // checking valid email 
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            # checking if email already exist
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {// check email if already exist
                echo "$email is already taken";
            }
            else {
                if (isset($_FILES['image'])) {//if file is uploaded
                     $img_name = $_FILES['image']['name'];//get image name
                     $img_type = $_FILES['image']['type'];//get file type
                     $tmp_name = $_FILES['image']['tmp_name']; //temporary file name

                     //lets explode image and get last extension
                     $img_explode = explode('.',$img_name);
                     $img_ext = end($img_explode); //gettin the last name after dot(.)

                     $extensions = ['png','jpg','jpeg','PNG','JPG','JPEG'];
                     if (in_array($img_ext,$extensions) === true) { //if extension exits in the options matched
                        $time = time(); //this will return current time.
                                        //uploading a file will be renamed with current time
                        
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "../assets/images/".$new_img_name)){ //upload users file to local folder
                             $status = "Active now"; //once signed up, status will be active
                             $random_id = rand(time(), 1000000);

                            // Insert all user data
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id,fname,lname,email,password,img,status) 
                                                        VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}') ");
                            if ($sql2) { // if data is inerted
                                $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}' ");
                                if (mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] =$row['unique_id']; //using this session, access user unique id on other files
                                    echo "registered sucessful";
                                }
                            }else {
                                echo "Something went wrong";
                            }
                    
                        }
                     }else {
                        echo "Please provide a valid image type";
                     }

                }else {
                    echo 'please select an image file';
                }
            }
            
        }else {
            echo "$email is not a valid email";
        }
    }
    else {
        echo 'All fields are required';
    }


?>