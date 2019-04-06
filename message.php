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


                <div class="content-wrapper" style="min-height: 1273px !important">
                    <script>
                        $(".body-overlay").css("display", "block");
                        $("body").css("overflow-y", "hidden");
                    </script>
                    <!-- <div class="message success" onclick="this.classList.add('hidden')">Success! Message Sent Successfully.</div>-->
                    <script>
                        $(document).ready(function() {
                            $(".hasdatepicker").datepicker({
                                rtl: true
                            });
                        });
                    </script>
                    <section class="content">
                        <br>
                        <div class="col-md-12 box box-default">
                            <div class="box-header">
                                <section class="content-header">
                                    <h1>
                                        <i class="fa fa-plus"></i>
                                        Compose Message
                                    </h1>
                                </section>
                            </div>
                            <hr>
                            <br>
                            <div class="box-body">
                                <div class="row mailbox-header">
                                    <div class="col-md-2">
                                        <a class="btn btn-flat btn-primary btn-block" href="#">Compose</a>
                                    </div>

                                </div>
                                <br>
                                <div class="col-md-2 no-padding-left">
                                    <ul class="list-unstyled mailbox-nav">
                                        <li>
                                            <a style="color:gray;"><i class="fa fa-inbox"></i>&nbsp;Inbox
                                                <span class="badge badge-primary pull-center">0</span></a></li>
                                        <li>
                                    </ul>
                                </div>
                                <div class="col-md-10 no-padding-left">
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#message_form').validationEngine();
                                        });
                                    </script>
                                    <div class="mailbox-content">
                                        <h2></h2>
                                        <form name="class_form" action="" method="post" class="form-horizontal" id="message_form">
                                            <input type="hidden" name="action" value="insert">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="to">Message To <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select name="receiver" class="form-control text-input">
                                                        <optgroup label="To">
                                                            <option value="member" selected="selected">Members</option>
                                                            <option value="staff_member">Staff </option>
                                                            <option value="accountant">Admin</option>
                                                        </optgroup>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="subject">Subject <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input id="subject" class="form-control validate[required] text-input" type="text" name="subject">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="subject">Message Comment <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <textarea name="message_body" id="message_body" class="form-control validate[required] text-input"></textarea>
                                                </div>
                                            </div>

                                        </form>
<br><br>

                                    </div>
                                </div>

                                <!-- END -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <div class="pull-right">
                                    <input type="submit" value="Send Message" name="save_message" class="btn btn-flat btn-success">
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