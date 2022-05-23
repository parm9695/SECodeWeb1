<?php
    require_once('connect.php');
    if(isset($_POST['submit'])){
        
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";

        // echo $_POST['date_time'];

        $temp = explode('.',$_FILES['imgproof']['name']);
        $new_name = 'S' . round(microtime(true)*999) . '.' . end($temp); 
        $url = '../slip/'.$new_name;
    
        if(move_uploaded_file($_FILES['imgproof']['tmp_name'], $url )){
            $sql = "INSERT INTO slip(order_id,img,datetime,amount,sender) VALUES ('$_POST[id]','$new_name','$_POST[date_time]','$_POST[amount]','$_POST[username]')";
            $result = mysqli_query($conn, $sql);
            $sql1 = "UPDATE reserve SET receipt = 's' WHERE car_id='$_POST[id]'";
            $result = mysqli_query($conn, $sql1);
            mysqli_close($conn);
        }
        if($result){
            echo "<script type='text/javascript'>";
            echo "alert('Send slip successfuly');";
            echo "</script>";
            header('Refresh:0; url=../booking.php'); 
        }
        else{
            echo "<script type='text/javascript'>";
            echo "alert('Send Error, Try Again');";
            echo "</script>";
            header('Refresh:0; url=../booking.php');
        }
    }
?>