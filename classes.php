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
                        <div class="body-overlay">
                            <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                        </div>
                        <script>
                            $(".body-overlay").css("display", "block");
                            $("body").css("overflow-y", "hidden");
                        </script>
                        <script>
                            $(document).ready(function() {
                                $(".mydataTable").DataTable({
                                    "responsive": true,
                                    "order": [
                                        [1, "asc"]
                                    ],
                                    "language": {
                                        "sEmptyTable": "No data available in table",
                                        "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
                                        "sInfoEmpty": "Showing 0 to 0 of 0 entries",
                                        "sInfoFiltered": "(filtered from _MAX_ total entries)",
                                        "sInfoPostFix": "",
                                        "sInfoThousands": ",",
                                        "sLengthMenu": "Show _MENU_ entries",
                                        "sLoadingRecords": "Loading...",
                                        "sProcessing": "Processing...",
                                        "sSearch": "Search:",
                                        "sZeroRecords": "No matching records found",
                                        "oPaginate": {
                                            "sFirst": "First",
                                            "sLast": "Last",
                                            "sNext": "Next",
                                            "sPrevious": "Previous"
                                        },
                                        "oAria": {
                                            "sSortAscending": ": activate to sort column ascending",
                                            "sSortDescending": ": activate to sort column descending"
                                        }
                                    }
                                });
                            });
                        </script>
                        <script>
                            $(document).ready(function() {
                                var table = $(".mydataTable").DataTable();
                            });
                        </script>

                        <section class="content">
                            <br>
                            <div class="col-md-12 box box-default">
                                <div class="box-header">
                                    <section class="content-header">
                                        <h1>
                                            <i class="fa fa-bars"></i>
                                            Class List <small>Class Schedule</small>
                                        </h1>
                                        <ol class="breadcrumb">
                                            <a href="calendar.php" class="btn btn-flat btn-custom"><i class="fa fa-calendar"></i> Class Schedules</a>
                                            &nbsp;
                                            <a href="/dasinfoau/php/gym/class-schedule/add-class" class="btn btn-flat btn-custom"><i class="fa fa-plus"></i> Add Class Schedule</a>
                                        </ol>
                                    </section>
                                </div>
                                <hr>
                                <div class="box-body">
                                    <table class="mydataTable table table-striped" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Staff Name</th>
                                                <th>Starting Time</th>
                                                <th>Ending Time</th>
                                                <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Yoga Class</td>
                                                <td>Sergio Romero</td>
                                                <td>8:00:AM</td>
                                                <td>10:00:AM</td>
                                                <td>At Gym Facility</td>
                                                <td>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/editClass/1' title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/deleteClass/1' title='Delete' class='btn btn-flat btn-danger' onClick="return confirm('Are you sure,You want to delete this record?');"><i class='fa fa-trash-o'></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Aerobics Class</td>
                                                <td>Sergio Romero</td>
                                                <td>5:15:PM</td>
                                                <td>6:15:PM</td>
                                                <td>Class 1</td>
                                                <td>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/editClass/2' title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/deleteClass/2' title='Delete' class='btn btn-flat btn-danger' onClick="return confirm('Are you sure,You want to delete this record?');"><i class='fa fa-trash-o'></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>HIT Class</td>
                                                <td>Sergio Romero</td>
                                                <td>7:30:PM</td>
                                                <td>8:45:PM</td>
                                                <td>Old location</td>
                                                <td>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/editClass/3' title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/deleteClass/3' title='Delete' class='btn btn-flat btn-danger' onClick="return confirm('Are you sure,You want to delete this record?');"><i class='fa fa-trash-o'></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Cardio Class</td>
                                                <td>Sergio Romero</td>
                                                <td>3:30:PM</td>
                                                <td>4:30:PM</td>
                                                <td>At Gym Facility</td>
                                                <td>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/editClass/4' title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/deleteClass/4' title='Delete' class='btn btn-flat btn-danger' onClick="return confirm('Are you sure,You want to delete this record?');"><i class='fa fa-trash-o'></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pilates</td>
                                                <td>Sergio Romero</td>
                                                <td>12:00:PM</td>
                                                <td>3:15:PM</td>
                                                <td>Old location</td>
                                                <td>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/editClass/5' title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/deleteClass/5' title='Delete' class='btn btn-flat btn-danger' onClick="return confirm('Are you sure,You want to delete this record?');"><i class='fa fa-trash-o'></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Zumba Class</td>
                                                <td>Sergio Romero</td>
                                                <td>8:30:PM</td>
                                                <td>10:30:PM</td>
                                                <td>New Location</td>
                                                <td>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/editClass/6' title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/deleteClass/6' title='Delete' class='btn btn-flat btn-danger' onClick="return confirm('Are you sure,You want to delete this record?');"><i class='fa fa-trash-o'></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Power Yoga Class</td>
                                                <td>Sergio Romero</td>
                                                <td>9:15:AM</td>
                                                <td>11:45:AM</td>
                                                <td>New Location</td>
                                                <td>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/editClass/7' title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/deleteClass/7' title='Delete' class='btn btn-flat btn-danger' onClick="return confirm('Are you sure,You want to delete this record?');"><i class='fa fa-trash-o'></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>CrossFit M</td>
                                                <td>Sergio Romero</td>
                                                <td>8:30</td>
                                                <td>9:30</td>
                                                <td>CrossFit M</td>
                                                <td>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/editClass/8' title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                                                    <a href='/dasinfoau/php/gym/ClassSchedule/deleteClass/8' title='Delete' class='btn btn-flat btn-danger' onClick="return confirm('Are you sure,You want to delete this record?');"><i class='fa fa-trash-o'></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Staff Name</th>
                                                <th>Starting Time</th>
                                                <th>Ending Time</th>
                                                <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="overlay gym-overlay">
                                    <i class="fa fa-refresh fa-spin"></i>
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