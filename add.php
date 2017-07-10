<?php 
session_start(); 

    if (!$_SESSION['user']) {
        header('Location: ../login.php');
            # code...
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create New AFP</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->

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
                            <a href="add.php" class="active"><i class="fa fa-edit fa-fw"></i> Create New AFP</a>
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

    </div>
    <!-- /#wrapper -->

<style>
  .parsley-error{
    border-color: red;
  }
/*  .parsley-errors-list li{
    color: red;
  }*/
</style>

<div class='container' id="page-wrapper">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Create New AFP</h1>
          </div>
      </div>
    <div class='row'>
      <div class='col-lg-6 col-md-offset-2'>
        <div class='panel panel-default' style="margin-top: 10%;">
          <div class="panel-body">
          <?php if (isset($_SESSION['add_success'])): ?>
            <div class="alert alert-success">
              <?php echo $_SESSION['add_success']; ?>
            </div>
            <?php unset($_SESSION['add_success']); ?>
          <?php endif ?> 
          <?php if (isset($_SESSION['add_failed'])): ?>
            <div class="alert alert-danger">
              <?php echo $_SESSION['add_failed']; ?>
            </div>
            <?php unset($_SESSION['add_failed']); ?>
          <?php endif ?> 
            <form action="functions/CreateAFP.php" method="POST" id="form">
              <table width="100%">
                <tr>
                  <td style="padding-top: 10px;"><label>RANK</label></td>
                </tr>
                <tr>
                  <td><input class="form-control" name="rank" required=""></td>
                </tr>
                <tr>
                  <td style="padding-top: 10px;"><label>Full Name</label>
                        <input class="form-control" type="text" name="lName" required="" placeholder="LAST NAME"> <br>
                        <input class="form-control" type="text" name="fName" required="" placeholder="FIRST NAME"> <br>
                        <input class="form-control" type="text" name="MI" required="" placeholder="MIDDLE INITIAL" data-parsley-maxlength="2"> <br>
                        <input class="form-control" type="text" name="qlfr" placeholder="QLFR" data-parsley-maxlength="3"> <br></td>
                </tr>
                <tr>
                  <td style="padding-top: 10px;">                  
                    <label for="type">AFP Type:</label>
                    <select class="form-control" id="type" name="type">
                      <option value="Officer">Officer</option>
                      <option value="Enlisted Personnel">Enlisted Personnel</option>
                    </select>
                  </td>
                </tr>
                <tr style="padding-top: 10px;">
                  <td style="padding-top: 10px;"><label>AFP SERIAL NR</label></td>
                </tr>
                <tr>
                  <td><input class="form-control" type="text" name="serial_no" required=""></td><br>
                </tr>
                <tr>
                  <td style="padding-top: 10px;">                  
                    <label for="branch">BRANCH OF SVC</label>
                    <select class="form-control" id="branch" name="branch">
                      <option value="VC">VC</option>
                      <option value="PROF">PROF</option>
                      <option value="PA">PA</option>
                      <option value="CHS">CHS</option>
                      <option value="PAF">PAF</option>
                      <option value="PN">PN</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td style="padding-top: 10px;"><label>Birthdate:</label></td>
                </tr>
                <tr>
                  <td><input class='form-control' type="date" name="birthdate" required=""></td>
                </tr>
                <tr>
                  <td style="padding-top: 10px;"><label>Age:</label></td>
                </tr>
                <tr>
                  <td><input class='form-control' type="text" name="age" required="" placeholder="Years" data-parsley-type="number"></td>
                </tr>
                <tr>
                  <td style="padding-top: 10px;">                  
                    <label for="sex">Sex:</label>
                    <select class="form-control" id="sex" name="sex">
                      <option value="m">Male</option>
                      <option value="f">Female</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td style="padding-top: 10px;"><label>Height:</label></td>
                </tr>
                <tr>
                  <td><input class="form-control" required="" name="height"><p class="help-block" data-parsley-type="number">(in METERS)</p></td>
                </tr>
                <tr>
                    <td style="padding-top: 10px;"><label>Weight:</label></td>
                </tr>
                <tr>
                  <td><input class="form-control" required="" name="weight"><p class="help-block" data-parsley-type="number">(in KILOGRAMS)</p></td>
                </tr>
                <tr>
                  <td style="padding-top: 10px;"><label>BP:</label></td>
                </tr>
                <tr>
                  <td><input class="form-control" name="bp" required=""></td>
                </tr>
                <tr>
                <td style="padding-top: 10px;"><label>Unit Assignment:</label></td>
                </tr>
                <tr>
                  <td><input class='form-control' name="assignment" required="" data-parsley-type="alphanum"></td>
                </tr>
                <tr>
                <td style="padding-top: 10px;"><label>Location/Place of Testing:</label></td>
                </tr>
                <tr>
                  <td><input class='form-control' name="location" required="" data-parsley-type="alphanum"></td>
                </tr>
                <tr>
                  <td style="padding-top: 20px; text-align: center">
                  <div class="col-md-1"></div>
                  <div class="col-md-10" >
                  <button type='submit' class="btn btn-success btn-lg"><i class="fa fa-save"> Save</i></button>
                  <button type="reset" class="btn btn-warning btn-lg"><i class="fa fa-repeat"> Reset</i></button> 
                  <button type="button" class="btn btn-danger btn-lg" onClick="parent.location='index.php'"> <i class="fa fa-times"> Cancel</i></button>
                </div>
                <div class="col-md-1"></div>
                  </td>
                </tr>
              </table>
              <br>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- jQuery -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../assets/dist/js/sb-admin-2.js"></script>

    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/parsely.min.js"></script>

    <script type="text/javascript">
      $(function () {
        $('#form').parsley().on('field:validated', function() {
          var ok = $('.parsley-error').length === 0;
          $('.bs-callout-info').toggleClass('hidden', !ok);
          $('.bs-callout-warning').toggleClass('hidden', ok);
        })
      });
    </script>

</body>

</html>
