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


    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/timegrid/main.css' rel='stylesheet'>
    <link href='fullcalendar/list/main.css' rel='stylesheet'>

    <script src='fullcalendar/core/main.js'></script>
    <script src='fullcalendar/daygrid/main.js'></script>
    <script src='fullcalendar/timegrid/main.js'></script>
    <script src='fullcalendar/list/main.js'></script>
    <script src='fullcalendar/interaction/main.js'></script>
    <script src='fullcalendar/php/get-events.php'></script>
    <script src='fullcalendar/php/utils.php'></script>
    <script src='fullcalendar/json/events.json'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'timeGrid', 'list', 'interaction']
            });

            calendar.render();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendarInteraction.Draggable

            /* initialize the external events
            -----------------------------------------------------------------*/

            var containerEl = document.getElementById('external-events-list');
            new Draggable(containerEl, {
                itemSelector: '.fc-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText.trim()
                    }
                }
            });

            //// the individual way to do it
            // var containerEl = document.getElementById('external-events-list');
            // var eventEls = Array.prototype.slice.call(
            //   containerEl.querySelectorAll('.fc-event')
            // );
            // eventEls.forEach(function(eventEl) {
            //   new Draggable(eventEl, {
            //     eventData: {
            //       title: eventEl.innerText.trim(),
            //     }
            //   });
            // });

            /* initialize the calendar
            -----------------------------------------------------------------*/

            var calendarEl = document.getElementById('calendar');
            var calendar = new Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function(arg) {
                    // is the "remove after drop" checkbox checked?
                    if (document.getElementById('drop-remove').checked) {
                        // if so, remove the element from the "Draggable Events" list
                        arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                    }
                }
            });
            calendar.render();

        });
    </script>
    <style>
        body {
            margin-top: 40px;
            font-size: 14px;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        }

        #wrap {
            width: 1100px;
            margin: 0 auto;
        }

        #external-events {
            float: left;
            width: 150px;
            padding: 0 10px;
            border: 1px solid #ccc;
            background: #eee;
            text-align: left;
        }

        #external-events h4 {
            font-size: 16px;
            margin-top: 0;
            padding-top: 1em;
        }

        #external-events .fc-event {
            margin: 10px 0;
            cursor: pointer;
        }

        #external-events p {
            margin: 1.5em 0;
            font-size: 11px;
            color: #666;
        }

        #external-events p input {
            margin: 0;
            vertical-align: middle;
        }

        #calendar {
            float: right;
            width: 900px;
        }
    </style>


</head>

<body id="page-top" class="fixed-nav">

    <?php include 'navigations/NavigationBar.php'; ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">

                <section class="content">
                    <h1>
                        <i class="fa fa-plus"></i>
                        Member Attendance <small>Attendance</small>
                    </h1>
                    <hr>
                </section>


                <div id='wrap'>
                    <br><br><br><br>
                    <div id='external-events'>
                        <h4>Draggable Events</h4>

                        <div id='external-events-list'>
                            <div class='fc-event'>My Event 1</div>
                            <div class='fc-event'>My Event 2</div>
                            <div class='fc-event'>My Event 3</div>
                            <div class='fc-event'>My Event 4</div>
                            <div class='fc-event'>My Event 5</div>
                        </div>

                        <p>
                            <input type='checkbox' id='drop-remove' />
                            <label for='drop-remove'>remove after drop</label>
                        </p>
                    </div>

                    <div id='calendar'></div>

                    <div style='clear:both'></div>

                </div>

            </div>
        </div>
    </div>


</body>

</html> 