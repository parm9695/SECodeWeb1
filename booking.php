<?php
    require_once('php/connect.php');
    if(!isset($_SESSION['id'])){
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="style.css">
    <script>
        function myFunction(){
            let r=confirm("ยืนยันจะทำการยกเลิกการจอง?");
            return r;
        }
    </script>

    <title>Booked List</title>
</head>
<body>
    <?php include_once('includes/navbar.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card shadow-lg p-3 mb-5 mt-5 bg-white rounded">
                <h5 class="card-header text-center">Booked List</h5>
                    <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Reserve ID</th>
              <th>Image</th>
              <th>Brand</th>
              <th>Model</th>
              <th>Price</th>
              <th>Payment</th>
            </tr>
            </thead>
            <tbody>
                            <?php
                            $conn=new PDO("mysql:host=localhost;dbname=dataweb;charset=utf8","root","");
                            $sql="SELECT t2.id,t2.pic1,t2.brand,t2.name,t2.price,t1.status,t1.receipt,t1.name FROM reserve as t1 INNER JOIN model as t2 ON 
                            (t1.car_id=t2.id) WHERE t1.name='$_SESSION[username]'";
                            $result=$conn->query($sql);
                            while($row=$result -> fetch()){
                            ?>

                            <tr style="text-align: center;">
                                <td><?php echo $row['0']; ?></td>
                                <td><img src="img/<?php echo $row['1']; ?>" width="100px" alt=""> </td>
                                <td><?php echo $row['2']; ?></td>
                                <td><?php echo $row['3']; ?></td>
                                <td><?php echo number_format($row['4'])." ฿"; ?></td>
                                <td>
                                    <?php
                                        if($row['5'] == "w" && $row['6'] =="w"){
                                             echo "<a class='btn btn-success btn-sm px-3 mt-1 m-md-1' href=proof.php?id=".$row['0'].">Send Slip</a><br>";
                                             //echo "<a class='btn btn-danger btn-sm mt-2' href=php/booking_cancel.php?car_id=".$row['0']." onclick='return myFunction();'>Cancel</a>"; 
                                            ?>
                                            <button class="btn btn-danger btn-sm px-4 mt-2 m-md-1" data-bs-target="#showForm<?php echo $row['0']; ?>" data-bs-toggle="modal">Cancel</button>
                                                <div class="modal fade" id="showForm<?php echo $row['0']; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">ยกเลิกการจอง</h4>
                                                                <button class="btn-close " data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label class="col-form-label">ยืนยันว่าต้องการยกเลิกการจอง?</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-sm btn-danger px-3 mt-1 m-md-1" data-bs-dismiss="modal"><i class="fas fa-times"> ยกเลิก</i></button>
                                                            <form action="php/booking_cancel.php" method="POST">
                                                                <input type="hidden" name="id" value="<?php echo $row['0']; ?>">
                                                                <input type="hidden" name="booker" value="<?php echo $row['7']; ?>">
                                                                <button type="submit" id="submit" name="confirm" value="1" class="btn btn-sm btn-success btn-block px-3 mt-1 m-md-1"><i class="fas fa-check"></i> ยืนยัน</button>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                        }
                                        if($row['5'] == "w" && $row['6'] =="s"){
                                            echo "Waiting<br>";
                                        }
                                        elseif($row['5'] == "s"){ echo "Success"; }
                                    ?>
                                </td>
                            </tr>

                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
    <div style="height: 10vh;"></div>
    <?php include_once('includes/footer.php') ?>
    <!-- ===================================================================================================================== -->

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>

</body>
</html>