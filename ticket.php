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
    <title> Example Ticket - Helpdesk 360 </title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/glyphs/css/glyph.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <script src="js/data.js"></script>
    <script src="js/script.js"></script>
    <script src="js/ticket.js"></script>
</head>
<body>
<!-----------------------Header----------------------------->
<nav class="navbar  navbar-expand-md navbar-dark bg-dark flex-sm-nowrap">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".collapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand nav-abs order-1" href="index.php"><img src="img/helpdesk-logo.png" alt="Helpdesk-360 Logo" height="33px"></a>
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

<!-----------------------Content----------------------------->
<div class="container mb-5 mt-3">
    <a class="no-hover-underline" href="javascript:history.back()"><i class="icon icon-left-open-big"></i>Back</a>
    <h1 class="display-4 text-center">Ticket #<span class="auto-fill" data-autofill="ticketNumber"></span></h1>
    <div class="container text-center" id="badge-list">
    </div>

    <hr>

    <h3>Employee Details</h3>
    <h6>John Doe</h6>
    <h6>07123 123456</h6>

    <hr>

    <div class="d-flex mb-3">
        <h3>Ticket Details</h3>
        <a class="ml-auto no-hover-underline" href="#">Edit <i class="icon icon-pencil"></i> </a>
    </div>
    <dl class="row">
        <dt class="col-4 col-md-3 text-right">Created</dt>
        <dd class="col-8 col-md-9 auto-fill" data-autofill="dateCreated" id="">20/10/2017 12:48 (6 days)</dd>

        <dt class="col-4 col-md-3 text-right">Last Modified</dt>
        <dd class="col-8 col-md-9" id="last-modified">21/10/2017 15:35 (not yet coded)</dd>

        <dt class="col-4 col-md-3 text-right">Problem Type</dt>
        <dd class="col-8 col-md-9 auto-fill" data-autofill="problemTypeID" id="">Printer Issues</dd>

        <dt class="col-4 col-md-3 text-right">Original Description</dt>
        <dd class="col-8 col-md-9 auto-fill" data-autofill="originalDescription" id="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam deserunt error est hic in, nihil perspiciatis provident quasi qui quis quod recusandae sequi suscipit voluptates. Eveniet nisi recusandae voluptatem!</dd>

        <dt class="col-4 col-md-3 text-right">Serial Number</dt>
        <dd class="col-8 col-md-9 auto-fill" data-autofill="serialNumber" id="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam deserunt error est hic in, nihil perspiciatis provident quasi qui quis quod recusandae sequi suscipit voluptates. Eveniet nisi recusandae voluptatem!</dd>

        <dt class="col-4 col-md-3 text-right">Unique Identifier</dt>
        <dd class="col-8 col-md-9" id="">6372593</dd>

        <dt class="col-4 col-md-3 text-right">Software Licence Number</dt>
        <dd class="col-8 col-md-9 auto-fill" data-autofill="softwareLicenceNumber" id="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam deserunt error est hic in, nihil perspiciatis provident quasi qui quis quod recusandae sequi suscipit voluptates. Eveniet nisi recusandae voluptatem!</dd>

        <dt class="col-4 col-md-3 text-right">Operating System</dt>
        <dd class="col-8 col-md-9 auto-fill" data-autofill="operatingSystem" id="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam deserunt error est hic in, nihil perspiciatis provident quasi qui quis quod recusandae sequi suscipit voluptates. Eveniet nisi recusandae voluptatem!</dd>
    </dl>

    <h6 class="auto-fill" data-autofill="specialistID">Not Assigned to a Specialist</h6>

    <hr>

    <h3>Notes</h3>
    <!--Display each note in a seperate list item, grouped together
    When a item is clicked, show a modal to allow editing of the note-->
    <div class="list-group" id="note-list">
        <!--These Notes are now auto generated by the js code-->
        <!--Template:-->
        <!--<button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#notesModal" data-note-id="0">-->
        <!--<small>19/09/2018 06:10</small><br>-->
        <!--<span>some notes</span>-->
        <!--</button>-->
    </div>

    <hr>
</div>

<!--Notes modal-->
<div class="modal fade" id="notesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-between">
                <h3 class="my-0">Edit Note</h3>
                <small>Created On: 11/11/2011</small>
            </div>
            <div class="modal-body">
                <textarea name="note" id="modalNoteText" class="col-12 border border-secondary rounded my-0" placeholder="Notes"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="saveNote">Save</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>