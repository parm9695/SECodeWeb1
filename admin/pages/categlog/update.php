<?php include_once('../authen.php') ?>
<?php

    if(isset($_POST['submit'])){
        $sql = "UPDATE `model` SET
            `brand`= '".$_POST['brand']."',
            `name` = '".$_POST['name']."', 
            `info` = '".$_POST['info']."', 
            `price` = '".$_POST['price']."'
             WHERE `model`.`id` = '".$_POST['id']."'";
        
        $result = $conn->query($sql);
        if($result){
            echo '<script> alert("Finished Updating!")</script>';
            header('Refresh:0; url=index.php');
        }

    }
?>