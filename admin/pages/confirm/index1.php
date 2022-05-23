<?php 
include_once('../authen.php') ;
$sql = "SELECT * FROM reserve AS t1 INNER JOIN slip AS t2 ON(t1.car_id=t2.order_id) ";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Confirm Order Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="../../dist/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../dist/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../dist/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="../../dist/img/favicons/site.webmanifest">
  <link rel="mask-icon" href="../../dist/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="../../dist/img/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="../../dist/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
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
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css">
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar & Main Sidebar Container -->
  <?php include_once('../includes/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Confirm Order Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Confirm Order Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title d-inline-block">Confirm Order List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID.</th>
              <th>Receipt</th>
              <th>Amount</th>
              <th>Datetime in reseipt</th>
              <th>Reseipt sender</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $num = 0;
            while($row = $result->fetch_assoc()){ 
              $num++; 
            ?>
            
              <tr>
                <td><?php echo $num; ?></td>

                <td><img class="grid" id="myImg" src="../../../slip/<?php echo $row['img']; ?> " width="100" alt="Image Profile"></td>
                
                <td><?php echo number_format($row['amount']) ?></td>
                <td><?php echo $row['datetime'] ?></td>
                <td><?php echo $row['sender'] ?></td>
                <!-- <td><?php echo $row['address'] ?></td> -->
                <!-- <td>
                  <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning text-white">
                    <i class="fas fa-edit"></i> edit
                  </a> 
                </td> -->
                
                  <td style="text-align: center;">
                    <?php if($row['status'] == 'w'){ ?>
                      <!-- <button class="btn btn-danger px-3 mt-2 m-md-3 " data-bs-target="#showForm<?php echo $num; ?>" data-bs-toggle="modal">Reject</button> -->
                      <button class="btn btn-success px-2 mt-2 m-md-3" data-bs-target="#showForm<?php echo $num; ?>" data-bs-toggle="modal">Approve</button>
                        <div class="modal fade" id="showForm<?php echo $num; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">ยืนยันคำสั่งซื้อ</h4>
                                        <button class="btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <label class="col-form-label">ตรวจสอบเสร็จสิ้น... ต้องการอนุมัติคำสั่งซื้อ?</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-danger mb-2 px-2 mt-2 m-md-1" data-bs-dismiss="modal"><i class="fas fa-times"> ยกเลิก</i></button>
                                      <form action="db_confirm.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo "$row[order_id]"; ?>">
                                        <button type="submit" id="submit" name="approve" value="1" class="btn btn-sm btn-success btn-block mb-2 px-2 mt-2 m-md-1"><i class="fas fa-check"></i> ยืนยัน</button>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <button class="btn btn-danger px-3 mt-2 m-md-3" data-bs-target="#showFormRe<?php echo $num; ?>" data-bs-toggle="modal">Reject</button>
                        <div class="modal fade" id="showFormRe<?php echo $num; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">ไม่อนุมัติคำสั่งซื้อ</h4>
                                        <button class="btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <label class="col-form-label">ตรวจสอบข้อมูลแล้วไม่ถูกต้อง... ไม่อนุมัติคำสั่งซื้อ?</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-danger mb-2" data-bs-dismiss="modal">ยกเลิก</button>
                                      <form action="db_reject.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo "$row[order_id]"; ?>">
                                        <button type="submit" id="submit" name="approve" value="1" class="btn btn-sm btn-success btn-block mb-2">ยืนยัน</button>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if($row['status'] == 's'){ ?>
                      <label class="col-form-label">Approved</label>
                    <?php } else { ?>
                      <label class="col-form-label">เช็คโค้ดด้วย มี bug ป่าว</label>
                    <?php } ?>
                  </td>
              </tr>
            
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  <?php include_once('../includes/footer.php') ?>
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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
<!-- DataTables -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script defer src="sc.js"></script>
<script>
  $(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });

  function deleteItem (id) { 
    if( confirm('Are you sure, you want to delete this item?') == true){
      window.location=`delete.php?id=${id}`;
      // window.location='delete.php?id='+id;
    }
  };

</script>

</body>
</html>
