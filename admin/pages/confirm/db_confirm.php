<?php 
    include_once('../authen.php') ;
    //print_r($_POST);
    $sql = "UPDATE reserve SET status = 's' WHERE car_id = '$_POST[id]';";
    $result = $conn->query($sql);
    $sql1 = "UPDATE model SET car_status = 's' WHERE id = '$_POST[id]';";
    $result1 = $conn->query($sql1);
        if($result && $result1){
            echo '<script> alert("Reserve Comfirmed")</script>';
            header('Refresh:0; url=index.php');
        }
    
?> 
