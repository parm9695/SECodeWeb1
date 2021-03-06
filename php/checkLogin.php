<?php
    require_once('connect.php'); 
    if (isset($_POST['submit'])) {
        $username = $_POST['username']; 
        $password = $_POST['password'];
        $stmt = $conn->prepare("SELECT * FROM members WHERE username = ?"); 
        $stmt->bind_param('s', $username); // s - string, b - blob, i- int $stmt->execute(); 
        $stmt->execute();
        $result = $stmt->get_result(); 
        $row = $result->fetch_assoc();
        if(!empty($row)){
            if(password_verify($password, $row['password'])){
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['image'] = $row['image'];
                $_SESSION['username'] = $row['username'];
                header('location:../index.php');
            }else{
                echo '<script> alert("Incorrect password."); </script>';
            header('Refresh:0; url=../login.php');
            }
        }else{
            echo '<script> alert("Login Failed."); </script>';
            header('Refresh:0; url=../login.php');
        }
    }else{
        header('location:../index.php');
    }

    



?>