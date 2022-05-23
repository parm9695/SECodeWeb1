<?php
    require_once('connect.php');
    $query = "SELECT * FROM members ";
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($result)){
        $i=0;
        for($i=0 ; $i<9 ; $i++){
            echo $row[$i]."<br>";
        }
        echo "<br>-------------------------------------------------<br><br>";
    }
?>