<?php
    require_once('php/connect.php');
    if(!isset($_SESSION['id'])){
        header('location:index.php');
    }
    $sql = "SELECT * FROM `members` WHERE `id` = '".$_SESSION['id']."' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if(!$result->num_rows){
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
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>
<body>
    <?php include_once('includes/navbar.php') ?>
    
    <section>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1 >Your Profile</h1>
        </div>
    </div>
    </section>
    <section class="container my-3">
        <div class="row">
            <div class="col-12 profile-top">
            <center><img src="img/<?php echo $row['image'];?>" class="my-3 img-profile rounded-circle img-thumbnail " alt="Image Profile" ></center>
                <div class="card shadow-lg p-3 mb-5 mt-5 bg-white rounded">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" value="<?php echo $row['username'] ;?>" disabled> 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Full name</label>
                                <input type="text" class="form-control" id="name" value="<?php echo $row['name'] ;?>" disabled> 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">email</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $row['email'] ;?>" disabled> 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" value="<?php echo $row['phone'] ;?>" disabled> 
                            </div>
                        </div>
                        <div class="form-group ">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" rows="5" disabled><?php echo $row['address'] ;?> </textarea> 
                            </div>
                            <a href="profile-edit.php" class="btn btn-warning float-right">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="height: 10vh;"></div>
    <?php include_once('includes/footer.php') ?>




<script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>