<?php
require_once('connect.php');
if(isset($_POST['submit'])){
    
    $temp = explode('.',$_FILES['file']['name']);
    $new_name = round(microtime(true)*9999) . '.' . end($temp); 
    $url = '../img/'.$new_name;

    if(move_uploaded_file($_FILES['file']['tmp_name'], $url )){
        $sql = "UPDATE `members` SET `image` = '".$new_name."' WHERE `id` = '".$_SESSION['id']."';";
        $result = $conn->query($sql) ;
        if($result){
            $_SESSION['image'] = $new_name;
            echo "<script> alert('Update Success!'); </script>";
            header('Refresh:0; url=../profile.php');
        }else{
            echo 'Update Failed!, please contact the administrator.';
            header('Refresh:3; url=../profile.php');
        }
        


    }

}else{
    header('location:../index.php');
}
    

?>