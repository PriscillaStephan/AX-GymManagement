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
        body {
            background: #1db198;
        }

        section.pricing {
            background: #1db198;
            margin: 10px;
            margin-top: 60px;

        }

        .pricing .card {
            border: none;
            border-radius: 1rem;
            transition: all 0.2s;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }

        .pricing hr {
            margin: 1.5rem 0;
        }

        .pricing .card-title {
            margin: 0.5rem 0;
            font-size: 0.9rem;
            letter-spacing: .1rem;
            font-weight: bold;
        }

        .pricing .card-price {
            font-size: 3rem;
            margin: 0;
        }

        .pricing .card-price .period {
            font-size: 0.8rem;
        }

        .pricing ul li {
            margin-bottom: 1rem;
        }

        .pricing .text-muted {
            opacity: 0.7;
        }

        .pricing .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            opacity: 0.7;
            transition: all 0.2s;
        }

        /* Hover Effects on Card */

        @media (min-width: 992px) {
            .pricing .card:hover {
                margin-top: -.25rem;
                margin-bottom: .25rem;
                box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
            }

            .pricing .card:hover .btn {
                opacity: 1;
            }
        }
    </style>

</head>

<body id="page-top" class="fixed-nav">
    <?php include 'navigations/NavigationBar.php'; ?>
    <div id="wrapper">
        <div id="content-wrapper">


            <section class="pricing py-5">
                <div class="container">
                    <div class="row">
                        <!-- Free Tier -->
                        <div class="col-lg-4">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-body">
                                    <h5 class="card-title text-muted text-uppercase text-center">1 Month</h5>
                                    <h6 class="card-price text-center">$50<span class="period">/month</span></h6>
                                    <hr>
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User Access</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>1 Class </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>1 Activity</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Wifi</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Events Access</li>
                                    </ul>
                                    <a href="payment.php" class="btn btn-block btn-primary text-uppercase">Continue</a>
                                </div>
                            </div>
                        </div>
                        <!-- Plus Tier -->
                        <div class="col-lg-4">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-body">
                                    <h5 class="card-title text-muted text-uppercase text-center">6 Months</h5>
                                    <h6 class="card-price text-center">$200<span class="period">/month</span></h6>
                                    <hr>
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User Access</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>5 Classes </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>10 Activities</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Wifi</li>
                                        <li> <span class="fa-li"><i class="fas fa-check"></i></span>Events Access</li>
                                    </ul>
                                    <a href="payment.php" class="btn btn-block btn-primary text-uppercase">Continue</a>
                                </div>
                            </div>
                        </div>
                        <!-- Pro Tier -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-muted text-uppercase text-center">Yearly Membership</h5>
                                    <h6 class="card-price text-center">$490<span class="period">/month</span></h6>
                                    <hr>
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User (Guests allowed)</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Classes </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Activities</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Wifi</li>
                                        <li> <span class="fa-li"><i class="fas fa-check"></i></span>Events Access</li>
                                    </ul>
                                    <a href="payment.php" class="btn btn-block btn-primary text-uppercase">Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>
    </div>
</body>

</html>