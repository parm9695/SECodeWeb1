<?php
    require_once('php/connect.php');
    if(!isset($_SESSION['id'])){
        header('location:login.php');
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
    <link rel="stylesheet" href="style.css">
    
    <title>Payment</title>
    <style>
        textarea { 
            resize: unset;
            outline: none;
            overflow:hidden;
        }
    </style>
</head>
<body>
<?php include_once('includes/navbar.php') ?>
    <div class="container">
        
        <?php
            $conn=new PDO("mysql:host=localhost;dbname=dataweb;charset-utf8","root","");
            $sql="SELECT * FROM model WHERE id = '$_POST[car_id]'";
            foreach($conn->query($sql) as $row){
        ?>

        <center>
            <div class="card  shadow-lg p-3 mb-5 mt-5 bg-white rounded">
            <h1 class="card-header text-center">Payment</h1>
                <div class="card-body">
                    <form action="php/db_add_reserve.php" method="POST">
                    <div class="row my-5">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <img src="img/<?php echo "$row[pic1]" ?>" alt="รูปที่ 1 หายไปไหน" width='400px'>
                        </div>
                        
                    </div>
                    
                    <div class="row my-2">                   
                        <label class="col-form-label col-lg-3"><b>Booker Name : </b></label>
                        <div class="col-md-2">
                        <input type="text" readonly class="form-control-plaintext"  name="booker"  value="<?php echo $_SESSION['username'] ;?>">
                        </div>
                    </div>
                    <div class="row my-3">
                        <label class="col-lg-3 col-form-label"><b>Brand :</b>  <?php echo $row['brand'] ;?></label>
                        <label class="col-md-3 col-form-label"><b>Model :</b>  <?php echo $row['name'] ;?></label>
                        <label class="col-md-2 col-form-label"><b>Price :</b>  <?php echo number_format($row['price']) ;?> ฿</label>
                        <label class="col-md-2 col-form-label"><b>Car ID: </b></label>
                        <div class="col-md-1">
                        <input type="text" readonly class="form-control-plaintext" name="car_id" id="Car_id" value="<?php echo  $row['id']; ?>">
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="col-lg-2 col-form-label"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Address: </b></label>
                        <div class="col-lg-8 mt-2">
                            <?php 
                                $sql1 = "SELECT * FROM members WHERE id = '$_SESSION[id]' ";
                                foreach($conn->query($sql1) as $row1){
                                    if($row1['address'] == ""){
                                        echo "<textarea name='address'id='autoresizing' rows='10'  class='form-control' placeholder='กรุณากรอกที่อยู่จัดส่ง' required></textarea>";
                                    }
                                    else{
                                        echo "<textarea name='address' id='autoresizing' rows='10' class='form-control' placeholder='กรุณากรอกที่อยู่จัดส่ง' readonly>".$row1['address']."</textarea>";
                                    }
                                }
                            ?>
                            
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-lg-10"></div>
                        <div class="col-lg-2">
                            <button type="submit" id="submit" class="btn btn-primary btn-block mb-2"><i class="fas fa-check"></i> Confirm</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </center>
    </div>
    <div style="height: 10vh;"></div>
    <?php include_once('includes/footer.php') ?>  

    <!-- ===================================================================================================================== -->

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="autosize.js"></script>
    <script type="text/javascript">
        textarea = document.querySelector("#autoresizing");
        textarea.addEventListener('input', autoResize, false);
      
        function autoResize() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        }
    </script>
</body>
</html>