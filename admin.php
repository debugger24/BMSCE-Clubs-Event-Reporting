<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BMSCE Event Reporting</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

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
            <a class="navbar-brand" href="index.php">BMSCE Event Reporting</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
           </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clubs</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="admin.php">Manage</a>
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

    <!-- EVENTS -->

    <div class="" style="margin: 80px">
        <div class="row">
            <h3 style="">Events</h3>
            <a href="editEvent.php"><button type="button" class="btn btn-outline-primary">Add New Event</button></a>
        </div>
        <div class="row" style="padding: 4px" id="eventList">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Event Title</th>
                        <th scope="col">Event Date</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody id="eventListByClubName">
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- FOOTER -->

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Developed by Rahul Kumar for BMS College of Engineering</p>
        </div>
    </footer>

    <!-- JAVASCRIPT -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="js/common.js"></script>
    <script src="js/clubs.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/userManage.js"></script>
    <script>
        <?php

            // If user is already logged
            if($_SESSION['displayname']) {
                echo "showLoginUser('" . $_SESSION['displayname'] . "');";
                echo "hideLoginButton();";
            }

            // If user is not logged in
            else {
                echo "hideLoginUser();";
                echo "showLoginButton();";
            }
        ?>

        $('document').ready(function() {
            loadEventListByClubName();
        });
    </script>
</body>

</html>
