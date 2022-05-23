<?php
    require_once('connect.php');
    print_r($_POST);
    if($_SESSION['username'] == $_POST['booker'] && isset($_POST['confirm'])){
        $sql = "UPDATE model SET car_status = 'f' WHERE id = '$_POST[id]'";
        $result = $conn->query($sql);
        $sql1 = "DELETE FROM reserve WHERE car_id = '$_POST[id]'";
        $result1 = $conn->query($sql1);
        
        if($result && $result1){
            echo '<script> alert("booking cancel successfully")</script>';
            header('Refresh:0; url=../booking.php');
        }
    }
?>