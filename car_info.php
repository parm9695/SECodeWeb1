<?php
    require_once('php/connect.php');
    
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
        
    <link rel="stylesheet" href="style.css">
    <title>Car Information</title>
    <style>

      .swiper {
        width: 50%;
        height: 60%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width:100%;
        height: 250px;
        object-fit: cover;
      }

      .swiper-slide {
        width: 80%;
      }

      .swiper-slide:nth-child(3n) {
        width: 100%;
      }

      .swiper-slide:nth-child(2n) {
        width: 100%;
      }

    </style>
</head>
<body>
    <?php include_once('includes/navbar.php') ?>
    <br>
    <div class="container">
        <br><br>
        
        <?php
            $conn=new PDO("mysql:host=localhost;dbname=dataweb;charset=utf8","root","");
            $sql="SELECT * FROM model WHERE id = '$_GET[id]'";
            foreach($conn->query($sql) as $row){
                
                // echo "
                //     <table border='1' border-color='red' width='100%' height='100%'>
                //     <tr><td>
                //         Brand: ".$row['brand']."<br>Model: ".$row['name']."
                //     </td>

                //     <td>
                //     <center>
                //         <img src='img/".$row['pic1']."' width='100px'>
                //         <img src='img/".$row['pic2']."' width='100px'>
                //         <img src='img/".$row['pic3']."' width='100px'>
                //     </center>
                //     </td>
                //     <td>
                //         <label>information: ".$row['info']."</label>
                //     </td>
                //     <td>
                //         <label>price: ".$row['price']."</label>
                //     </td>
                //     </td><tr>
                //     <table>
                // ";
                ?>

                <div class="swiper carInfo">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="img/<?php echo "$row[pic1]" ?>" alt="รูปที่ 1 หายไปไหน" width='400px'></div>
                        <div class="swiper-slide"><img src="img/<?php echo "$row[pic2]" ?>" alt="รูปต่อไปรูปที่ 2" width='200px'></div>
                        <div class="swiper-slide"><img src="img/<?php echo "$row[pic3]" ?>" alt="แต่พอมองรูปที่ 3 ก็หาย" width='200px'></div>
                    </div>
                <div class="swiper-pagination2"></div>
                </div>

      
        <div class="card shadow-lg p-3 mb-5 mt-5 bg-white rounded">
            <div class="card-body">
            <center><h1>Car Information</h1></center>
            <hr>
                <form action="payment.php" method="POST">
                    
                    <div class="form-row">
                        
                        <label class="col-md-3 col-form-label"><b>Brand :</b>  <?php echo $row['brand'] ;?></label>
                        <!-- <h5>Brand:</h5> <p><?php echo $row['brand'] ;?></p> -->
                        
                       
                        <label class="col-md-3 col-form-label"><b>Model : </b><?php echo $row['name'] ;?></label>
                        <label class="col-md-3 col-form-label"><b>Price : </b><?php echo number_format($row['price']);?> ฿</label>
                        <label for="Car_id" class="col-md-1 col-form-label"><b>Car ID :</b></label>
                        <div class="col-md-2 float-left">
                            <input type="text" readonly class="form-control-plaintext" name="car_id" id="Car_id" value="<?php echo $row['id']; ?>">
                        </div>
                            
                            
                    </div>
                
             <hr>
        
        
        
                
                
                    <div class="form-group ">
                        <div class="row my-3">
                            <h5 class=" col-lg-2">Details:</h5>
                            <p class="col-lg-9">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['info'] ?></p>
                            </div>
                        <div class="col-lg-1"></div>    
                    </div>
                    <div class="col-md-10"></div>
                    <div class="col-md-2 float-right">
                    <?php if($row['car_status'] == 'b'){ ?>
                        <button type="submit" id="submit" class="btn btn-secondary btn-block" disabled>Booked</button>
                    <?php } else { ?>
                        <button type="submit" id="submit" class="btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i> Buy</button>
                    <?php } ?>
                    </div>
                </form>
            </div>
        </div>
        <!-- ============================================================================== -->
            <!-- <div class="card my-5">
            <h5 class="card-header text-center">Car Information</h5>
                <div class="card-body">
                    <form action="payment.php" method="POST">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <label class="col-lg-2 col-form-label">Brand: </label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" value="<?php echo $row['brand'] ;?>" readonly>
                        </div>
                        <label class="col-lg-2 col-form-label">Model: </label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" value="<?php echo $row['name'] ;?>" readonly>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>  -->

                    <!--  <div class="row my-5">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <img src="img/<?php echo "$row[pic1]" ?>" alt="รูปที่ 1 หายไปไหน" width='400px'>
                        </div>
                        <div class="col-lg-4">
                            <img src="img/<?php echo "$row[pic2]" ?>" alt="รูปต่อไปรูปที่ 2" width='200px'>
                            <img src="img/<?php echo "$row[pic3]" ?>" alt="แต่พอมองรูปที่ 3 ก็หาย" width='200px'>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    
                    <div class="row my-3">
                        <label class="col=form=label col-lg-2">Details:</label>
                        <div class="col-lg-10">
                            <textarea rows="8" class="form-control" readonly><?php echo $row['info'] ?></textarea>
                        </div>
                    </div>
                    
                    <div class="row my-3">
                        <label class="col-lg-2 col-form-label">Price: </label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php echo $row['price'] ;?> $" readonly>
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="col-lg-2 col-form-label">Car ID: </label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" name="car_id" value="<?php echo $row['id'] ;?>" readonly>
                        </div>

                        
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2">
                            <button type="submit" id="submit" class="btn btn-primary btn-block mb-2"><i class="fas fa-shopping-cart"></i> Buy</button>
                        </div>
                    </div>
                </div> -->
            <?php } ?>


    </div>
    <div style="height: 10vh;"></div>
    <?php include_once('includes/footer.php') ?>
    <!-- ===================================================================================================================== -->

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        var swiper = new Swiper(".carInfo", {
        slidesPerView: "auto",
        loop: true,
        spaceBetween: 30,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        
        },
    });
    </script>
</body>
</html>