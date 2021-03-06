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
    <script>
        function addCommas(nStr){
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
      function calc(){
          var price = (parseFloat(document.getElementById("price").value));
          var percent = (parseFloat(document.getElementById("percent").value));
          percent=percent/100;
          var month = document.getElementById("month").value;
          var  month2year = month/12; 
          var interest = (parseFloat(document.getElementById("interest").value));
          interest=interest/100;

            var down = price * percent;
            var down1 = (price * percent).toFixed(2);

            var financeAmount = price - down;
            var financeAmount1 = (price - down).toFixed(2);

            var suminterest = (financeAmount * interest)*(month2year);
            var loanPerMonth = (financeAmount + suminterest)/month;
            var loanPerMonth1 = ((financeAmount + suminterest)/month).toFixed(2);
          document.getElementById("down").value = addCommas(down1);
        //   var down = (parseFloat(document.getElementById("down").value));
          document.getElementById("financeAmount").value = addCommas(financeAmount1);
        //   var financeAmount = (parseFloat(document.getElementById("financeAmount").value));
        //   var suminterest = (financeAmount * interest)*(month2year);
        //   let x = financeAmount + suminterest;
          document.getElementById("loanPerMonth").value= addCommas(loanPerMonth1) ;

      }

    
    </script>
    <title>Car Caalculator</title>
</head>
<body>
    <?php include_once('includes/navbar.php') ?>
    
    <section>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1 >Car Calculator</h1>
        </div>
    </div>
    </section>
    <section class="container my-3">
        <div class="row" name="cart">
            <div class="col-12 profile-top">
           
                <div class="card shadow-lg p-3 mb-5 mt-5 bg-white rounded">
                    <div class="card-body">
                        <h4><b>???????????????????????????</b></h4>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label  for="price">?????????????????? (?????????)</label>
                                <input class="form-control" type="text" id="price"   >
                            </div>
                            <div class="form-group col-md-6">
                            <label  for="percent">?????????????????????????????????????????? (%)</label>
                                <input class="form-control" type="text" id="percent"  >
                            </div>
                            <div class="form-group col-md-6">
                            <label  for="month">??????????????????????????????????????????</label>
                            <select  id="month" class="form-control">
                                <option value="12">12 ????????? (1 ??????)</option>
                                <option value="24">24 ????????? (2 ??????)</option>
                                <option value="36">36 ????????? (3 ??????)</option>
                                <option value="48">48 ????????? (4 ??????)</option>
                                <option value="60">60 ????????? (5 ??????)</option>
                                <option value="72">72 ????????? (6 ??????)</option>
                                <option value="84">84 ????????? (7 ??????)</option>
                                <option value="96">96 ????????? (8 ??????)</option>
                                <option value="108">108 ????????? (9 ??????)</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                            <label  for="interest">???????????????????????? (%) ???????????????</label>
                                <input class="form-control" id="interest" type="text"  >
                            </div>
                        </div>

                        <hr>
                        <h4><b>?????????????????????</b></h4>
                        <br>
                        <div class="form-row" name="ans" >
                            <div class="form-group col-md-6">
                            <label  for="down">???????????????????????????</label>
                            <input type="text" class="form-control" id="down" name="down" disabled  >
                            </div>
                            <div class="form-group col-md-6">
                            <label for="financeAmount">???????????????????????????????????????</label>
                            <input type="text" class="form-control" id="financeAmount" name="financeAmount" disabled >
                            </div>
                            <div class="form-group col-md-6">
                            <label for="loanPerMonth">??????????????????????????????????????????</label>
                            <input type="text" class="form-control" id="loanPerMonth" name="loanPerMonth" disabled >
                            </div>
                        </div>
                            
                            <button class="btn btn-warning float-right " onclick="calc();"> ???????????????</button>
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