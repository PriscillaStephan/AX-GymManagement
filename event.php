<?php
session_start();
include 'includes/dbConnection.php';
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
    <title>AX GYM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <?php include 'globalExternals/components.php'; ?>

    <style>
        .container {
            max-width: 1140px;
            padding-top: 100px;
        }

        .panel-primary>.panel-heading,
        .panel-footer {
            color: #fff;
            background-color: #1db198;
            border-color: #1db198;
        }


        .event-primary h2 {
            margin-top: 10px
        }

        .nopadding {
            padding: 0 !important
        }

        time {
            display: inline-block;
            width: 100%;
            color: rgb(255, 255, 255);

            padding: 5px;
            text-align: center;
            text-transform: uppercase;
        }

        time.pink {
            background-color: rgb(197, 44, 102);
        }

        time.purple {
            background-color: rgb(165, 82, 167)
        }

        time.dkblue {
            background-color: #336699;
        }

        time.blue_green {
            background-color: #148aa5
        }

        time.blue_violet {
            background-color: #3714a4
        }

        time.brown {
            background-color: #964B00
        }

        time.crimson {
            background-color: #a50516
        }

        time.deep_pink {
            background-color: #fb3c8f
        }

        time.forest_green {
            background-color: #1b4f15
        }

        time.fuchsia {
            background-color: #a51497
        }

        time.gray {
            background-color: #686868
        }

        time.green {
            background-color: #3aa03a
        }

        time.hotpink {
            background-color: #ff0080
        }

        time.lemon {
            background-color: #fee233
        }

        time.ligh_blue {
            background-color: #8bbdeb
        }

        time.light_red {
            background-color: #fc6a6c
        }

        time.lime {
            background-color: #c1fd33
        }

        time.lime_green {
            background-color: #2bfd2f
        }

        time.magenta {
            background-color: #fc1cad
        }

        time.maroon {
            background-color: #7f2b14
        }

        time.midnight {
            background-color: #000066
        }

        time.olive {
            background-color: #2b4726
        }

        time.orange {
            background-color: #fd7222
        }

        time.orange_red {
            background-color: #fc331c
        }

        time.orange_yellow {
            background-color: #ffcc00
        }

        time.peach {
            background-color: #FFE5B4
        }

        time.pink {
            background-color: #fc5ab8
        }

        time.purple {
            background-color: #af31f2
        }

        time.red {
            background-color: #fc0d1b
        }

        time.red_orange {
            background-color: #d7462c
        }

        time.salmon {
            background-color: #f69e94
        }

        time.tan {
            background-color: #f2ddbf
        }

        time.teal {
            background-color: #2b8a6d
        }

        time.violet {
            background-color: #6b28ce
        }

        time.violet_blue {
            background-color: #6041fa
        }

        time.white {
            background-color: #ffffff
        }

        time.yellow {
            background-color: #feee35
        }

        time.yellow_green {
            background-color: #defd35
        }

        time.yellow_orange {
            background-color: #fec42e
        }

        .time {
            background-color: rgb(165, 82, 167);
        }

        time>span {
            display: none;
        }

        time>.day {
            display: block;
            font-size: 4em;
            font-weight: 100;
            line-height: 1;
        }

        time>.month {
            display: block;
            font-size: 24pt;
            font-weight: 900;
            line-height: 1;
        }

        .nopadding {
            padding: 0 !important;
            margin: 0 !important;
        }

        .panel-primary>.panel-footer {
            color: #fff !important;
            background-color: #337ab7;
            border-color: #337ab7;
        }

        .panel-primary>.panel-footer p,
        .panel-primary a {
            color: #FFF
        }
    </style>


</head>

