<?php
    session_start();
    require_once('connect.php');

    $value = "ค่าที่ส่งมา";
    $name = "banana";
    $color = "yellow";

    
    //$sql = "UPDATE <ชื่อตาราง> SET <ชื่อ columm> = '<ค่าที่ต้างการ>' WHERE <ตำแหน่งที่ต้องการเปลี่ยน>";
    //$sql = "UPDATE fruit SET name = '$name', color = '$color' WHERE id = 3";
    
    $result = mysqli_query($conn, $sql);
    $result = mysqli_close($conn);

    if($result){
        echo "<script type='text/javascript'>";
        echo "alert('Update Succesfuly');";
        echo "</script>";
        header('Refresh:0; url=index.php'); 
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
        echo "</script>";
        header('Refresh:0; url=index.php'); 
    }
    //header("Refresh:0; url=../index.php");
?>