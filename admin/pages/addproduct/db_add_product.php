<?php
    require_once('../../../php/connect.php');

    $value = "ค่าที่ส่งมา";
    $name = "pineapple";
    $color = "yellow";

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($_FILES['pic1']);
    // echo "</pre>";

    //-----------------------------------

    $temp = explode('.',$_FILES['pic1']['name']);
    $new_name1 = 'A' . round(microtime(true)*9999) . '.' . end($temp); 
    $url1 = '../../../img/'.$new_name1;

    $temp = explode('.',$_FILES['pic2']['name']);
    $new_name2 = 'B' . round(microtime(true)*9999) . '.' . end($temp); 
    $url2 = '../../../img/'.$new_name2;

    $temp = explode('.',$_FILES['pic3']['name']);
    $new_name3 = 'C' . round(microtime(true)*9999) . '.' . end($temp); 
    $url3 = '../../../img/'.$new_name3;

    move_uploaded_file($_FILES['pic1']['tmp_name'], $url1);
    move_uploaded_file($_FILES['pic2']['tmp_name'], $url2);
    move_uploaded_file($_FILES['pic3']['tmp_name'], $url3);

    //-----------------------------------


    $sql = "INSERT INTO model(brand,name,info,price,pic1,pic2,pic3,status) VALUES ('$_POST[brand]','$_POST[name]','$_POST[info]','$_POST[price]','$new_name1','$new_name2','$new_name3','f')";       //คำสั่ง database

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if($result){
        echo "<script type='text/javascript'>";
        echo "alert('Add Succesfuly');";
        echo "</script>";
        header('Refresh:0; url=index.php'); 
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to upload again');";
        echo "</script>";
        header('Refresh:0; url=index.php'); 
    }
    //header("Refresh:0; url=../index.php");
?>