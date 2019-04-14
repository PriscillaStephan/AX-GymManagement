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

                            <!------------------------------------payments reports-------------------------------------->



                            <!-- Table with query to fill it -->
                            <?php $sql = 'SELECT pay_id,mop_name,sub_id,pay_amount,pay_date,date_created,created_by,last_modified,modified_by FROM payment';
                            $query = mysqli_query($con, $sql);
                            if (!$query) {
                                die('SQL Error:' . mysqli_error($con));
                            }
                            ?>

                            <!-- DataTables Example -->
                            <div class="card mb-3">
                                <div class="card-header"><i class="fas fa-table"></i> Payment List</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <!-- Table Column Header -->
                                                    <th class="sorting_desc">Invoice Number</th>
                                                    <th class="sorting_desc">Methode of Payment</th>
                                                    <th class="sorting_desc">Payment Amount</th>
                                                    <th class="sorting_desc">Payment Date</th>
                                                    <th class="sorting_desc">date_created</th>
                                                    <th class="sorting_desc">created_by</th>
                                                    <th class="sorting_desc">updated_date</th>
                                                    <th class="sorting_desc">modified_by</th>
                                                </tr>
                                            </thead>

                                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                                <tr>
                                                    <td><?php echo $row['pay_id']; ?></td>
                                                    <td><?php echo $row['mop_name']; ?></td>
                                                    <td><?php echo $row['pay_amount']; ?></td>
                                                    <td><?php echo $row['pay_date']; ?></td>
                                                    <td><?php echo $row['date_created']; ?></td>
                                                    <td><?php echo $row['created_by']; ?></td>
                                                    <td><?php echo $row['last_modified']; ?></td>
                                                    <td><?php echo $row['modified_by']; ?></td>
                                                </tr>
                                            <?php
                                        } ?>
                                        </table>
                                    </div>
                                </div>

                                <!-- Delete Query -->
                                <?php
                                if (isset($_GET['idd'])) {
                                    $idd = $_GET['idd'];
                                    $sql = "Delete from payment where pay_id='" . $idd . "'";
                                    if ($idd != '') {
                                        $query = mysqli_query($con, $sql);
                                        //header("Refresh:0; url=payment.php");
                                    }
                                }
                                ?>
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