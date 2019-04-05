<?php 
session_start();
include 'includes/dbConnection.php';
// for expired session 
if (!$_SESSION["user_name_loggedIn_admin"]) {
    $_SESSION["expired_session"] = "Your session has been expired, relog in!";
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Admin - Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <?php include 'globalExternals/components.php'; ?>

    <style>
        .content-header>.breadcrumb {
            position: relative;
        }
    </style>
</head>

<body id="page-top" class="fixed-nav">
    <?php include 'navigations/NavigationBar.php'; ?>

    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
                <div id="reports-container">
                    <section class="content">
                        <br>
                        <div class="col-md-12 box box-default">
                            <div class="box-header box_payment">
                                <section class="content-header bread_payment">
                                    <h1>
                                        <i class="fa fa-bar-chart"></i>
                                        Reports
                                    </h1>
                                    <ol class="breadcrumb">
                                        <a href="#" class="btn btn-flat btn-custom" style="color:grey"><i class="fa fa-group" style="color:grey"></i> Members Report</a>
                                        &nbsp;
                                        <a href="#" class="btn btn-flat btn-custom" style="color:grey"><i class="fa fa-pie-chart" style="color:grey"></i> Membership Status Report</a>
                                        &nbsp;
                                        <a href="#" class="btn btn-flat btn-custom" style="color:grey"><i class="fa fa-money" style="color:grey"></i> Payment Report</a>
                                        <a href="#" class="btn btn-flat btn-custom" style="color:grey"><i class="fa fa-arrow-up" style="color:grey"></i> Subsciption Report</a>
                                    </ol>
                                </section>
                            </div>
                            <hr>



                        </div>
                    </section>
                </div>



                <div id="reports-table">


                </div>


            </div>
        </div>
    </div>



</body>

</html> 