<body id="page-top" class="fixed-nav">
    <?php include 'navigations/NavigationBar.php'; ?>

    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">


                <section class="content">
                    <br>
                    <div class="col-md-12 box box-default">
                        <div class="box-header">
                            <section class="content-header">
                                <h1>
                                    <i class="fa fa-building"></i>
                                    Events
                                </h1>
                            </section>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-info" data-toggle="modal" style="float:right;" data-target="#myModal"><i class="fas fa-plus" style="color: white;"></i> Event</button>


                        <div class="container">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="panel panel-primary event-primary">
                                        <div class="panel-heading">
                                            <h2><a href="#">Marathon Event </a></h2>
                                        </div>
                                        <div class="panel-body nopadding">
                                            <img src="images/marathon.jpg" alt="event image" class="img-responsive" />
                                            <div class="row nopadding">
                                                <div class="col-sm-6 nopadding">
                                                    <time class="start green">
                                                        Start <span class="day">20</span>
                                                        <span class="month">Apr</span>
                                                        <span class="year">2016</span>
                                                    </time>
                                                </div>
                                                <div class="col-sm-6 nopadding">
                                                    <time class="end orange_red">
                                                        End <span class="day">20</span>
                                                        <span class="month">Apr</span>
                                                        <span class="year">2016</span>
                                                    </time>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer panel-primary" style="background-color: #1db198;">
                                            <p>Short description of event would go here.
                                            </p>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-4">
                                    <div class="panel panel-primary event-primary">
                                        <div class="panel-heading">
                                            <h2><a href="#">CrossFit Event </a></h2>
                                        </div>
                                        <div class="panel-body nopadding">
                                            <img src="images/CrossFit.png" alt="event image" class="img-responsive" />
                                            <div class="row nopadding">
                                                <div class="col-sm-6 nopadding">
                                                    <time class="start dkblue">
                                                        Start <span class="day">05</span>
                                                        <span class="month">May</span>
                                                        <span class="year">2017</span>
                                                    </time>
                                                </div>
                                                <div class="col-sm-6 nopadding">
                                                    <time class="end orange">
                                                        End <span class="day">05</span>
                                                        <span class="month">May</span>
                                                        <span class="year">2017</span>
                                                    </time>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer panel-primary" style="background-color: #1db198;">
                                            <p>Short description of event would go here.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="panel panel-primary event-primary">
                                        <div class="panel-heading">
                                            <h2>Hiking Event</h2>
                                        </div>
                                        <div class="panel-body nopadding">
                                            <img src="images/hiking.jpg" alt="event image" class="img-responsive" />
                                            <div class="row nopadding">
                                                <div class="col-sm-6 nopadding">
                                                    <time class="start green">
                                                        Start <span class="day">12</span>
                                                        <span class="month">June</span>
                                                        <span class="year">2019</span>
                                                    </time>
                                                </div>
                                                <div class="col-sm-6 nopadding">
                                                    <time class="end orange_red">
                                                        End <span class="day">16</span>
                                                        <span class="month">June</span>
                                                        <span class="year">2019</span>
                                                    </time>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer panel-primary" style="background-color: #1db198;">
                                            <p>Short description of event would go here.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="panel panel-primary event-primary" style="border-color: #1db198;">
                                <div class="panel-heading">
                                    <h2>Zumba Event</h2>
                                </div>
                                <div class="panel-body nopadding">
                                    <img src="images/Zumba.jpg" alt="event image" class="img-responsive" />
                                    <div class="row nopadding">
                                        <div class="col-sm-6 nopadding">
                                            <time class="start green">
                                                Start <span class="day">18</span>
                                                <span class="month">October</span>
                                                <span class="year">2019</span>
                                            </time>
                                        </div>
                                        <div class="col-sm-6 nopadding">
                                            <time class="end orange_red">
                                                End <span class="day">20</span>
                                                <span class="month">October</span>
                                                <span class="year">2019</span>
                                            </time>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer panel-primary" style="background-color: #1db198;">
                                    <p>Short description of event would go here.
                                    </p>
                                </div>
                            </div>
                        </div>




                    </div>
            </div>
        </div>
    </div>
    </div>



</body>

</html>