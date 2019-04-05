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

    <script>
        $(document).ready(function() {
            $(".validateForm").validationEngine(); /* {binded:false} */
            $('.textarea').wysihtml5();
            $(".dataTable").dataTable({
                /* "language": {
                "url": "dataTables.german.lang"
				} */
            });



            $(".dob").datepicker({
                maxDate: new Date(),

                changeMonth: true,
                changeYear: true,
                yearRange: '-65:+0',
                dateFormat: "MM d, yy"
            });
            $(".dob").datepicker($.datepicker.regional['en']);

            $(".hasDatepicker,.datepick,.date,.mem_valid_from,.sell-date,.dob,.datepicker-days").datepicker({
                language: "en",
                changeMonth: true,
                changeYear: true,
                dateFormat: "MM d, yy"
            });
            $(".hasDatepicker,.datepick,.date,.mem_valid_from,.sell-date,.dob,.datepicker-days").datepicker($.datepicker.regional['en']);


            $(".hasDatepicker,.datepick,.date,.mem_valid_from,.sell-date,.dob,.datepicker-days,.mem_valid_to").on('keydown', function() {
                return false;
            });
        });
    </script>

</head>

<body id="page-top" class="fixed-nav">

    <?php include 'navigations/NavigationBar.php'; ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
                <script type="text/javascript">
                    $(document).ready(function() {
                        //$(".content-wrapper").css("min-height","1550px");
                    });
                </script>
                <section class="content">

                    <div class="col-md-12 box box-default">
                        <div class="box-header">
                            <section class="content-header">
                                <h1> <i class="fa fa-key"></i> Access Right Settings </h1>
                            </section>
                        </div>
                        <hr>
                        <div class="box-body">
                            <form name="student_form" action="" method="post" class="form-horizontal" id="access_right_form">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-xs-3 ">Menu</div>
                                    <div class="col-md-2 col-sm-3 col-xs-3 text-center">Admin</div>
                                    <div class="col-md-2 col-sm-3 col-xs-3 text-center">Staff</div>
                                    <div class="col-md-2 col-sm-3 col-xs-3 text-center">Member</div>

                                </div>
                                <hr>
                                <div class="access_right_menucroll">
                                    <div class="row">

                                        <div class="col-md-2 col-sm-3 col-xs-5 ">
                                            <span class="menu-label">
                                                Staff </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="member_staff_member" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="staff_member_staff_member" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="accountant_staff_member" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <!--------Membership------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Membership Type </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="member_membership" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="staff_member_membership" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" name="accountant_membership" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <!--------Member------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Member </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="member_member" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="staff_member_member" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="accountant_member" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <!--------Class Schedule------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Class Schedule </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="member_class-schedule" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="staff_member_class-schedule" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" name="accountant_class-schedule" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <!--------Attendence------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Attendence </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" name="member_attendence" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="staff_member_attendence" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" name="accountant_attendence" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <!--------Payment------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Fee Payment </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="member_membership_payment" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" name="staff_member_membership_payment" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="accountant_membership_payment" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <!--------Income------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Income </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" disabled value="1" name="member_income" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" name="staff_member_income" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="accountant_income" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!--------Message------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Message </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="member_message" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="staff_member_message" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="accountant_message" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <!--------Notice------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Notice </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="member_notice" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="staff_member_notice" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="accountant_notice" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <!--------Report------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Report </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" name="member_report" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="staff_member_report" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="accountant_report" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <!--------Event------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Event </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="member_reservation" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="staff_member_reservation" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" checked name="accountant_reservation" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <!--------Music System------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Music System </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="member_reservation" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="staff_member_reservation" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" checked name="accountant_reservation" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <!--------Subscription History------------->
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5">
                                            <span class="menu-label">
                                                Subscription History </span>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" checked value="1" name="member_subscription_history" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" name="staff_member_subscription_history" readonly="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-3 col-xs-2">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" value="1" name="accountant_subscription_history" readonly="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                            </form>
                            <!-- END -->
                        </div>

                    </div>
                </section>
            </div>

            <br><br><br>
            <div class="control-sidebar-bg">
                <div class="col-sm-offset-2 col-sm-8 row_bottom">
                    <input type="submit" value="Save Changes" name="save_access_right" style="float:right;" class="btn btn-flat btn-success">
                </div>
            </div>
        </div>
        <script>

        </script>



    </div>
    </div>
    </div>
</body>

</html>