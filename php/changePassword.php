<?php

    require_once('connect.php');
    if(isset($_POST['submit'])){
        $oldpassword = $_POST['oldpassword'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        if($password == $repassword){
            $sql = "SELECT * FROM members WHERE id = '".$_SESSION['id']."' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if(password_verify($oldpassword, $row['password']) ){
                $hashed_password = password_hash($password,PASSWORD_DEFAULT);
                $sql_pw = "UPDATE `members` SET `password` = '$hashed_password' 
                WHERE `members`.`id` = '".$_SESSION['id']."'; ";
                $result_pw = $conn->query($sql_pw);
                
                if($result_pw){
                    echo '<script> alert("Edit password success."); </script>';
                header('Refresh:0; url=../profile.php'); 
                }
            }else{
                echo '<script> alert("Old passwords Incorrect."); </script>';
                header('Refresh:0; url=../password.php'); 
            }


        }else{
            echo '<script> alert("Passwords do not match."); </script>';
            header('Refresh:0; url=../password.php');
        }
        

    }else{
        header('location:../index.php');
    }



?>