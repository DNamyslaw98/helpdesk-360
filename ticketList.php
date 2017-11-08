<?php
session_start();
//If user is not logged in, ask user to log in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> View Tickets </title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/glyphs/css/glyph.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <script src="js/data.js"></script>
    <script src="js/script.js"></script>
    <script src="js/ticketList.js"></script>
</head>
<body class="bg-light">
<nav class="navbar  navbar-expand-md navbar-dark bg-dark flex-sm-nowrap">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".collapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand nav-abs order-1" href="index.php">Helpdesk 360</a>
    <div class="navbar-collapse collapse order-3 order-md-1">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="ticketList.php">View Tickets</a>
            </li>
        </ul>
    </div>
    <div class="ml-auto order-2 order-md-3" style="white-space: nowrap">
        <a id="accountPopover" class="navbar-text nav-link nav-account" href="#" data-toggle="popover" title="Account" data-placement="bottom"> <?= $_SESSION['user'] ?> <i class="icon-user"></i></a>
    </div>
</nav>

<div class="container">
    <div class="row">
        <!--Open Tickets-->
        <div class="col-sm-12 col-md-6 pt-2" id="open-ticket-list" style="">

            <h4 class="text-center">Open Tickets</h4>
            <!--<button type="button" class="button" onclick="javascript:addTicket()">add</button>-->
            <!--All tickets below this line should be generated via js my looking at the db using this template-->
            <a href="exampleTicket.php" class="open-ticket-clickable">
                <div class="w-100 open-ticket-clickable">
                    <div class="d-flex ticket-header">
                        <h4 class="card-title">Ticket 1</h4>
                    </div>
                    <div class="ticket-body">
                        <p class="card-text">Ticket Description</p>

                        <!--Footer created using a table-->
                        <table class="w-100">
                            <tr>
                                <td>Date Created</td>
                                <td class="text-right">Unassigned / Specialist</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </a>
        </div>

        <!--Closed Tickets-->
        <div class="col-sm-12 col-md-6 pt-2" id="closed-ticket-list" style="">

            <h4 class="text-center">Closed Tickets</h4>
            <!--All tickets below this line should be generated via js my looking at the db using this template-->
            <a href="#" class="closed-ticket-clickable">
                <div class="w-100 closed-ticket-clickable">
                    <div class="d-flex ticket-header">
                        <h4 class="card-title">Ticket 1</h4>
                    </div>
                    <div class="ticket-body">
                        <p class="card-text">Ticket Description</p>
                        <!--Table footer-->
                        <table class="w-100">
                            <tr>
                                <td>Date Created</td>
                                <td class="text-right">Date Closed</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
</body>
</html>