<?php  
session_start();

    if (!$_SESSION['user']) {
        header('Location: ../login.php');
            # code...
    }
  include('functions/DisplayProfile.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="../assets/vendor/bootstrap/css/table.css" rel="stylesheet">
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

        <div id="page-wrapper" class="hit">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $value1['lname']; ?> <?php echo $value1['qlfr']; ?>, <?php echo $value1['fname']; ?> <?php echo $value1['MI']; ?>. (<?php echo $value1['afpType']; ?>)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <div class="col-lg-12">
                  <?php if (isset($_SESSION['success_update'])): ?>
                    <div class="alert alert-success">
                      <?php echo $_SESSION['success_update']; ?>
                    </div>
                    <?php unset($_SESSION['success_update']); ?>
                  <?php endif ?>
                </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="first_name"><h4>First name:</h4></label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $value1['fname']; ?>" style="font-size: 20px; background-color: white;" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                          <div class="col-xs-6">
                            <label for="serial_no"><h4>Serial Number:</h4></label>
                            <?php 
                              $serial_no = $_GET['id'];
                            ?> 

                              <input type="text" class="form-control" name="userial_no" id="userial_no" value="<?php echo $serial_no ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last Name:</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $value1['lname']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="afpType"><h4>AFP Type:</h4></label>
                              <input type="text" class="form-control" name="afpType" value="<?php echo $value1['afpType']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mi"><h4>Middle Initial:</h4></label>
                              <input type="text" class="form-control" name="mi" id="mi" value="<?php echo $value1['MI']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                    <div class="form-group">
                          <div class="col-xs-6">
                            <label for="rank"><h4>Rank:</h4></label>
                              <input type="text" class="form-control" name="rank" id="rank" value="<?php echo $value1['rank']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="rank"><h4>Qlfr:</h4></label>
                              <input type="text" class="form-control" name="qlfr" id="qlfr" value="<?php echo $value1['qlfr']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="branch"><h4>Branch of SVC:</h4></label>
                            <input type="text" class="form-control" name="branch" id="branch" value="<?php echo $value1['svcBranch']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="location"><h4>Sex:</h4></label>
                            <input type="text" class="form-control" name="sex" id="sex" value="<?php echo $value1['sex']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="height"><h4>Height: (meter)</h4></label>
                              <input type="text" class="form-control" name="height" id="height" value="<?php echo $value1['height']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="birthdate"><h4>Date of Birth:</h4></label>
                              <input type="text" class="form-control" name="birthdate" id="birthdate" value="<?php echo $value1['birthdate']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="weight"><h4>Weight: (kilogram)</h4></label>
                              <input type="text" class="form-control" name="weight" id="weight" value="<?php echo $value1['weight']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>


                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="age"><h4>Age:</h4></label>
                              <input type="text" class="form-control" name="age" id="age" value="<?php echo $value1['age']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="location"><h4>Location/Place of Testing:</h4></label>
                            <input type="text" class="form-control" name="location" id="location" value="<?php echo $value1['location']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="bp"><h4>BP:</h4></label>
                              <input type="text" class="form-control" name="bp" id="bp" value="<?php echo $value1['bp']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="assignment"><h4>Unit Assignment:</h4></label>
                              <input type="text" class="form-control" name="assignment" id="assignment" value="<?php echo $value1['unitAssignment']; ?>" style="font-size: 20px; background-color: white;" disabled>
                          </div>
                      </div>                      

                      <div class="col-xs-11"></div>
                <div class="form-inline col-xs-11" style="padding-top: 20px; text-align: right">
                      <?php 
                      $serial_no = $_GET['id'] 
                      ?> 
                  <button type='submit' class="btn btn-success btn-lg" onClick="parent.location='update-profile.php?id=<?php echo $serial_no?>'"><i class="fa fa-pencil"> Update Profile</i></button>
                  <button type="button" class="btn btn-danger btn-lg" onClick="parent.location='<?php if($value1['afpType']==='Officer') echo 'officer.php';if($value1['afpType']==='Enlisted Personnel') echo 'personnel.php'; ?>'"> <i class="fa fa-arrow-left"> Go Back</i></button>
                   <br>
                   <br>
                   <br>
                   <br>
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

</body>

</html>