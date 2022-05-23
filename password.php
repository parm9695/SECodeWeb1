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
    <title>Edit Password</title>
</head>
<body>
    <?php include_once('includes/navbar.php') ?>
    
    <section>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1 >Edit Password</h1>
        </div>
    </div>
    </section>
    <section class="container my-3">
        <div class="row justify-content-center">
            <div class="col-6 profile-top">
                <img src="img/<?php echo $row['image'];?>" class="my-3 img-profile rounded-circle img-thumbnail" alt="Image Profile">
                <div class="card shadow-lg p-3 mb-5 mt-5 bg-white rounded">
                    <div class="card-body">
                        <div class="form">
                            <form action="php/changePassword.php" method="post" id="formPassword">
                            <div class="form-group col-md-12">
                                <label for="oldpassword">Old Password</label>
                                <input type="password" class="form-control" id="oldpassword" name="oldpassword"  > 
                            </div>
                            <div class="form-group col-md-12">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password"name="password"  > 
                            </div>
                            <div class="form-group col-md-12">
                                <label for="repassword">Confirm Password</label>
                                <input type="password" class="form-control" id="repassword" name="repassword"  > 
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save">
                            </form>
                        </div>    
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
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="script.js"></script>
</body>
</html>