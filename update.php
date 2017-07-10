<?php  
session_start();

    if (!$_SESSION['user']) {
        header('Location: ../login.php');
    }
  include('functions/DisplayProfile.php');
  $tab = $_GET['tab'];
  $_SESSION['tab'] = $tab;
?>

<!DOCTYPE html>
<html lang="en"> 

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update PFT record</title>

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
  <style>
    .right {
        width: 65%;
        margin-left: 10px;
        float: right;
        text-align: right;
    }
    .year {
      float: left;
    }
                    
  </style>

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
    </div>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $value1['lname']; ?>, <?php echo $value1['fname']; ?> <?php echo $value1['MI']; ?>. (<?php echo $value1['afpType']; ?>)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        <div class="container">
          <div class="row">
            <div class="col-sm-3"><!--left col-->
              <ul class="list-group">
                <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>AFP SERIAL NR</strong></span>
                  <?php 
                      $serial_no = $_GET['id'];
                      echo($serial_no);
                    ?>                 
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>BRANCH</strong></span><?php echo $value1['svcBranch']; ?> </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>RANK</strong></span><?php echo $value1['rank']; ?> </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>LAST NAME</strong></span><?php echo $value1['lname']; ?> </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>FIRST NAME</strong></span> <?php echo $value1['fname']; ?> </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>MI</strong></span> <?php echo $value1['MI']; ?> </li> <br><br>
                <li class="list-group-item text-right"><span class="pull-left">Date of Birth:</span> <?php echo $value1['birthdate']; ?> </li>
                <li class="list-group-item text-right"><span class="pull-left">Age:</span> <?php echo $value1['age']; ?> </li>
                <li class="list-group-item text-right"><span class="pull-left">Sex:</span> <?php echo $value1['sex']; ?> </li>
                <li class="list-group-item text-right"><span class="pull-left">Height(m):</span> <?php echo $value1['height']; ?> </li>
                <li class="list-group-item text-right"><span class="pull-left">Weight(kg):</span><?php echo $value1['weight']; ?> </li>
                <li class="list-group-item text-right"><span class="pull-left">BP:</span> <?php echo $value1['bp']; ?></li><br><br>
                <li class="list-group-item text-right"><span class="pull-left">Unit Assignment:</span> <?php echo $value1['unitAssignment']; ?> </li>
                <li class="list-group-item text-right"><span class="pull-left">Location/Place of Testing:</span> <?php echo $value1['location']; ?> </li>
              </ul>
            </div><!--/left col-->
            <label class="year">YEAR: </label> 
            &nbsp;
            <?php 
              $latest_year = date('Y');
              echo "$latest_year";
            ?>
            <br><br>
        	  <div class="col-sm-7">
               <?php 
                  $serial_no = $_GET['id'];
                ?> 
              <ul class="nav nav-tabs" id="myTab" name="quarter">
                <li class="<?php if($_GET['tab'] === '1'){ echo 'active'; } ?>"><a href="#home" value="1st Quarter" data-toggle="tab">1st Quarter</a></li>
                <li class="<?php if($_GET['tab'] === '2'){ echo 'active'; } ?>"><a href="#second" value="2nd Quarter" data-toggle="tab">2nd Quarter</a></li>
                <li class="<?php if($_GET['tab'] === '3'){ echo 'active'; } ?>"><a href="#third" value="3rd Quarter" data-toggle="tab">3rd Quarter</a></li>
                <li class="<?php if($_GET['tab'] === '4'){ echo 'active'; } ?>"><a href="#fourth" value="4th Quarter" data-toggle="tab">4th Quarter</a></li>
              </ul> 
              <div class="tab-content clearfix">

                <div class="tab-pane <?php if($_GET['tab'] === '1'){ echo 'active'; } ?>" id="home">
                    <form action="functions/AddPFTRecord.php" method="POST">
                      <input type="hidden" name="quarter" value="1st Quarter" >
                        <?php 
                          $conn = mysqli_connect('localhost', 'root', '', 'pft');
                          $quarter1 = "SELECT * FROM pft_info WHERE quarter = '1st Quarter' AND serial_no = '$serial_no' and year = '$latest_year'";
                          $result1 = mysqli_query($conn, $quarter1);
                          $value = mysqli_fetch_array($result1);
                        ?>
                       
                      <div class="table">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th colspan="2">EVENTS</th>
                              <th>RAW SCORE/TIME</th>
                              <th>RATING %</th>
                              <th>STATUS</th>
                            </tr>
                          </thead>
                          <tbody id="items">
                            <tr>
                              <td style="text-align:left;">PUSH-UP</td>
                              <td>2 Minutes</td>
                              <td><input class="form-control" type="text" name="score1" value="<?php echo $value['pushupScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating1" value="<?php echo $value['pushupRate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status1" name="status1">
                                    <option value="" <?php if($value['pushupStat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['pushupStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['pushupStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">SIT-UP</td>    
                              <td>2 Minutes</td>
                              <td><input class="form-control" type="text" name="score2" value="<?php echo $value['situpScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating2" value="<?php echo $value['situpRate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status2" name="status2">
                                    <option value="" <?php if($value['situpStat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['situpStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['situpStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">DISTANCE RUN</td>
                              <td>3.2 km/2 km</td>
                              <td><input class="form-control" type="text" name="score3" value="<?php echo $value['runScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating3" value="<?php echo $value['runRate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status3" name="status3">
                                    <option value="" <?php if($value['runStat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['runStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['runStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>  
                            </tr>
                            <tr>
                              <td style="text-align:left;">
                              <input class="form-control" type="text" name="alt4" value="<?php echo $value['alternative1']; ?>"></td>
                              <td><input class="form-control" type="text" name="time4" value="<?php echo $value['alternativeEvent1']; ?>"></td>
                              <td><input class="form-control" type="text" name="score4" value="<?php echo $value['alternative1ScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating4" value="<?php echo $value['alternative1Rate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status4" name="status4">
                                    <option value="" <?php if($value['alternative1Stat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['alternative1Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['alternative1Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">
                              <input class="form-control" type="text" name="alt5" value="<?php echo $value['alternative2']; ?>"></td>
                              <td><input class="form-control" type="text" name="time5" value="<?php echo $value['alternativeEvent2']; ?>"></td>
                              <td><input class="form-control" type="text" name="score5" value="<?php echo $value['alternative2ScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating5" value="<?php echo $value['alternative2Rate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status5" name="status5">
                                    <option value="" <?php if($value['alternative2Stat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['alternative2Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['alternative2Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">
                              <input class="form-control" type="text" name="alt6" value="<?php echo $value['alternative3']; ?>"></td>
                              <td><input class="form-control" type="text" name="time6" value="<?php echo $value['alternativeEvent3']; ?>"></td>
                              <td><input class="form-control" type="text" name="score6" value="<?php echo $value['alternative3ScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating6" value="<?php echo $value['alternative3Rate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status6" name="status6">
                                    <option value="" <?php if($value['alternative3Stat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['alternative3Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['alternative3Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                          </tbody>
                        </table><hr>
                      </div><!--/table-resp-->

                      <div class="form-group">
                        <label>DATE CONDUCTED:</label>
                        <input class="form-control right" placeholder="DD-MM-YY" type="date" name="dateConducted" value="<?php echo $value['dateConducted']; ?>">
                      </div>

                      <div class="form-group">
                        <label>VALID UNTIL:</label>
                        <input class="form-control right" placeholder="DD-MM-YY" type="date" name="validity" value="<?php echo $value['validity']; ?>">
                      </div>
                      
                      <div class="form-group">
                        <label>AVERAGE/RATING:</label>
                        <input class="form-control right" name="averageRating" value="<?php echo $value['aveRate']; ?>">  
                      </div>
                        
                      <div class="form-group">
                        <label>REMARKS:</label>
                        <select class="form-control right" id="remarks" name="remarks">
                        <option value="" <?php if($value['remark']==='') echo 'selected="selected"'; ?>></option>
                        <option value="Medical" <?php if($value['remark']==='Medical') echo 'selected="selected"'; ?>>Medical</option>
                        <option value="Mission" <?php if($value['remark']==='Mission') echo 'selected="selected"'; ?>>Mission</option>
                        <option value="Disqualified" <?php if($value['remark']==='Disqualified') echo 'selected="selected"'; ?>>Disqualified</option>
                        <option value="Leave" <?php if($value['remark']==='Leave') echo 'selected="selected"'; ?>>Leave</option>
                        </select>
                      </div>

                      <div class="form-group">
                          <label>TYPES OF TESTING:</label>
                          <select class="form-control right" id="testingType" name="testingType">
                            <option value="" <?php if($value['testType']==='') echo 'selected="selected"'; ?>></option>
                            <option value="Regular" <?php if($value['testType']==='Regular') echo 'selected="selected"'; ?>>Regular</option>
                            <option value="1st Remedial" <?php if($value['testType']==='1st Remedial') echo 'selected="selected"'; ?>>1st Remedial</option>
                            <option value="Final Remedial" <?php if($value['testType']==='Final Remedial') echo 'selected="selected"'; ?>>Final Remedial</option>
                            <option value="Alternative" <?php if($value['testType']==='Alternative') echo 'selected="selected"'; ?>>Alternative</option>
                          </select>
                      </div>  
                        
                      <div class="form-group">
                        <label>STATUS:</label>
                        <select class="form-control right" id="genstatus" name="genstatus">
                          <option value="" <?php if($value['genStat']==='') echo 'selected="selected"'; ?>> </option>
                          <option value="PASSED" <?php if($value['genStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                          <option value="FAILED" <?php if($value['genStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                        </select>
                      </div>
                      <div class="form-inline col-xs-10" style="padding-top: 20px; padding-bottom: 50px; text-align: right">

                    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save" > Save</i></button>
                    <input type="hidden" name="id" value="<?php echo $serial_no ?>"> 
                    <button type="button" class="btn btn-lg btn-danger" onClick="parent.location='profile.php?id=<?php echo $serial_no?>&tab=1'"><i class="fa fa-times"> Cancel</i></button><br><br>
                  </div>
                     </form>
                </div><!--/first Quarter-->

                <div class="tab-pane  <?php if($_GET['tab'] === '2'){ echo 'active'; } ?>" id="second">
                  <form action="functions/AddPFTRecord.php" method="POST" >
                  <input type="hidden" name="quarter" value="2nd Quarter" >
                  <?php 
                    $conn = mysqli_connect('localhost', 'root', '', 'pft');
                    $quarter1 = "SELECT * FROM pft_info WHERE quarter = '2nd Quarter' AND serial_no = '$serial_no' and year = '$latest_year'";
                    $result1 = mysqli_query($conn, $quarter1);
                    $value = mysqli_fetch_array($result1);    
                  ?>
                  <div class="table">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th colspan="2">EVENTS</th>
                          <th>RAW SCORE/TIME</th>
                          <th>RATING %</th>
                          <th>STATUS</th>
                        </tr>
                      </thead>
                      <tbody id="items">
                        <tr>
                          <td style="text-align:left;">PUSH-UP</td>
                          <td>2 Minutes</td>
                          <td><input class="form-control" type="text" name="score1" value="<?php echo $value['pushupScoreTime']; ?>"></td>
                          <td><input class="form-control" type="text" name="rating1" value="<?php echo $value['pushupRate']; ?>"></td>
                          <td>
                              <select class="form-control" id="status1" name="status1">
                                <option value="" <?php if($value['pushupStat']==='') echo 'selected="selected"'; ?>> </option>
                                <option value="PASSED" <?php if($value['pushupStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                <option value="FAILED" <?php if($value['pushupStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                              </select>
                          </td>
                        </tr>
                        <tr>
                          <td style="text-align:left;">SIT-UP</td>    
                          <td>2 Minutes</td>
                          <td><input class="form-control" type="text" name="score2" value="<?php echo $value['situpScoreTime']; ?>"></td>
                          <td><input class="form-control" type="text" name="rating2" value="<?php echo $value['situpRate']; ?>"></td>
                          <td>
                              <select class="form-control" id="status2" name="status2">
                                <option value="" <?php if($value['situpStat']==='') echo 'selected="selected"'; ?>> </option>
                                <option value="PASSED" <?php if($value['situpStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                <option value="FAILED" <?php if($value['situpStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                              </select>
                          </td>
                        </tr>
                        <tr>
                          <td style="text-align:left;">DISTANCE RUN</td>
                          <td>3.2 km/2 km</td>
                          <td><input class="form-control" type="text" name="score3" value="<?php echo $value['runScoreTime']; ?>"></td>
                          <td><input class="form-control" type="text" name="rating3" value="<?php echo $value['runRate']; ?>"></td>
                          <td>
                              <select class="form-control" id="status3" name="status3">
                                <option value="" <?php if($value['runStat']==='') echo 'selected="selected"'; ?>> </option>
                                <option value="PASSED" <?php if($value['runStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                <option value="FAILED" <?php if($value['runStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                              </select>
                          </td>  
                        </tr>
                        <tr>
                          <td style="text-align:left;">
                          <input class="form-control" type="text" name="alt4" value="<?php echo $value['alternative1']; ?>"></td>
                          <td><input class="form-control" type="text" name="time4" value="<?php echo $value['alternativeEvent1']; ?>"></td>
                          <td><input class="form-control" type="text" name="score4" value="<?php echo $value['alternative1ScoreTime']; ?>"></td>
                          <td><input class="form-control" type="text" name="rating4" value="<?php echo $value['alternative1Rate']; ?>"></td>
                          <td>
                              <select class="form-control" id="status4" name="status4">
                                <option value="" <?php if($value['alternative1Stat']==='') echo 'selected="selected"'; ?>> </option>
                                <option value="PASSED" <?php if($value['alternative1Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                <option value="FAILED" <?php if($value['alternative1Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                              </select>
                          </td>
                        </tr>
                        <tr>
                          <td style="text-align:left;">
                          <input class="form-control" type="text" name="alt5" value="<?php echo $value['alternative2']; ?>"></td>
                          <td><input class="form-control" type="text" name="time5" value="<?php echo $value['alternativeEvent2']; ?>"></td>
                          <td><input class="form-control" type="text" name="score5" value="<?php echo $value['alternative2ScoreTime']; ?>"></td>
                          <td><input class="form-control" type="text" name="rating5" value="<?php echo $value['alternative2Rate']; ?>"></td>
                          <td>
                              <select class="form-control" id="status5" name="status5">
                                <option value="" <?php if($value['alternative2Stat']==='') echo 'selected="selected"'; ?>> </option>
                                <option value="PASSED" <?php if($value['alternative2Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                <option value="FAILED" <?php if($value['alternative2Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                              </select>
                          </td>
                        </tr>
                        <tr>
                          <td style="text-align:left;">
                          <input class="form-control" type="text" name="alt6" value="<?php echo $value['alternative3']; ?>"></td>
                          <td><input class="form-control" type="text" name="time6" value="<?php echo $value['alternativeEvent3']; ?>"></td>
                          <td><input class="form-control" type="text" name="score6" value="<?php echo $value['alternative3ScoreTime']; ?>"></td>
                          <td><input class="form-control" type="text" name="rating6" value="<?php echo $value['alternative3Rate']; ?>"></td>
                          <td>
                              <select class="form-control" id="status6" name="status6">
                                <option value="" <?php if($value['alternative3Stat']==='') echo 'selected="selected"'; ?>> </option>
                                <option value="PASSED" <?php if($value['alternative3Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                <option value="FAILED" <?php if($value['alternative3Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                              </select>
                          </td>
                        </tr>
                      </tbody>
                    </table><hr>
                  </div><!--/table-resp-->

                  <div class="form-group">
                    <label>DATE CONDUCTED:</label>
                    <input class="form-control right" placeholder="DD-MM-YY" type="date" name="dateConducted" value="<?php echo $value['dateConducted']; ?>">
                  </div>

                  <div class="form-group">
                    <label>VALID UNTIL:</label>
                    <input class="form-control right" placeholder="DD-MM-YY" type="date" name="validity" value="<?php echo $value['validity']; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>AVERAGE/RATING:</label>
                    <input class="form-control right" name="averageRating" value="<?php echo $value['aveRate']; ?>">  
                  </div>
                    
                  <div class="form-group">
                    <label>REMARKS:</label>
                    <select class="form-control right" id="remarks" name="remarks">
                    <option value="" <?php if($value['remark']==='') echo 'selected="selected"'; ?>></option>
                    <option value="Medical" <?php if($value['remark']==='Medical') echo 'selected="selected"'; ?>>Medical</option>
                    <option value="Mission" <?php if($value['remark']==='Mission') echo 'selected="selected"'; ?>>Mission</option>
                    <option value="Disqualified" <?php if($value['remark']==='Disqualified') echo 'selected="selected"'; ?>>Disqualified</option>
                    <option value="Leave" <?php if($value['remark']==='Leave') echo 'selected="selected"'; ?>>Leave</option>
                    </select>
                  </div>

                  <div class="form-group">
                      <label>TYPES OF TESTING:</label>
                      <select class="form-control right" id="testingType" name="testingType">
                      <option value="" <?php if($value['testType']==='') echo 'selected="selected"'; ?>></option>
                      <option value="Regular" <?php if($value['testType']==='Regular') echo 'selected="selected"'; ?>>Regular</option>
                      <option value="1st Remedial" <?php if($value['testType']==='1st Remedial') echo 'selected="selected"'; ?>>1st Remedial</option>
                      <option value="Final Remedial" <?php if($value['testType']==='Final Remedial') echo 'selected="selected"'; ?>>Final Remedial</option>
                      <option value="Alternative" <?php if($value['testType']==='Alternative') echo 'selected="selected"'; ?>>Alternative</option>
                    </select>
                  </div>  
                    
                  <div class="form-group">
                    <label>STATUS:</label>
                    <select class="form-control right" id="genstatus" name="genstatus">
                      <option value="" <?php if($value['genStat']==='') echo 'selected="selected"'; ?>> </option>
                      <option value="PASSED" <?php if($value['genStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                      <option value="FAILED" <?php if($value['genStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                    </select>
                  </div>
                  <div class="form-inline col-xs-10" style="padding-top: 20px; padding-bottom: 50px; text-align: right">

                    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"> Save</i></button>
                    <input type="hidden" name="id" value="<?php echo $serial_no ?>"> 
                    <button type="button" class="btn btn-lg btn-danger" onClick="parent.location='profile.php?id=<?php echo $serial_no?>&tab=2'"><i class="fa fa-times"> Cancel</i></button><br><br>
                  </div>
                 </form>
                </div><!--/second Quarter-->

                <div class="tab-pane  <?php if($_GET['tab'] === '3'){ echo 'active'; } ?>" id="third">
                    <form action="functions/AddPFTRecord.php" method="POST" >
                      <input type="hidden" name="quarter" value="3rd Quarter" >
                        <?php 
                          $conn = mysqli_connect('localhost', 'root', '', 'pft');
                          $quarter1 = "SELECT * FROM pft_info WHERE quarter = '3rd Quarter' AND serial_no = '$serial_no' and year = '$latest_year'";
                          $result1 = mysqli_query($conn, $quarter1);
                          $value = mysqli_fetch_array($result1);    
                        ?>
                      <div class="table">
                        <?php if (isset($_SESSION['add_success'])): ?>
                          <div class="alert alert-success">
                            <?php echo $_SESSION['add_success']; ?>
                          </div>
                          <?php unset($_SESSION['add_success']); ?>
                        <?php endif ?> 
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th colspan="2">EVENTS</th>
                              <th>RAW SCORE/TIME</th>
                              <th>RATING %</th>
                              <th>STATUS</th>
                            </tr>
                          </thead>
                          <tbody id="items">
                            <tr>
                              <td style="text-align:left;">PUSH-UP</td>
                              <td>2 Minutes</td>
                              <td><input class="form-control" type="text" name="score1" value="<?php echo $value['pushupScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating1" value="<?php echo $value['pushupRate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status1" name="status1">
                                    <option value="" <?php if($value['pushupStat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['pushupStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['pushupStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">SIT-UP</td>    
                              <td>2 Minutes</td>
                              <td><input class="form-control" type="text" name="score2" value="<?php echo $value['situpScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating2" value="<?php echo $value['situpRate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status2" name="status2">
                                    <option value="" <?php if($value['situpStat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['situpStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['situpStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">DISTANCE RUN</td>
                              <td>3.2 km/2 km</td>
                              <td><input class="form-control" type="text" name="score3" value="<?php echo $value['runScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating3" value="<?php echo $value['runRate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status3" name="status3">
                                    <option value="" <?php if($value['runStat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['runStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['runStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>  
                            </tr>
                            <tr>
                              <td style="text-align:left;">
                              <input class="form-control" type="text" name="alt4" value="<?php echo $value['alternative1']; ?>"></td>
                              <td><input class="form-control" type="text" name="time4" value="<?php echo $value['alternativeEvent1']; ?>"></td>
                              <td><input class="form-control" type="text" name="score4" value="<?php echo $value['alternative1ScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating4" value="<?php echo $value['alternative1Rate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status4" name="status4">
                                    <option value="" <?php if($value['alternative1Stat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['alternative1Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['alternative1Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">
                              <input class="form-control" type="text" name="alt5" value="<?php echo $value['alternative2']; ?>"></td>
                              <td><input class="form-control" type="text" name="time5" value="<?php echo $value['alternativeEvent2']; ?>"></td>
                              <td><input class="form-control" type="text" name="score5" value="<?php echo $value['alternative2ScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating5" value="<?php echo $value['alternative2Rate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status5" name="status5">
                                    <option value="" <?php if($value['alternative2Stat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['alternative2Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['alternative2Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">
                              <input class="form-control" type="text" name="alt6" value="<?php echo $value['alternative3']; ?>"></td>
                              <td><input class="form-control" type="text" name="time6" value="<?php echo $value['alternativeEvent3']; ?>"></td>
                              <td><input class="form-control" type="text" name="score6" value="<?php echo $value['alternative3ScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating6" value="<?php echo $value['alternative3Rate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status6" name="status6">
                                    <option value="" <?php if($value['alternative3Stat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['alternative3Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['alternative3Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                          </tbody>
                        </table><hr>
                      </div><!--/table-resp-->

                      <div class="form-group">
                        <label>DATE CONDUCTED:</label>
                        <input class="form-control right" placeholder="DD-MM-YY" type="date" name="dateConducted" value="<?php echo $value['dateConducted']; ?>">
                      </div>

                      <div class="form-group">
                        <label>VALID UNTIL:</label>
                        <input class="form-control right" placeholder="DD-MM-YY" type="date" name="validity" value="<?php echo $value['validity']; ?>">
                      </div>
                      
                      <div class="form-group">
                        <label>AVERAGE/RATING:</label>
                        <input class="form-control right" name="averageRating" value="<?php echo $value['aveRate']; ?>">  
                      </div>
                        
                      <div class="form-group">
                        <label>REMARKS:</label>
                        <select class="form-control right" id="remarks" name="remarks">
                        <option value="" <?php if($value['remark']==='') echo 'selected="selected"'; ?>></option>
                        <option value="Medical" <?php if($value['remark']==='Medical') echo 'selected="selected"'; ?>>Medical</option>
                        <option value="Mission" <?php if($value['remark']==='Mission') echo 'selected="selected"'; ?>>Mission</option>
                        <option value="Disqualified" <?php if($value['remark']==='Disqualified') echo 'selected="selected"'; ?>>Disqualified</option>
                        <option value="Leave" <?php if($value['remark']==='Leave') echo 'selected="selected"'; ?>>Leave</option>
                        </select>
                      </div>

                      <div class="form-group">
                          <label>TYPES OF TESTING:</label>
                          <select class="form-control right" id="testingType" name="testingType">
                          <option value="" <?php if($value['testType']==='') echo 'selected="selected"'; ?>></option>
                          <option value="Regular" <?php if($value['testType']==='Regular') echo 'selected="selected"'; ?>>Regular</option>
                          <option value="1st Remedial" <?php if($value['testType']==='1st Remedial') echo 'selected="selected"'; ?>>1st Remedial</option>
                          <option value="Final Remedial" <?php if($value['testType']==='Final Remedial') echo 'selected="selected"'; ?>>Final Remedial</option>
                          <option value="Alternative" <?php if($value['testType']==='Alternative') echo 'selected="selected"'; ?>>Alternative</option>
                        </select>
                      </div>  
                        
                      <div class="form-group">
                        <label>STATUS:</label>
                        <select class="form-control right" id="genstatus" name="genstatus">
                          <option value="" <?php if($value['genStat']==='') echo 'selected="selected"'; ?>> </option>
                          <option value="PASSED" <?php if($value['genStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                          <option value="FAILED" <?php if($value['genStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                        </select>
                      </div>
                  <div class="form-inline col-xs-10" style="padding-top: 20px; padding-bottom: 50px; text-align: right">

                    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"> Save</i></button>
                    <input type="hidden" name="id" value="<?php echo $serial_no ?>"> 
                    <button type="button" class="btn btn-lg btn-danger" onClick="parent.location='profile.php?id=<?php echo $serial_no?>&tab=3'"><i class="fa fa-times"> Cancel</i></button><br><br>
                  </div>
                     </form>
                </div><!--/third Quarter-->

                <div class="tab-pane  <?php if($_GET['tab'] === '4'){ echo 'active'; } ?>" id="fourth">
                    <form action="functions/AddPFTRecord.php" method="POST" >
                      <input type="hidden" name="quarter" value="4th Quarter" >
                        <?php 
                          $conn = mysqli_connect('localhost', 'root', '', 'pft');
                          $quarter1 = "SELECT * FROM pft_info WHERE quarter = '4th Quarter' AND serial_no = '$serial_no' and year = '$latest_year'";
                          $result1 = mysqli_query($conn, $quarter1);
                          $value = mysqli_fetch_array($result1);    
                        ?>
                      <div class="table">
                        <?php if (isset($_SESSION['add_success'])): ?>
                          <div class="alert alert-success">
                            <?php echo $_SESSION['add_success']; ?>
                          </div>
                          <?php unset($_SESSION['add_success']); ?>
                        <?php endif ?> 
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th colspan="2">EVENTS</th>
                              <th>RAW SCORE/TIME</th>
                              <th>RATING %</th>
                              <th>STATUS</th>
                            </tr>
                          </thead>
                          <tbody id="items">
                            <tr>
                              <td style="text-align:left;">PUSH-UP</td>
                              <td>2 Minutes</td>
                              <td><input class="form-control" type="text" name="score1" value="<?php echo $value['pushupScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating1" value="<?php echo $value['pushupRate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status1" name="status1">
                                    <option value="" <?php if($value['pushupStat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['pushupStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['pushupStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">SIT-UP</td>    
                              <td>2 Minutes</td>
                              <td><input class="form-control" type="text" name="score2" value="<?php echo $value['situpScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating2" value="<?php echo $value['situpRate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status2" name="status2">
                                    <option value="" <?php if($value['situpStat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['situpStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['situpStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">DISTANCE RUN</td>
                              <td>3.2 km/2 km</td>
                              <td><input class="form-control" type="text" name="score3" value="<?php echo $value['runScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating3" value="<?php echo $value['runRate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status3" name="status3">
                                    <option value="" <?php if($value['runStat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['runStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['runStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>  
                            </tr>
                            <tr>
                              <td style="text-align:left;">
                              <input class="form-control" type="text" name="alt4" value="<?php echo $value['alternative1']; ?>"></td>
                              <td><input class="form-control" type="text" name="time4" value="<?php echo $value['alternativeEvent1']; ?>"></td>
                              <td><input class="form-control" type="text" name="score4" value="<?php echo $value['alternative1ScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating4" value="<?php echo $value['alternative1Rate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status4" name="status4">
                                    <option value="" <?php if($value['alternative1Stat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['alternative1Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['alternative1Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">
                              <input class="form-control" type="text" name="alt5" value="<?php echo $value['alternative2']; ?>"></td>
                              <td><input class="form-control" type="text" name="time5" value="<?php echo $value['alternativeEvent2']; ?>"></td>
                              <td><input class="form-control" type="text" name="score5" value="<?php echo $value['alternative2ScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating5" value="<?php echo $value['alternative2Rate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status5" name="status5">
                                    <option value="" <?php if($value['alternative2Stat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['alternative2Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['alternative2Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;">
                              <input class="form-control" type="text" name="alt6" value="<?php echo $value['alternative3']; ?>"></td>
                              <td><input class="form-control" type="text" name="time6" value="<?php echo $value['alternativeEvent3']; ?>"></td>
                              <td><input class="form-control" type="text" name="score6" value="<?php echo $value['alternative3ScoreTime']; ?>"></td>
                              <td><input class="form-control" type="text" name="rating6" value="<?php echo $value['alternative3Rate']; ?>"></td>
                              <td>
                                  <select class="form-control" id="status6" name="status6">
                                    <option value="" <?php if($value['alternative3Stat']==='') echo 'selected="selected"'; ?>> </option>
                                    <option value="PASSED" <?php if($value['alternative3Stat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                                    <option value="FAILED" <?php if($value['alternative3Stat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                                  </select>
                              </td>
                            </tr>
                          </tbody>
                        </table><hr>
                      </div><!--/table-resp-->

                      <div class="form-group">
                        <label>DATE CONDUCTED:</label>
                        <input class="form-control right" placeholder="DD-MM-YY" type="date" name="dateConducted" value="<?php echo $value['dateConducted']; ?>">
                      </div>

                      <div class="form-group">
                        <label>VALID UNTIL:</label>
                        <input class="form-control right" placeholder="DD-MM-YY" type="date" name="validity" value="<?php echo $value['validity']; ?>">
                      </div>
                      
                      <div class="form-group">
                        <label>AVERAGE/RATING:</label>
                        <input class="form-control right" name="averageRating" value="<?php echo $value['aveRate']; ?>">  
                      </div>
                        
                      <div class="form-group">
                        <label>REMARKS:</label>
                        <select class="form-control right" id="remarks" name="remarks">
                        <option value="" <?php if($value['remark']==='') echo 'selected="selected"'; ?>></option>
                        <option value="Medical" <?php if($value['remark']==='Medical') echo 'selected="selected"'; ?>>Medical</option>
                        <option value="Mission" <?php if($value['remark']==='Mission') echo 'selected="selected"'; ?>>Mission</option>
                        <option value="Disqualified" <?php if($value['remark']==='Disqualified') echo 'selected="selected"'; ?>>Disqualified</option>
                        <option value="Leave" <?php if($value['remark']==='Leave') echo 'selected="selected"'; ?>>Leave</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>TYPES OF TESTING:</label>
                        <select class="form-control right" id="testingType" name="testingType">
                          <option value="" <?php if($value['testType']==='') echo 'selected="selected"'; ?>></option>
                          <option value="Regular" <?php if($value['testType']==='Regular') echo 'selected="selected"'; ?>>Regular</option>
                          <option value="1st Remedial" <?php if($value['testType']==='1st Remedial') echo 'selected="selected"'; ?>>1st Remedial</option>
                          <option value="Final Remedial" <?php if($value['testType']==='Final Remedial') echo 'selected="selected"'; ?>>Final Remedial</option>
                          <option value="Alternative" <?php if($value['testType']==='Alternative') echo 'selected="selected"'; ?>>Alternative</option>
                        </select>
                      </div>  
                    
                      <div class="form-group">
                        <label>STATUS:</label>
                        <select class="form-control right" id="genstatus" name="genstatus">
                          <option value="" <?php if($value['genStat']==='') echo 'selected="selected"'; ?>> </option>
                          <option value="PASSED" <?php if($value['genStat']==='PASSED') echo 'selected="selected"'; ?>>PASSED</option>
                          <option value="FAILED" <?php if($value['genStat']==='FAILED') echo 'selected="selected"'; ?>>FAILED</option>
                        </select>
                      </div>

                  <div class="form-inline col-xs-10" style="padding-top: 20px; padding-bottom: 50px; text-align: right">

                    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"> Save</i></button>
                    <input type="hidden" name="id" value="<?php echo $serial_no ?>"> 
                    <button type="button" class="btn btn-lg btn-danger" onClick="parent.location='profile.php?id=<?php echo $serial_no?>&tab=4'"><i class="fa fa-times"> Cancel</i></button><br><br>
                  </div>
                      </form>
                </div><!--/fourth Quarter-->

              </div> <!-- end of clearfix -->

              <br>


          </div>
        </div>
      </div>
<!-- </div> -->

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