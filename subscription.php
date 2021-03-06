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
                                    <i class="fa fa-file-text"></i>
                                    Subscripiton
                                </h1>
                            </section>
                        </div>
                        <hr>

                        <div class="container" id="member-registration-container">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"> <i class="fas fa-plus" style="color: white;"></i> Subscription</button>
                            <br> <br> <br>

                            <!-- Table with query to fill it -->
                            <?php $sql = 'SELECT sd_id,sub_id,member_id,member_name,ms_id,sc_id,sd_starting_date,sd_expiry_date,price,currency,discount,total FROM subscription_details';
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
                                                    <th class="sorting_desc">Action</th>
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


                                                    <td>
                                                        <a href="" style="color:blue;"><i class="fas fa-pen"></i></a>
                                                        <a href="subscription.php?idd=<?php echo $row['sd_id']; ?>" onclick="return confirm('Are you sure ?')" style="color:red;"><i class="fas fa-remove"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                        } ?>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Delete Query -->
                        <?php
                        if (isset($_GET['idd'])) {
                            $idd = $_GET['idd'];
                            $sql = "Delete from subscription_details where sd_id='" . $idd . "'";
                            if ($idd != '') {
                                $query = mysqli_query($con, $sql);
                                //  header("Refresh:0; url=subscription.php");
                            }
                        }
                        ?>
                    </div>
            </div>
        </div>

        <!-- session for add subscription button -->
        <?php if (isset($_SESSION["success"])) { ?>
            <div class="alert alert-success">
                <strong>Success!</strong>
                <?php echo $_SESSION["success"];
                session_unset(); ?>
            </div>
        <?php
    } ?>

        <?php if (isset($_SESSION["error"])) { ?>
            <div class="alert alert-danger">
                <strong>Alert! </strong> <?php echo $_SESSION["error"];
                                            session_unset(); ?>
            </div>
        <?php
    } ?>

        <!-- ADD Subscripiton -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="card card-register">
                        <div class="card-header">Add Subscription</div>
                        <div class="card-body">
                            <form method="post" action="includes/phpScripts.php">
                                <div class="form-group">
                                    <label>Member Name</label>
                                    <select name="member_name" class="form-control">
                                        <option disabled="disabled" selected="selected">Select Member Name</option>
                                        <?php
                                        $sql = mysqli_query($con, "SELECT m_first_name FROM member");
                                        while ($row = $sql->fetch_assoc()) {
                                            echo "<option value=\"owner1\">" . $row['m_first_name'] . "</option>";
                                        }
                                        ?>


                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Memebrship</label>
                                    <select name="membership_type" class="form-control">
                                        <option disabled="disabled" selected="selected">Select Membership</option>

                                        <?php
                                        $sql = mysqli_query($con, "SELECT concat(ms_name,'-', ms_price,'$') as name FROM membership");
                                        while ($row = $sql->fetch_assoc()) {
                                            echo "<option value=\"owner1\">" . $row['name'] . "</option>";
                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Starting Date</label>
                                    <input type="Date" name="starting-date" placeholder="Starting date" class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>

                                    <input type="text" name="txtMembershipPrice" placeholder="Price" class="form-control" required="required">


                                </div>
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" name="txtPriceDiscount" placeholder="Discount" class="form-control" required="required">
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-success btn-md" name="btnSaveSub" type="submit" style="float:right;">Save</button>

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>