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
        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        .ful {
            width: 100%;
            float: left;
        }

        .half {
            width: 50%;
        }

        .fourth {
            width: 24.90%;
            border-right: 1px solid #cdcdcd;
            padding-bottom: 10px;
            flex: 1;
        }

        .fourth:last-child {
            border-right: 0px;
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        .center_block {
            margin: 0px auto;
            display: table;
        }

        .hide {
            display: none;
        }

        .center_text {
            text-align: center;
        }

        .relative {
            position: relative;
        }

        .container {
            width: 80%;
            margin-top: 50px;
            border-radius: 10px;
        }

        .max {
            border: 1px solid #AAA;
            border-radius: 0px 0px 10px 10px;
            overflow: hidden;
            position: relative;
            display: flex;
        }

        .container_head {
            background-color: #1db198;
            color: #fff;
            font-size: 28px;
            padding: 10px 1px;
            border-bottom: 1px solid #fff;
            border-radius: 10px 10px 0px 0px;
        }

        .column>div.list_head {
            color: #fff;
            padding: 8px 0px;
            font-size: 18px;
        }

        .all_col>div.list_head {
            background-color: #ffc107;
            border-right: 1px solid #BDA167;
        }

        .to_do_col>div.list_head {
            background-color: #dc3545;
            border-left: 1px solid #EACBB9;
            border-right: 1px solid #421C07;
        }

        .progress_col>div.list_head {
            background-color: #0275d8;
            border-left: 1px solid #B7B6D9;
            border-right: 1px solid #0A2742;
        }

        .complet_col>div.list_head {
            background-color: #27a243;
            border-left: 1px solid #AABEB3;
        }

        .task-unit,
        .create_task_box {
            margin: 10px 4% 0px;
            border: 1px solid #aaa;
            width: 80%;
            padding: 7px 15px 10px;
            border-radius: 5px;
            overflow: hidden;
        }

        .action_bar>.edit.right {
            margin-right: 10px;
            text-decoration: none;
            color: #90CAF9;
        }

        .action_bar>.remove {
            color: #90CAF9;
            text-decoration: none;
            margin-right: 1px;

        }

        .task-unit:hover .remove {
            display: block;
        }

        .action_bar .time {
            left: 0px;
            top: 0px;
            color: #90CAF9;
            font-size: 13px;

        }

        .action_bar {
            padding-top: 10px;
            border-top: 1px dashed #cdcdcd;
            margin-top: 5px;
        }

        .info>#task-discription {
            padding: 5px;
            font-size: 13px;
        }

        .info>#TaskHeading {
            font-weight: 600;
            color: #666;
        }

        #task-discription,
        #TaskHeading {
            border: none;
            border-bottom: 1px solid #666;
        }

        #task-discription.readonly,
        #TaskHeading.readonly {
            border: none !important;
            box-shadow: none !important;
        }

        .add_task_button {
            font-size: 14px;
            cursor: pointer;
            padding: 5px 9px;
            border-radius: 2px;
            background-color: #34A06E;
            color: #fff;
            box-shadow: 0px -2px 0px rgba(0, 0, 0, 0.3) inset;
        }

        .info .input_label {
            position: absolute;
            top: 2px;
            left: 10px;
            font-size: 13px;
            color: #666;
            padding: 3px;
            padding-top: 10px;
            webkit-transition: all ease-in-out 300ms;
            -moz-transition: all ease-in-out 300ms;
            -o-transition: all ease-in-out 300ms;
            transition: all ease-in-out 300ms;
        }

        .info input[type="text"],
        .info textarea {
            border: 1px solid #cdcdcd;
            padding: 10px 3px;
            width: 95%;
            padding-top: 40px;
            box-shadow: none !important;
        }

        .info textarea {
            resize: none;
        }

        input[type="text"]:focus~.titl {
            top: -9px;
            color: #36A7FA;

        }

        .info textarea:focus~.disc {
            top: -9px;
            color: #36A7FA;
        }

        input[type="text"]:valid~.titl,
        textarea:valid~.disc {
            top: -9px;
            color: #36A7FA;
        }

        .info>.info_val {
            margin: 10px 0px;
        }

        .progress {
            height: 3px;
            float: left;
            left: -20px;
            position: relative;
            bottom: -10px;
        }

        #todo .progress {
            background: #E27A3F;
            width: 60%;
        }

        #all .progress {
            background: #F6B939;
            width: 20%;
        }

        #progress .progress {
            background: #1A95BE;
            width: 90%;
        }

        #complete .task-unit {
            background: rgba(150, 220, 100, 0.8);
        }

        #complete .task-unit * {
            background-color: transparent;
        }

        #complete .action_bar {
            border-top: 1px dashed #67A13D;
        }

        #complete #TaskHeading {
            font-weight: normal;
            font-size: 16px;
            color: #fff;
        }

        #complete .time {
            color: #089143;
        }

        #complete .action_bar>.edit.right {
            color: #089143;
        }

        #complete .time,
        #complete #task-discription {
            color: color:#089143;
        }

        #complete .remove {
            color: #089143;
        }

        #complete .progress {
            background: #27AE61;
            width: 120%;
        }

        .rel.draged {
            position: relative;
            border: 1px dashed #0E43FB;
            opacity: 0.7;
        }

        .pillers .temp_box {
            border: 1px dashed #0E43FB;
            width: 80%;
            height: 100px;
            opacity: 0.7;
            padding: 7px 15px 10px;
            border-radius: 5px;
            margin: 10px 4% 0px;
            display: none;
            background: #cdcdcd;
        }

        .temp_head {
            border-bottom: 1px solid;
            padding-bottom: 5px;
        }

        .show {
            display: block;
        }

        .arrived.pillers .temp_box {
            display: block;
        }

        .done {
            color: #1A95BE;
        }
    </style>

