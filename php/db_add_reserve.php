<?php
    require_once('connect.php');

    //print_r($_POST);

    $sql = "INSERT INTO reserve(car_id,name,date_time,status,receipt) VALUES ('$_POST[car_id]','$_POST[booker]',NOW(),'w','w')";                    //คำสั่ง database
    $result = mysqli_query($conn, $sql);

    if($result){
        //SELECT * FROM model AS t1 INNER JOIN reserve AS t2 ON(t1.id = t2.car_id) INNER JOIN slip AS t3 ON(t2.car_id = t3.order_id)   //คำสั่งเชื่อมตารางใบเสร็จ , รถ และ ใบสั่งซื้อ 
        $sql1 = "UPDATE model SET car_status = 'b' WHERE id='$_POST[car_id]'";
        $result1 = mysqli_query($conn, $sql1);

        $sql2 = "UPDATE members SET address = '$_POST[address]' WHERE username='$_SESSION[username]'";
        $result1 = mysqli_query($conn, $sql2);
        mysqli_close($conn);

        echo "<script type='text/javascript'>";
        echo "alert('Booking Successfully');";
        echo "</script>";
        header('Refresh:0; url=../car_info.php?id='.$_POST['car_id']); 
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('This car booked or booking error,Please contact customer service');";
        echo "</script>";
        header('Refresh:0; url=../car_info.php?id='.$_POST['car_id']);
    }
?>

