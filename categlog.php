<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper/swiper-bundle.min.css">
    
    <link rel="stylesheet" href="style.css">



<!-- ============================================================================================================== -->

<body>
    <?php include_once('includes/navbar.php') ?>
        


            <!-- <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="image/Audi car.png" alt=""></div>
        <div class="swiper-slide"><img src="image/Bugatti car.png" alt=""></div>
        <div class="swiper-slide"><img src="image/Ferrari car.png" alt=""></div>
        <div class="swiper-slide"><img src="image/lamborghini (1).png" alt=""></div>
        <div class="swiper-slide"><img src="image/McLaren car.png" alt=""></div>
        <div class="swiper-slide"><img src="image/Porsche car.png" alt=""></div>

        
      </div>
      </section>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div> -->
            </div>
        </div>
    <section class="brand" id="brand">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <center><h1>Brands</h1></center>
                    <div class="swiper brandCar" >
                        <div class="swiper-wrapper">
                            
                            <div class="swiper-slide">
                            <a href="categlog.php"><img src="image/AllLogo.png" class="mt-3"/></a> 
                            </div>
                            <div class="swiper-slide">
                            <a href="categlog.php?brand=Audi"><img src="image/audi.png" class="mt-3"/></a> 
                            </div>
                            <div class="swiper-slide">
                            <a href="categlog.php?brand=Ferrari"><img src="image/ferrari (1).png" class="mt-2"/></a> 
                            </div>
                            <div class="swiper-slide">
                            <a href="categlog.php?brand=Lamborghini"><img src="image/Lamborghini.png"class="mt-4" /></a> 
                            </div>
                            <div class="swiper-slide">
                            <a href="categlog.php?brand=Mclaren"><img src="image/mclaren.png" class="mt-5" /></a> 
                            </div>
                            <div class="swiper-slide">
                            <a href="categlog.php?brand=Bugatti"><img src="image/bugatti (1).png" class="mt-4" /></a> 
                            </div>
                            <div class="swiper-slide">
                            <a href="categlog.php?brand=Porsche"><img src="image/porsche.png"alt="Porsche" class="mt-3" ></a>     
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

        </div>
        </section  >
        <section class="shop" id="shop">
        <div class="container">
            <?php if(isset($_GET['brand'])){ ?>
                <center><h1 class="my-3"><?php echo $_GET['brand']; ?></h1></center>
            <?php } 

            $conn=new PDO("mysql:host=localhost;dbname=dataweb;charset=utf8","root","");
            if(isset($_GET['brand'])){ $sql="SELECT * FROM model WHERE brand = '$_GET[brand]' AND (car_status = 'f' OR car_status = 'b')"; }
            else{ $sql="SELECT * FROM model WHERE car_status = 'b' OR car_status = 'f'"; }
            //$sql="SELECT * FROM model";
            $i=1;
            $count=($conn->query($sql))->rowCount();
            $left = 3 - $count%3; 
            foreach($conn->query($sql) as $row){
            //$result=$conn->query($sql);
            //while($row=$result -> fetch()){
            //for($i=1 ; $i<=$result->rowCount() ; $i++){
                
                if($i == 1 || ($i-1)%3 == 0){
                    echo "<div class='card-deck mt-3'>";
                }
            ?>          
                        <div class="card mt-3">
                            <img width="1000px" height="150px" src="img/<?php echo $row['pic1']?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']?></h5>
                                <!-- <p class="card-text"><?php echo $row['info']?></p> -->
                            </div>
                            <div class="card-footer">
                                <?php if($row['car_status'] == 'b') echo "<label style='float: left;' class='col-form-label'>booked</label>"?>
                                <a href="car_info.php?id=<?php echo $row['id']?>" class="btn btn-primary float-right"><?php echo number_format($row['price']); ?> ฿</a>
                            </div>
                        </div>   
        <?php
                if($count == $i && $count%3 != 0){
                    for($l = 0 ; $l < $left ; $l++){ ?>
                        <div class="card mt-3">
                            <img width="1000px" height="150px" src="image/coming soon.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Coming Soon....</h5>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-primary float-right disabled"><?php echo $row['price']?> ฿</a>
                            </div>
                        </div>
        <?php       }
                }
                if($i % 3 == 0){ echo "</div>"; }
                $i++;
            }
            //echo $left."<br>".$count;
        ?>
        </div>
        </section>
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