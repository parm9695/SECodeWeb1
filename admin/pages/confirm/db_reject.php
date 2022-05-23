<?php 
    include_once('../authen.php') ;
    //print_r($_POST);
    $sql = "DELETE FROM slip WHERE order_id = '$_POST[id]'";
    $result = $conn->query($sql);
    $sql1 = "UPDATE reserve SET receipt = 'w' WHERE car_id = '$_POST[id]';";
    $result1 = $conn->query($sql1);
        if($result && $result1){
            echo '<script> alert("Reserve Comfirmed")</script>';
            header('Refresh:0; url=index.php');
        }
    
?> 