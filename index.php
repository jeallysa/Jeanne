<?php 
session_start();

    if (!$_SESSION['user']) {
        header('Location: ../login.php');
            # code...
    }

    include('functions/DisplayOfficer.php');
    include('functions/DisplayPersonnel.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

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

    <!-- logo -->
    <link href="../assets/style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>
<style>
    .nav-tabs > li, .nav-pills > li {
    float:none;
    display:inline-block;
    *display:inline; /* ie7 fix */
     zoom:1; /* hasLayout ie7 trigger */
}

.nav-tabs, .nav-pills {
    text-align:center;
}
</style>
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
                            <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
                            <a href="personnel.php"><i class="fa fa-user"></i> Enlisted Personnel</a>
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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <br><br>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_rows1 ?></div>
                                    <div>Officers</div>
                                </div>
                            </div>
                        </div>
                        <a href="officer.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_rows2 ?></div>
                                    <div class="huge"></div>
                                    <div>Enlisted Personnel</div>
                                </div>
                            </div>
                        </div>
                        <a href="personnel.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>No Records</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-check"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Did Not Perform</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-close"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->


            <?php 
                $quarter = '1st Quarter';
                $month = date('m');
                if($month  > 0 && $month  < 4){
                 $quarter = '1st Quarter';
                } elseif($month  > 3 && $month  < 7){
                 $quarter = '2nd Quarter';
                } elseif($month  > 6 && $month  < 10){
                 $quarter = '3rd Quarter';
                } elseif($month  > 9 && $month  < 13){
                 $quarter = '4th Quarter';
                }

             ?>


            <div class="row">
                    <div class="col-sm-3">
                        <label><h4>Year:    </h4></label>
                    <?php
                      $currently_selected = date('Y');
                      echo "$currently_selected";
                    ?>
                    </div>

                    <div class="col-sm-3 pull-right">
                        <label><h4>Quarter:    </h4></label>
                        <?php echo $quarter ?>
                    </div>
            </div>

            <!-- /.row -->
            <ul class="nav nav-tabs" id="myTab" name="quarter">
                <li class="active"><a href="#records" value="1st Quarter" data-toggle="tab">NO RECORDS</a></li>
                <li><a href="#second" value="notperform" data-toggle="tab">DID NOT PERFORM</a></li>
            </ul> 
            <br>
            <div class="tab-content clearfix">     
            <div class="tab-pane active" id="records">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <?php 
                                            $conn = mysqli_connect('localhost', 'root', '', 'pft');
                                            $year = date('Y');
                                            
                                            $all  = mysqli_query($conn ,"SELECT * FROM personal_info p LEFT JOIN pft_info pft ON p.serial_no = pft.serial_no WHERE pft.quarter = '$quarter' AND pft.year = '$year'");

                                            $result = [];
                                            $no_rec = [];
                                            $with_rec = []; 

                                            foreach($result as $key => $value ){
                                                
                                                array_push($result, $value);
                                                if($value['$quarter'] == null){
                                                    array_push($no_rec, $value);
                                                }
                                            }

                                         ?>

                                        <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="AFP Serial No.: activate to sort column descending" style="width: 203px;">AFP Serial No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="afpType: activate to sort column ascending" style="width: 151px;">AFP TYPE:</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Lastname: activate to sort column ascending" style="width: 151px;">Lastname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Firstname: activate to sort column ascending" style="width: 152px;">Firstname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Lastname: activate to sort column ascending" style="width: 151px;">View PFT</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                 <?php 
                                    foreach ($no_rec as $key => $value) {
                                        echo <<<DATA
                                            <tr>
                                                <td>$value[serial_no]</td>
                                                <td>$value[lname]</td>
                                                <td>$value[fname]</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline btn-primary" onClick="parent.location='profile.php'">View Profile</button>
                                                </td>
                                                <td>$value[remarks]</td>
                                            </tr>
DATA;
                                    }
                                 ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>

            <div class="tab-pane" id="notperform">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="AFP Serial No.: activate to sort column descending" style="width: 203px;">AFP Serial No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="afpType: activate to sort column ascending" style="width: 151px;">AFP TYPE:</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Lastname: activate to sort column ascending" style="width: 151px;">Lastname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Firstname: activate to sort column ascending" style="width: 152px;">Firstname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Lastname: activate to sort column ascending" style="width: 151px;">View PFT</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Activation: activate to sort column ascending" style="width: 155px;">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
    <!--                             <?php 
                                    foreach ($no_rec as $key => $value) {
                                        echo <<<DATA
                                            <tr>
                                                <td>$value[serial_no]</td>
                                                <td>$value[lname]</td>
                                                <td>$value[fname]</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline btn-primary" onClick="parent.location='profile.php'">View Profile</button>
                                                </td>
                                                <td>$value[remarks]</td>
                                            </tr>
DATA;
                                    }
                                 ?> -->
                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
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
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
