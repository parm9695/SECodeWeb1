<?php 
include_once('../authen.php') ;
$sql = "SELECT * FROM model";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="apple-touch-icon" sizes="180x180" href="../../dist/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../dist/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../dist/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="../../dist/img/favicons/site.webmanifest">
  <link rel="mask-icon" href="../../dist/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="../../dist/img/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="../../dist/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
    <title>Add Product</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include_once('../includes/sidebar.php') ?>

    <div class="container">
        <div class="row ">
            <div class="offset-md-3 col-md-6 mt-5">
                <div class="card">
                    <h5 class="card-header text-center">Product Adder</h5>
                    <div class="card-body">
                        <form class="form-control" id="add_product" method="post" action="db_add_product.php" enctype="multipart/form-data">
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-copyright"></i></div>
                                </div>
                                <select class="form-select form-control" name="brand" aria-label="Default select example" aria-placeholder="Select Brand" required>
                                    <?php
                                        $conn=new PDO("mysql:host=localhost;dbname=dataweb;charset-utf8","root","");
                                        $sql="SELECT * FROM brand";
                                        foreach($conn->query($sql) as $row){
                                            echo "<option value='".$row['name']."'>".$row['name']."</option>";
                                        }
                                        $conn=null
                                    ?>
                                </select>
                            </div>
                            
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend ">
                                <div class="input-group-text"><i class="fas fa-car"></i></div>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Model" required>
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text "><i class="fas fa-info-circle"></i></div>
                                </div>
                                <input type="text" class="form-control " id="info" name="info" placeholder="Infomation">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-tags"></i></div>
                                </div>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Price" required>
                            </div>

                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="customFile" name="pic1" required>
                                <label class="custom-file-label" for="customFile">Choose 1st Pic</label>
                            </div>

                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="customFile1" name="pic2">
                                <label class="custom-file-label" for="customFile">Choose 2nd Pic</label>
                            </div>

                            <div class="custom-file mb-4">
                                <input type="file" class="custom-file-input" id="customFile" name="pic3">
                                <label class="custom-file-label" for="customFile">Choose 3rd Pic</label>
                            </div>
                            <figure class="figure text-center d-none">
                                <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                            </figure>
                            <button type="submit" id="submit" class="btn btn-primary btn-block mb-2" >Insert</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>   

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="../../../script.js"></script>
    
</body>
</html>