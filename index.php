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
    <main>
    <?php include_once('includes/navbar.php') ?>
        <div class="jumbotron jumbotron-fluid text-center">
        <section class="home" id="home">
            <div class="container">
            

<h3 data-speed="-2" class="home-parallax">find your car</h3>

<img data-speed="5" class="home-parallax" src="image/car.png" width="1250px"  alt="">



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
        <section class="aboutUs" id="aboutUs">
        <!-- <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <center><h1>About Us</h1></center>
                    <div class="swiper brandCar" >
                        <div class="swiper-wrapper">
                            
                            <div class="swiper-slide">
                            <a href="https://www.facebook.com/Thitiphat.Soisungnoen"target="_blank"><img src="image/Teeno.png" /></a> 
                            <p class="mt-4">Thitiphat Soisungnoen</p>
                            </div>
                            <div class="swiper-slide">
                            <a href="https://www.facebook.com/atomza.jinouga"target="_blank"><img src="image/tom1.png" /></a>
                            <p class="mt-4">Natchapon Paikor</p> 
                            </div>
                            <div class="swiper-slide">
                            <a href="https://www.facebook.com/SwissKiTKaT/"target="_blank"><img src="image/P.png" /></a> 
                            <p class="mt-4">Chanathip Charoenchongsuk</p>
                            </div>
                            <div class="swiper-slide">
                            <a href="https://www.facebook.com/karnkit.chaisingthong" target="_blank"><img src="image/karn.jpg" /></a>
                            <p class="mt-4">Karnkit Chaisingthong</p> 
                            </div>
                            
                        </div>
                        <div class="swiper-pagination "></div>
                        
                    </div>
                </div>
            </div> -->
                  
        </div>
        </section  >
</main>       
        <?php include_once('includes/footer.php') ?>



<!-- ===================================================================================================================== -->

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
    
</body>
</html>