<?php  
session_start();

if (!$_SESSION['user']) {
    header('Location: ../login.php');
        # code...
}
    
include('functions/DisplayAdmin.php');

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Change Password</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
    body{
        display: table;
        width: 100%;
        background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('../assets/img/login.jpg') no-repeat;
        background-position: center top;
        background-size: 100%;
    }
</style>
<body>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Change Password</h3>
                    </div>

                  <?php if (isset($_SESSION['failed_change'])): ?>
                    <div class="alert alert-danger">
                      <?php echo $_SESSION['failed_change']; ?>
                    </div>
                    <?php unset($_SESSION['failed_change']); ?>
                  <?php endif ?>

                  <?php if (isset($_SESSION['fail_change'])): ?>
                    <div class="alert alert-danger">
                      <?php echo $_SESSION['fail_change']; ?>
                    </div>
                    <?php unset($_SESSION['fail_change']); ?>
                  <?php endif ?>                  

                    <div class="panel-body">
                        <form role="form" action="../functions/ChangePw.php" method="POST">

            
                            <fieldset>
                                <?php 
                                foreach ($data as $key => $value) {
                                ?>
                                <div class="form-group">
                                <label>Username:</label>
                                    <input class="form-control" name="usernameN" type="usernameN" value="<?php echo $value['username']; ?>">
                                </div>
                                <div class="form-group">
                                <label>Password:</label>
                               <input class="form-control" placeholder="Current Password" name="passwordC" type="password" required="">
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <input class='form-control' placeholder="New Password" type="password" name="passwordN" required="" id="passwordN">
         
                                </div>
                                <div class="form-group">
                                        <input class='form-control' placeholder="Confirm Password" type="password" name="passwordR" required="" id="confirm_password">
                                </div>

                                <button class="btn btn-lg btn-success btn-block" type="Submit"><i class="fa fa-save"> Save</i></button>

                                <button type="button" class="btn btn-lg btn-primary btn-block" onClick="parent.location='index.php'"> <i class="fa fa-arrow-left"> Go Back</i></button>

                            </fieldset>
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

</body>

</html>
