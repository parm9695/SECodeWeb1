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
    <link rel="stylesheet" href="node_modules/datetimepicker/src/DateTimePicker.css">
    <link rel="stylesheet" href="style.css">
    <title>Proof</title>
    <style>
        
    </style>
</head>
<body>
    <?php include_once('includes/navbar.php') ?>
    <section>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1 >Proof of transfer</h1>
        </div>
    </div>
    </section>

    <section class="container my-4">   
        <div class="card mt-6">
            <div class="card-body">
                <form id="formProof" method="POST" action="php/db_add_slip.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="formGroupInput" class="col-form-label">Reserve ID :</label>
                                <input type="text" class="form-control" name="id" id="formGroupInput" value="<?php echo $_GET['id'] ;?>" readonly >
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-4">
                                <label for="formGroupExampleInput" class="col-form-label">Username :</label>
                                <input type="text" class="form-control" name="username" id="formGroupExampleInput" value="<?php echo $row['username'] ;?>" readonly >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="imgproof" class="col-form-label">Submit proof of payment or transfer.    </label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imgproof" name="imgproof" required>
                                    <label class="custom-file-label" for="imgproof" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                </div>
                            </div>
                            <div class="control-group">
                            <form>
                                <label for="party">Date Time:</label>
                                <input id="party" type="datetime-local" name="date_time" required>
                            </form>

                    
                                <div id="dtBox"></div>
                    
                            </div>
                            <div class="form-group">
                                <label for="amount">Transfer amount</label>
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Example 3,000 Baht" required>
                            </div>
                            <a href="profile.php" class="btn btn-warning float-left" >Back</a>
                            <input type="submit" class="btn btn-primary float-right" name="submit" value="Save">
                        
                        </div>
                    </div>
                </form>
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
<script src="node_modules/datetimepicker/src/DateTimePicker.js"></script>
<script type="text/javascript">
		
			$(document).ready(function()
			{
				$("#dtBox").DateTimePicker({
				
					secondsInterval: 5

				});
			});
		
		</script>
</body>
</html>