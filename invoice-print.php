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
        @page {
            bleed: 1cm;
            size: A4 portrait;
            size: auto;
            /* auto is the initial value */
            margin-bottom: 50pt;
            margin-top: 0cm;
            font-size: 12pt;

            #content,
            #page {
                width: 100%;
                margin: 0;
                float: none;
            }
        }


        @media print {
            .page {
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }

            table {
                page-break-inside: auto;
            }

            tr.last-row {
                background-color: #555 !important;
            }

            tr.last-row>th,
            tr.last-row>td {
                background-color: unset !important;
            }

            div.page-break {
                page-break-before: auto;
            }
        }

        .gray {
            color: #333;
        }

        .gray-ish {
            color: #666;
        }

        .almost-gray {
            color: #999;
        }

        body {
            background-color: #1DB198;
            padding-top: 25px;
            -webkit-print-color-adjust: exact !important;
            height: 100%;
            margin-top: 40px;
        }

        div.container {
            background-color: white;
            border-radius: 10px;
            height: 100%;
            position: relative;
            margin-top: 50px;
        }

        div.invoice-header {
            background-color: #444;
            color: white;
            border-bottom: 3px solid rgb(255, 77, 77);
        }

        div.invoice-header>div>p {
            font-size: 1.2rem;
            font-weight: 350;
        }

        div.invoice-header>div>h1 {
            font-size: 4rem;
        }

        div.invoice-table {
            border-top: 3px solid rgb(255, 77, 77);
        }

        div.invoice-table>table.table>thead,
        div.invoice-table>table.table>thead.thead>tr,
        div.invoice-table>table.table>thead.thead>tr>th {
            border-top: none;
        }

        div.total-field {
            position: relative;
        }

        h5.due-date {
            position: absolute;
            bottom: 10px;
            right: 15px;
        }

        div.sub-table {
            border-left: 3px solid rgb(255, 77, 77);
            padding-left: 0;
        }

        div.sub-table>table {
            padding-bottom: 0;
            margin-bottom: 0;
        }

        tr.last-row {
            margin-top: 25px;
            background-color: #555;
            color: white;
            border-top: 3px solid rgb(255, 77, 77);
        }

        p.footer {
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding-top: 15px;
            border-top: 3px solid red;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body id="page-top" class="fixed-nav">

    <!--insert loding spinner -->


    <div class="container">
        <h2>Printing Spinners</h2>

        <div class="spinner-grow text-muted"></div>
        <div class="spinner-grow text-primary"></div>
        <div class="spinner-grow text-success"></div>
        <div class="spinner-grow text-info"></div>
        <div class="spinner-grow text-warning"></div>
        <div class="spinner-grow text-danger"></div>
        <div class="spinner-grow text-secondary"></div>
        <div class="spinner-grow text-dark"></div>
        <div class="spinner-grow text-light"></div>
    </div>

</body>

</html>