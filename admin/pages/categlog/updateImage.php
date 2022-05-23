<?php
    include_once('../authen.php');
    if(isset($_POST['submit'])){
        
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

        $conn=new PDO("mysql:host=localhost;dbname=dataweb;charset-utf8","root","");
        $sql="SELECT * FROM model WHERE id = '$_GET[id]'";
        $result=$conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);

        if($_FILES['pic1']['name'] == ""){
            $new_name1 = $data['pic1'];
        }
        if($_FILES['pic2']['name'] == ""){
            $new_name2 = $data['pic2'];
        }
        if($_FILES['pic3']['name'] == ""){
            $new_name3 = $data['pic3'];
        }

        // echo "<br>",$new_name1,"<br>",$new_name2,"<br>",$new_name3;
            $sql = "UPDATE `model` SET `pic1` = '".$new_name1."',`pic2` = '".$new_name2."',`pic3` = '".$new_name3."' WHERE `id` = '".$_GET['id']."';";
            $result = $conn->query($sql) or die($conn->error)  ;
            if($result){
                $_SESSION['pic1'] = $new_name1;
                $_SESSION['pic2'] = $new_name2;
                $_SESSION['pic3'] = $new_name3;
                echo "<script> alert('Update Success!'); </script>";
                header('Refresh:0; url=form-edit.php?id='.$_GET['id']);
            }


        }

    
    
    

?>