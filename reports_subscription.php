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
            background-color: #1db198;
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
                                        <a href="reports.php" class="btn btn-flat btn-custom"><i class="fa fa-group"></i> Members Report</a>
                                        &nbsp;
                                        <a href="reports_staff.php" class="btn btn-flat btn-custom"><i class="fa fa-vcard"></i> Staff Status Report</a>
                                        &nbsp;
                                        <a href="reports_payment.php" class="btn btn-flat btn-custom"><i class="fa fa-money"></i> Payment Report</a>
                                        <a href="reports_subscription.php" class="btn btn-flat btn-custom"><i class="fa fa-line-chart"></i> Subsciption Report</a>
                                    </ol>
                                </section>
                            </div>
                            <hr>
                        </div>

                        <div id="reports-table">

                            <!------------------------------------subscriptions reports-------------------------------------->
                            <!-- Table with query to fill it -->
                            <?php $sql = 'SELECT sd_id,sub_id,member_id,member_name,ms_id,sc_id,sd_starting_date,sd_expiry_date,price,currency,discount,total,date_creted,created_by,updated_date,modified_by FROM subscription_details';
                            $query = mysqli_query($con, $sql);
                            if (!$query) {
                                die('SQL Error:' . mysqli_error($con));
                            }
                            ?>

                            <!-- DataTables Example -->
                            <div class="card mb-3">
                                <div class="card-header"><i class="fas fa-table"></i> Subscription List</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <!-- Table Column Header -->
                                                    <th class="sorting_desc">Member Id</th>
                                                    <th class="sorting_desc">Member Name</th>
                                                    <th class="sorting_desc">Membership</th>
                                                    <th class="sorting_desc">Starting Date</th>
                                                    <th class="sorting_desc">Expiry Date</th>
                                                    <th class="sorting_desc">Price</th>
                                                    <th class="sorting_desc">Currency</th>
                                                    <th class="sorting_desc">Discount</th>
                                                    <th class="sorting_desc">date_created</th>
                                                    <th class="sorting_desc">created_by</th>
                                                    <th class="sorting_desc">updated_date</th>
                                                    <th class="sorting_desc">modified_by</th>
                                                </tr>
                                            </thead>
                                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                                <tr>
                                                    <td><?php echo $row['member_id']; ?></td>
                                                    <td><?php echo $row['member_name']; ?></td>
                                                    <td><?php echo $row['ms_id']; ?></td>
                                                    <td><?php echo $row['sd_starting_date']; ?></td>
                                                    <td><?php echo $row['sd_expiry_date']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['currency']; ?></td>
                                                    <td><?php echo $row['discount']; ?></td>
                                                    <td><?php echo $row['total']; ?></td>
                                                    <td><?php echo $row['date_creted']; ?></td>
                                                    <td><?php echo $row['created_by']; ?></td>
                                                    <td><?php echo $row['updated_date']; ?></td>
                                                    <td><?php echo $row['modified_by']; ?></td>
                                                </tr>
                                            <?php
                                        } ?>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                </div>


                </section>
            </div>
        </div>
    </div>
    </div>
</body>

</html>