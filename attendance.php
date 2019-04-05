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
                <div id="reports-container">


                    <div class="content-wrapper" style="min-height: 1273px !important">

                        <script>
                            $(".body-overlay").css("display", "block");
                            $("body").css("overflow-y", "hidden");
                        </script>
                        <script>
                            $(document).ready(function() {
                                $(".date").datepicker("option", "dateFormat", "MM d, yy", "setDate", new Date("March 26, 2019"));


                                $(".date").datepicker("setDate", "March 1, 2019");
                            });
                        </script>
                        <section class="content">
                            <br>
                            <div class="col-md-12 box box-default">
                                <div class="box-header">
                                    <section class="content-header">
                                        <h1>
                                            <i class="fa fa-plus"></i>
                                            Member Attendance <small>Attendance</small>
                                        </h1>
                                        <ol class="breadcrumb">
                                            <a href="/dasinfoau/php/gym/gym-attendance/staff-attendance" class="btn btn-flat btn-custom"><i class="fa fa-plus"></i> Staff Attendance</a>
                                        </ol>
                                    </section>
                                </div>
                                <hr>
                                <div class="box-body">
                                    <form method="post" class="validateForm">
                                        <input type="hidden" name="class_id" value="0">
                                        <div class="form-group col-md-3">
                                            <label class="control-label" for="curr_date">Date</label>
                                            <input id="curr_date" class="form-control validate[required] date" type="text" value="March 1, 2019" name="curr_date">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="class_id">Select Class</label>

                                            <select name="class_id" class="validation[required] form-control" required="required">
                                                <option value="">Select Class</option>
                                                <option value="1">Yoga Class</option>
                                                <option value="2" selected="selected">Aerobics Class</option>
                                                <option value="3">HIT Class</option>
                                                <option value="4">Cardio Class</option>
                                                <option value="5">Pilates</option>
                                                <option value="6">Zumba Class</option>
                                                <option value="7">Power Yoga Class</option>
                                                <option value="8">CrossFit M</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3 button-possition">
                                            <label for="subject_id"></label>
                                            <input type="submit" value="Take/View Attendance" name="attendence" class="btn btn-flat btn-success">
                                        </div>
                                    </form>
                                    <div class="clearfix"> </div>
                                    <hr>
                                    <!-- ###################################################################### -->
                                    <div class="clearfix"> </div>
                                    <div class="panel-body">
                                        <form method="post" class="form-horizontal">
                                            <input type="hidden" name="class_id" value="2">
                                            <input type="hidden" name="attendance_date" value="2019-03-01">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    Class : Aerobics Class ,
                                                    Date : March 1, 2019</h4>
                                            </div>
                                            <br><br>
                                            <div class="clearfix"> </div>
                                            <div class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="status" value="Present" checked="checked">Present</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="status" value="Absent">Absent<br>
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="70px">Status</th>
                                                            <th>Photo</th>
                                                            <th width="250px">Member Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td class="checkbox_field"><span><input type="checkbox" class="checkbox1" name="attendance[]" value="3"></span></td>
                                                            <td><img src="/dasinfoau/php/gym/webroot/upload/1515230374_154185.png" class='membership-img img-circle'></td>
                                                            <td><span>Alex Johnson(M30618)</span></td>
                                                            <td>Not Taken </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="submit" value="Save Attendance" name="save_attendance" class="btn btn-flat btn-success">
                                            </div>
                                        </form>
                                    </div>


                                    <!-- END -->
                                </div>
                                <div class='overlay gym-overlay'>
                                    <i class='fa fa-refresh fa-spin'></i>
                                </div>
                            </div>
                        </section>

                        <div class="modal fade gym-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg gym-modal">
                                <div class="modal-content">

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