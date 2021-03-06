<?php  
session_start();

    if (!$_SESSION['user']) {
        header('Location: ../login.php');
            # code...
    }
    include('functions/DisplayPersonnel.php');
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Enlisted Personnel's Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Toggle -->
    <link href="../assets/vendor/bootstrap/css/toggle.css" rel="stylesheet" type="text/css">

    <!-- logo -->
    <link href="../assets/style.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" id="navi">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="alogo">
                <img class="logo" src="../assets/img/logo.png">
                <a class="navbar-brand" href="index.php" id="white">Welcome 
                <?php 
                    if(isset($_SESSION['user'])){
                        echo $_SESSION['user'];
                    }
                 ?>    
                </a>
                </div>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown" >
                    <a class="dropdown" data-toggle="dropdown" id="white">
                        <i class="fa fa-user fa-fw" ></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="change-password.php"><i class="fa fa-lock fa-fw"></i>Change Password</a></li>
                        <li><a href="../index.php?logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        <?php 
                            if (isset($_GET['logout'])) {
                                session_unset();
                                session_destroy();
                                header('Location: ../login.php');
                                # code...
                            }
                         ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">                    
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="add.php"><i class="fa fa-edit fa-fw"></i> Create New AFP</a>
                        </li>
                        <li>
                            <a href="logs.php"><i class="fa fa-info fa-fw"></i> Activity Logs</a>
                        </li>
                        <li id="navi"><span id="white"><i class="fa fa-folder-open fa-fw"></i> AFP Profile</span></li>
                        <li>
                            <a href="officer.php"><i class="fa fa-user"></i> Officer</a>
                        </li>
                         <li>
                            <a href="personnel.php" class="active"><i class="fa fa-user"></i> Enlisted Personnel</a>
                        </li>
                        <li id="navi"><span id="white"><i class="fa fa-pencil fa-fw"></i> PFT Results Entry</span></li>
                        <li>
                            <a href="officer-entries.php"><i class="fa fa-user"></i> Officer</a>
                        </li>
                         <li>
                            <a href="personnel-entries.php"><i class="fa fa-user"></i> Enlisted Personnel</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Enlisted Personnel's Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Enlisted Personnel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
 <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <th>AFP Serial No.</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Profile</th>
                                    <th>Records</th>
                                    <th>Activation</th>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach ($data as $key => $value) {
                                        $serial_no = $value['serial_no'];

                                ?>
                    
                                            <tr>
                                                <td><?php echo $value['serial_no'] ?></td> 
                                                <td><?php echo $value['lname'] ?></td>
                                                <td><?php echo $value['fname'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-outline btn-primary"  onClick="parent.location='personalInfo.php?id=<?php echo $serial_no ?>'">View Profile</button> 
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline btn-primary" onClick="parent.location='records.php?id=<?php echo $serial_no ?>'">View Records</button>
                                                </td>
                                                  <td align="center">
                                                  
                                                 <form action="functions/activateAfp.php" method="post">
                                                      <input type="hidden" name="serial_no" value="<?php echo $serial_no ?>">
                                                 </form>

                                                    <?php if ($value['afpStat'] == 0): ?>
                                                        <label class="switch">
                                                          <input type="checkbox" class='toggle' target-id='<?php echo $value['serial_no']?>'>
                                                          <div class="slider round"></div>
                                                        </label>
                                                    <?php endif ?>
                                                    <?php if ($value['afpStat'] == 1): ?>
                                                        <label class="switch">
                                                          <input type="checkbox" class='toggle' target-id='<?php echo $value['serial_no'] ?>' checked>
                                                          <div class="slider round"></div>
                                                        </label>
                                                    <?php endif ?>
                                                    
                                                </td>
                                            </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../assets/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

    <script>
          $('.table').on('change', '.toggle', function(){
            var id = $(this).attr('target-id');
            if($(this).is(":checked")){
                var data = {
                    id : id,
                    functionName : 'enableAfp',
                };
                $.post(window.location.origin+'/functions/activateAfp.php', data, 
                    function(resp){
                        alert(resp);
            
                });
            }else{
                var data = {
                    id : id,
                    functionName : 'disableAfp'
                }
                $.post(window.location.origin+'/functions/activateAfp.php', data, function(resp){
                   
                    alert(resp);
                });
            }
        });
    </script>

</body>

</html>
