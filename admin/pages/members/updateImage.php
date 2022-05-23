<?php
    include_once('../authen.php');
    if(isset($_POST['submit'])){
        
        $temp = explode('.',$_FILES['file']['name']);
        $new_name = round(microtime(true)*9999) . '.' . end($temp); 
        $url = '../../../img/'.$new_name;

        if(move_uploaded_file($_FILES['file']['tmp_name'], $url )){
            $sql = "UPDATE `members` SET `image` = '".$new_name."' WHERE `id` = '".$_GET['id']."';";
            $result = $conn->query($sql) or die($conn->error)  ;
            if($result){
                $_SESSION['image'] = $new_name;
                echo "<script> alert('Update Success!'); </script>";
                header('Refresh:0; url=index.php?id='.$_GET['id']);
            }
            


        }

    }else{
        header('location:index.php');
    }
    

?>