<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jsGrid -->
  <link rel="stylesheet" href="../../plugins/jsgrid/jsgrid.min.css">
  <link rel="stylesheet" href="../../plugins/jsgrid/jsgrid-theme.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost:8080/Project/admindash/index.php" class="nav-link">Home</a>
    </ul>
    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="airlogo.png" alt="Admin Dashboard" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="admin.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mr. Arjan Singh</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="http://localhost:8080/Project/admindash/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="http://localhost:8080/Project/admindash/pages/tables/officers.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Officers
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="http://localhost:8080/Project/admindash/pages/tables/stations.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Stations
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="http://localhost:8080/Project/admindash/pages/tables/commands.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Commands
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="http://localhost:8080/Project/admindash/pages/tables/jets.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Jets
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="http://localhost:8080/Project/admindash/pages/tables/temp.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Accounts Pending
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="http://localhost:8080/Project/admindash/pages/tables/updatepassword.php" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Edit Password
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Admin Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost:8080/Project/admindash/index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="http://localhost:8080/Project/index.php">Logout</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form method="get" action="">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Type your password</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            Current Password : <input type="password" name="currpass" id="currpass" maxlength="15" required><br/><br/>
            New Password : <input type="password" name="newpass" id="newpass" maxlength="15" required><br/><br/>
            Confirm Password : <input type="password" name="conpass" id="conpass" maxlength="15" required><br/><br/>
          </div>
          <?php
            include("conn.php");
            error_reporting(0);
            $query="SELECT * FROM admin";
            $data = mysqli_query($conn,$query);
            $currpass=$_GET['currpass'];
            $newpass=$_GET['newpass'];
            $conpass=$_GET['conpass'];
            $data=mysqli_query($conn,$query);
						if($data)
   					{ 
              $res=mysqli_fetch_assoc($data);
              $pass=$res['pass'];
              $empid=$res['empid'];
              if($pass==$currpass && $newpass==$conpass)
              {               
                $call = mysqli_prepare($conn, "CALL PASSWORD(?, ?);");
                mysqli_stmt_bind_param($call, 'is', $empid, $newpass);
                mysqli_stmt_execute($call);
                ?>
							  <pre id="info">   Password reset succesfull!</pre>
							  <script>
 								  	setTimeout(function(){
								  	document.getElementById('info').style.display = 'none'}, 5000);
                </script>
							  <?php
              }
              else if($currpass!="" && $newpass!="" && $conpass!="")
						  {
							  ?>
							  <pre id="error">   Invalid Credentials. Please try again!!</pre>
							  <script>
 									setTimeout(function(){
   									document.getElementById('error').style.display = 'none'}, 5000);
							  </script>
						  <?php
						  }
            }
          ?>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div style="padding-left: 20px; padding-bottom: 20px;">
          <button type="submit" name="update" id="update" class="login100-form-btn" style="width: 150px;">
				  	Update
				  </button>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="https://indianairforce.nic.in/">Indian Air Force</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2-pre
    </div>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jsGrid -->
<script src="../../plugins/jsgrid/demos/db.js"></script>
<script src="../../plugins/jsgrid/jsgrid.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->

</script>
</body>
</html>