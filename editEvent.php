<?php
    session_start();

    // If user is already logged
    if($_SESSION['displayname']) {
        $displayName = $_SESSION['displayname'];
    }

    // If user is not logged in
    else {

        // Navigate to homepage
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BMSCE Event Reporting</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Include Editor style. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

    <style>
        body {
            padding-top: 1rem;
        }

        .card {
            margin: 4px;
        }

        .slideshowLabel {
            color: white;
            background: #111111a8;
            display: inline;
            padding: 10px;
            border-radius: 5px;
        }

        .loginError {
            color: red;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>

<body>

    <!-- NAVIGATION -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">BMSCE Event Reporting</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
           </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clubs</a>
                    </li>

                    <!-- Initially hide both Login and Display Name -->

                    <!-- Login -->
                    <li class="nav-item" id="navBtnLogin" style="display:none">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>

                    <!-- Display Name with Logout Button -->
                    <li class="nav-item dropdown" id="navUser" style="display:none">
                        <a class="nav-link dropdown-toggle" href="#" id="navUserName" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Rahul Kumar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" onclick="logout();">Logout</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 80px; margin-bottom: 80px;">
        <form name="eventForm" id="eventForm">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="eventTitle">Event Title</label>
                    <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Enter event title">
                </div>
                <div class="form-group col-md-12">
                    <label for="eventVenue">Venue</label>
                    <input type="text" class="form-control" id="eventVenue" name="eventVenue" placeholder="Enter event venue">
                </div>
                <div class="form-group col-md-6">
                    <label for="eventFromDate">Date From</label>
                    <input type="text" class="form-control datepicker" id="eventFromDate" name="eventFromDate" >
                </div>
                <div class="form-group col-md-6">
                    <label for="eventToDate">Date To</label>
                    <input type="text" class="form-control datepicker" id="eventToDate" name="eventToDate" >
                </div>
                <div class="form-group col-md-6">
                    <label for="categorySelect">Category</label>
                    <select class="form-control" id="categorySelect" name="categorySelect">
                        <option value="Technical">Technical</option>
                        <option value="Administrative">Administrative</option>
                        <option value="Non Technical">Non Technical</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="clubNames">Select one or more club</label>
                    <select multiple class="form-control" id="clubNames" name="clubNames[]">
                        <option value="bmsce_ieee">BMSCE IEEE Student Branch</option>
                        <option value="pentagram">Pentagram</option>
                        <option value="protocol">Protocol</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="eventReport">Report</label>
                <textarea class="form-control" id="eventReport" name="eventReport"></textarea>
            </div>
        </form>
        <button class="btn btn-primary" onclick="addEvent();">Submit</button>

    </div>

    <!-- FOOTER -->

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Developed by Rahul Kumar for BMS College of Engineering</p>
        </div>
    </footer>

    <!-- JAVASCRIPT -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/froala_editor.pkgd.min.js"></script>

    <script src="js/common.js"></script>
    <script src="js/newEvent.js"></script>
    <!-- <script src="js/event.js"></script>
    <script src="js/clubs.js"></script> -->
    <!-- <script src="js/userManage.js"></script> -->
    <script>
        <?php

            // Already Logged In
            echo "showLoginUser('" . $displayName . "');";
            echo "hideLoginButton();";

        ?>
    </script>
</body>

</html>
