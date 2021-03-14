<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Officers</title>
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
            <a href="http://localhost:8080/Project/admindash/pages/tables/officers.php" class="nav-link active">
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
            <a href="http://localhost:8080/Project/admindash/pages/tables/updatepassword.php" class="nav-link">
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
            <h1>Officer's Database</h1>
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
      <form method=post action="deleteofficers.php">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Officer's Details</h3>
          </div>
          <!-- /.card-header -->
          <?php
            include("conn.php");
            error_reporting(0);
            $query="SELECT * FROM officer";
            $data = mysqli_query($conn,$query);
            $no = mysqli_num_rows($data);
          ?>
          <div class="card-body">
            <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
			        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
				        <table class="jsgrid-table">
					        <tr class="jsgrid-header-row">
						        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Empid</th>
						        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Name</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Age</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Rank</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Salary</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Contact</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">SupervisorID</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 70px;">StationID</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">Select</th>
					        </tr>
				        </table>
				      </div>
            </div>
				    <div class="jsgrid-grid-body" style="height: 821px;">
					    <table class="jsgrid-table">
						    <tbody>
                  <?php
                    while($res=mysqli_fetch_assoc($data))
                    { ?>
                      <tr class="jsgrid-row">
								        <td class="jsgrid-cell" style="width: 50px;"><?php echo $res['empid'] ?></td>
								        <td class="jsgrid-cell" style="width: 100px;"><?php echo $res['name'] ?></td>
                        <td class="jsgrid-cell" style="width: 50px;"><?php echo $res['age'] ?></td>
                        <td class="jsgrid-cell" style="width: 100px;"><?php echo $res['rank'] ?></td>
                        <td class="jsgrid-cell" style="width: 50px;"><?php echo $res['salary'] ?></td>
                        <td class="jsgrid-cell" style="width: 100px;"><?php echo $res['contact'] ?></td>
                        <td class="jsgrid-cell" style="width: 100px;"><?php echo $res['superid'] ?></td>
                        <td class="jsgrid-cell" style="width: 70px;"><?php echo $res['sid'] ?></td>
								        <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"><input name="checkbox[]" value="<?php echo $res['empid'] ?>" type="checkbox" enabled=""></td>
							        </tr>
                    <?php
                    } 
                  ?>
						    </tbody>
					    </table>
				    </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div style="padding-left: 20px; padding-bottom: 20px;">
          <button type="submit" name="insert" id="insert" class="login100-form-btn" style="width: 150px;">
				  	Insert
				  </button>
        </div>
        <div style="padding-left: 20px; padding-bottom: 20px;">
          <button type="submit" name="update" id="update" class="login100-form-btn" style="width: 150px;">
				  	Update
				  </button>
        </div>
        <div style="padding-left: 20px; padding-bottom: 20px;">
          <button type="submit" name="delete" id="delete" class="login100-form-btn" style="width: 150px;">
				  	Delete
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