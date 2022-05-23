<?php
//check มีการกด submit ไหม
require_once('connect.php');
    if(isset($_POST['submit'])){
        //มีการกด recaptcha รึยัง?
        $secretKey = "6LcumOocAAAAAIo7iwoGfAEm88K2aBG11AfhqEzm";
        $responseKey = $_POST['g-recaptcha-response'] ;
        $remoteIP = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$remoteIP";
        $response = json_decode(file_get_contents($url));

        if($response->success){
            // username ซ้ำกับระบบไหม
            $check_sql = "SELECT * FROM `members` WHERE `username` = '".$_POST['username']."' ";
            $check_username = $conn->query($check_sql) or die($conn->error);

            if(!$check_username->num_rows){
            //เอา data เข้า sql
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql_create = "INSERT INTO `members` (`name`, `email`, `phone`, `username`, `password`, `created_at`) 
                            VALUES ('".$_POST['name']."', 
                                    '".$_POST['email']."', 
                                    '".$_POST['phone']."', 
                                    '".$_POST['username']."', 
                                    '".$hashed_password."', 
                                    '".date("Y-m-d")."' );";
                $result = $conn->query($sql_create) or die($conn->error);

                if($result){
                    //ถ้าถูกจะเป็น if ผิดเป็น else
                    echo "<script> alert('Register Success!'); </script>";
                    redirect('index');
                }else{
                    echo "<script> alert('Register failed,\nplease contact the administrator.'); </script>";
                    redirect('register');
                }

            }else{
                echo '<script> alert("This username has already been used. \nPlease fill in the information again."); </script>';
                redirect('register');
            }
        }else{
             echo "<script> alert('Verification Failed!'); </script>";
             redirect('register');
        }
    }else{
        redirect('register');
    }
    //ยุบ code 
    function redirect($path){
        header('Refresh:0; url=../'.$path.'.php'); 
    }
?>