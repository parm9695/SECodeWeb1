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
    <section class="container my-4">
        <div class="row">
            <div class="col-12 profile-top">
                <img src="img/<?php echo $_SESSION['image'] ?>" class=" img-profile rounded-circle img-thumbnail" alt="Image Profile">
                <!-- Button trigger modal -->
                <button type="button" class="btn mx-auto d-block my-3 btn-primary" data-toggle="modal" data-target="#exampleModal">
                Edit image
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="php/updateImage.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                
                                <figure class="figure text-center d-none mt-2">
                                    <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                                </figure>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg p-3 mb-5 mt-5 bg-white rounded">
                    <div class="card-body">
                        <form id="formUpdate1" method="POST" action="php/updateMember.php">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'] ;?>" disabled > 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Full name</label>
                                    <input type="text" class="form-control" id="name"name="name" value="<?php echo $row['name'] ;?>" > 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ;?>" > 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone"name="phone" value="<?php echo $row['phone'] ;?>" > 
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="5"><?php echo $row['address'] ;?></textarea> 
                            </div>
                            <a href="profile.php" class="btn btn-warning float-left" >Back</a>
                            <input type="submit" class="btn btn-primary float-right" name="submit" value="Save">
                        </form>
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