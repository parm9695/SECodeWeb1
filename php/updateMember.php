<?php
    require_once('connect.php');
    // ดูค่า
    // echo '<pre>', print_r($_POST),'</pre>';
    // echo $_SESSION['id'];


    if(isset($_POST['submit']) && isset($_SESSION['id'])){
        $sql = "UPDATE `members` SET 
                        `name` = '".$_POST['name']."',
                        `email` = '".$_POST['email']."',
                        `phone` = '".$_POST['phone']."',
                        `address` = '".$_POST['address']."' 
                        WHERE `members`.`id` =  '".$_SESSION['id']."' ";
        $result = $conn->query($sql) ;

        if($result){
            $_SESSION['name'] = $_POST['name'];

            echo "<script> alert('Update Success!'); </script>";
            header('Refresh:0; url=../profile.php');
        }else{
            echo 'Update Failed!, please contact the administrator.'; 
            header('Refresh:3; url=../profile.php');
        }
    }else{
        header('location:../index.php');
    }

?>