</head>

<body id="page-top" class="fixed-nav">
    <?php include 'navigations/NavigationBar.php'; ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <!-- Icon Cards-->
                <div class="container" style="margin-top:80px;">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-comments"></i>
                                    </div>
                                    <div class="mr-5">New Messages!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="message.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-warning o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-list"></i>
                                    </div>
                                    <div class="mr-5">To Do List!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#to_do_list">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-success o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-calendar-check-o"></i>
                                    </div>
                                    <div class="mr-5"> Events </div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="event.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-danger o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-music"></i>
                                    </div>
                                    <div class="mr-5"> Music System </div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="https://musicwaveproject.000webhostapp.com/top.html" target="_blank">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- Area Chart Example-->
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-chart-area"></i>
                            Daily Subscription Chart
                        </div>
                        <div class="card-body">
                            <canvas id="myAreaChart" width="100%" height="30"></canvas>
                        </div>
                        <div class="card-footer small text-muted">Updated
                        </div>
                    </div>
                    <!-- Area Chart Example-->
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar"></i>
                                        Monthly Payments Bar Chart
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myBarChart" width="100%" height="50"></canvas>
                                    </div>
                                    <div class="card-footer small text-muted">Updated</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie"></i>
                                        Membership types Chart </div>
                                    <div class="card-body">
                                        <canvas id="myPieChart" width="100%" height="100"></canvas>
                                    </div>
                                    <div class="card-footer small text-muted">Updated</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!------------------------------To Do List----------------------------------------------------->
                <!-- main body -->
                <div id="to_do_list">
                    <div class="ful">
                        <div class="center_block container">

                            <!-- head -->
                            <div class="ful center_text container_head"> Weekly List</div>

                            <!-- Columns -->
                            <div class="ful max">
                                <div class="fourth column pillers left all_col" id="all">
                                    <div class="ful center_text list_head">Tasks</div>
                                    <div class="tasks ful"></div>
                                    <!-- 	Tamplate -->
                                    <div class="left dragable temp hide task-unit ">
                                        <div class="ful info">
                                            <input id="TaskHeading" type="text" class="readonly" readonly placeholder="Title">
                                            <textarea id="task-discription" readonly class="readonly" placeholder="Description"></textarea>
                                        </div>
                                        <div class="ful action_bar">
                                            <span class="time"><i class="icon-time"></i><span>&nbsp;</span></span>
                                            <a class="right remove" href="#" title="delete"><i class="icon-remove"></i> </a>
                                            <a class="right edit" href="#" title="edit"><i class="icon-edit"></i></a>
                                        </div>
                                        <div class="progress"></div>
                                    </div>

                                    <div class="left temp_box">
                                        <div class="ful center_text temp_head">Temp Box</div>
                                    </div>

                                    <!-- add new task -->
                                    <div class="left create_task_box">
                                        <div class="ful info">
                                            <p>Add New Task:</p>
                                            <div class="ful relative info_val">
                                                <input id="title" type="text" name="title" required>
                                                <label class="input_label titl" for="title">Title </label>
                                            </div>
                                            <div class="ful relative info_val">
                                                <textarea name="discription" id="discription" required></textarea>
                                                <label class="input_label disc" for="discription">Description</label>
                                            </div>

                                        </div>
                                        <div class="ful action_bar">
                                            <div class="right add_task_button">Add Task</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fourth column pillers left to_do_col" id="todo">
                                    <div class="ful center_text list_head">New Tasks</div>
                                    <div class="tasks ful"></div>
                                </div>

                                <div class="fourth column pillers left  progress_col" id="progress">
                                    <div class="ful center_text list_head">In Progress</div>
                                    <div class="tasks ful"></div>
                                </div>

                                <div class="fourth column pillers left complet_col" id="complete">
                                    <div class="ful center_text list_head">Completed Tasks</div>
                                    <div class="tasks ful"></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <!---------------------------------------------------------------------------------------->

            </div>
        </div>



        <!-- Demo scripts for this page-->
        <script src="js/demo/datatables-demo.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-bar-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

        <script>
            $(function() {
                function init() {
                    var mouseX = 0, // Mouse Position
                        mouseY = 0,

                        elmX = 0, // Element Position 
                        elmY = 0,

                        pillers = $('.pillers'), // Task Container
                        dragboxHeight,
                        pillerWidth = $('.pillers:nth-child(1)').width(), // Taks Container width
                        flag = true,
                        currentElm; // Current Element
                    dummy = $('.temp_box');

                    /* When Left Mouse Button is Pressed */
                    $('.max').on('mousedown', '.dragable', function(e) {
                        if ($(e.target).is('.icon-remove') || $(e.target).is('.icon-edit')) {
                            if ($(e.target).is('.icon-remove')) {
                                $(this).remove();
                            } else {
                                editThis($(this));
                            }
                        } else {
                            var temp;
                            $(this).addClass('rel');

                            mouseX = e.clientX; // Current Mouse Position and Store it to global variables
                            mouseY = e.clientY;
                            dragboxHeigth = $(this).outerHeight();
                            console.log(dragboxHeigth, "height");

                            temp = +($(this).css('left').slice(0, -2)); // Get Element Position and if it not a number then change it to 0
                            elmX = null || isNaN(temp) ? 0 : temp;

                            temp = +($(this).css('top').slice(0, -2));
                            elmY = null || isNaN(temp) ? 0 : temp;

                            $(this).css({
                                'z-index': '9999'
                            }); // Increase the Z-Index of the Element so that it wont be overlapped by other element.

                            currentElm = $(this); // set the current value so that it could be use by mouse move

                            /* Some Hack for not let heighlight the data(Copied from net)  */
                            document.body.focus();
                            document.onselectstart = function() {
                                return false;
                            };
                            $(this).ondragstart = function() {
                                return false;
                            };
                            return false;
                        }
                    }).mouseup('.dragable', function(e) { // This will be fired when Mouse Button release back
                        var top_pos = +($('.temp_box').offset().top) - 10;

                        if (currentElm !== null) {
                            currentElm.removeClass('rel').prependTo('.arrived .tasks').css({ // Resetting the Position Object
                                left: 0,
                                top: 0
                            });
                            $('.temp_box').hide();
                            // currentElm.css({'z-index' : '1'});  // Set Z-Index back to normal value.
                            currentElm = null; // Finally Set the Current Element to null so that it won't get dragged any more
                        } else return false;
                    }).mousemove('.dragable', function(e) { // Mouse Move Event .. This is the main part, It will reposition the element with mouse pointer
                        if (currentElm !== undefined && currentElm !== null) {
                            var posY = elmY + e.clientY - mouseY;
                            currentElm.addClass('draged').css({ // This sets the position of div element
                                left: (elmX + e.clientX - mouseX) + 'px',
                                top: (elmY + e.clientY - mouseY) + 'px'
                            });

                            /* Set Appropriate Class to Piller to Which The Element is going to be added */
                            if (e.clientX >= $('.pillers:nth-child(1)').offset().left && e.clientX < ($('.pillers:nth-child(1)').offset().left + pillerWidth) && e.clientY < $('.pillers:nth-child(1)').outerHeight()) {
                                $('.pillers:nth-child(1)').addClass('arrived').siblings('.pillers').removeClass('arrived');
                            } else if (e.clientX >= $('.pillers:nth-child(2)').offset().left && e.clientX < ($('.pillers:nth-child(2)').offset().left + pillerWidth) && e.clientY < $('.pillers:nth-child(2)').outerHeight()) {
                                $('.pillers:nth-child(2)').addClass('arrived').siblings('.pillers').removeClass('arrived');
                            } else if (e.clientX >= $('.pillers:nth-child(3)').offset().left && e.clientX < ($('.pillers:nth-child(3)').offset().left + pillerWidth) && e.clientY < $('.pillers:nth-child(3)').outerHeight()) {
                                $('.pillers:nth-child(3)').addClass('arrived').siblings('.pillers').removeClass('arrived');
                            } else if (e.clientX >= $('.pillers:nth-child(4)').offset().left && e.clientX < ($('.pillers:nth-child(4)').offset().left + pillerWidth) && e.clientY < $('.pillers:nth-child(4)').outerHeight()) {
                                $('.pillers:nth-child(4)').addClass('arrived').siblings('.pillers').removeClass('arrived');
                            }

                            // row drag set
                            dummy.appendTo('.arrived');
                            var boxNumber = +(e.clientY / dragboxHeigth);
                            boxNumber = Math.floor(boxNumber);
                            // console.log($('.arrived').find('.dragable:nth-child('+boxNumber+')'))
                            dummy.insertAfter($('.arrived').find('.dragable:nth-child(' + boxNumber + ')')).show();
                        }
                    });

                    $('body .arrived').on('click', '.remove', function(e) {
                        $(this).closest('.dragable').remove();
                    });

                    $('.add_task_button').on('click', function() {
                        var place = $(this).closest('.create_task_box'),
                            titl = place.find('input#title').val(),
                            disc = place.find('textarea#discription').val(),
                            time = new Date(),
                            format = time.toLocaleDateString();


                        if (titl || disc) {
                            var val = $('.temp').clone(true).removeClass('temp hide').insertBefore(place);
                            val.find('#TaskHeading').val(titl).end().find('#task-discription').text(disc).end().find('.time').append(format).css({
                                left: 0,
                                top: 0
                            });
                        }
                        $('input#title, textarea#discription').val('');
                    });

                    function editThis($ref) {
                        $ref = $ref.find('.edit');
                        $ref.on('mouseup', function(e) {
                            e.stopImmediatePropagation();
                            if (flag == true) {
                                $(this).addClass('done');
                                var task = $(this).closest('.dragable');
                                task.removeClass('dragable').find('input, textarea').removeAttr('readonly').removeClass('readonly');
                                flag = false;
                            } else {
                                $(this).removeClass('done');
                                $(this).closest('.task-unit').addClass('dragable').find('input, textarea').attr('readonly', 'readonly').addClass('readonly');
                                flag = true;
                            }
                        })
                    }

                }

                init();
            });
        </script>

</body>

</html>