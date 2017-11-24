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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clubs</a>
                    </li>

                    <!-- Initially Display Name -->

                    <!-- Manage -->
                    <li class="nav-item" id="navBtnManage" style="display:none">
                        <a class="nav-link" href="admin.php">Manage</a>
                    </li>

                    <!-- Login -->
                    <li class="nav-item" id="navBtnLogin" style="display:none">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>

                    <!-- Register -->
                    <li class="nav-item" id="navBtnRegister" style="display:none">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register</a>
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

    <!-- LOGIN -->

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="loginForm">
                        <div class="form-group">
                            <label for="login_email" class="col-form-label">Email ID</label>
                            <input type="email" class="form-control" id="login_email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="login_password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="login_password" name="password">
                            <span class="loginError">Wrong username/password</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="login();">Login</button>
                </div>
            </div>
        </div>
    </div>

    <!-- RESER PASSWORD -->

    <!-- REGISTER -->

    <!-- SLIDER -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/bmsceieee.png" alt="BMSCE IEEE">
                <div class="carousel-caption d-none d-md-block">
                    <h4 class="slideshowLabel">BMSCE IEEE Student Branch</h4>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/protocol.png" alt="Protocol">
                <div class="carousel-caption d-none d-md-block">
                    <h4 class="slideshowLabel">BMSCE Protocol</h4>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/ninaad.png" alt="Ninaad">
                <div class="carousel-caption d-none d-md-block">
                    <h4 class="slideshowLabel">Ninaad</h4>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- EVENTS -->

    <div class="" style="margin: 80px">
        <h3>Events</h3>
        <div class="row" style="padding: 4px" id="eventList">
            <!-- <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div> -->
        </div>
        <!-- <div class="row" style="padding: 4px">
            <button type="button" class="btn btn-outline-primary">Load More</button>
        </div> -->
    </div>

    <!-- CLUBS -->

    <div class="" style="margin: 80px">
        <h3>Clubs</h3>
        <div class="row" style="padding: 4px" id="clubList">
            <!-- <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div> -->
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
    <script src="js/event.js"></script>
    <script src="js/clubs.js"></script>
    <script src="js/userManage.js"></script>
    <script>
        <?php

            // If user is already logged
            if($_SESSION['displayname']) {
                echo "showLoginUser('" . $_SESSION['displayname'] . "');";
                echo "hideLoginRegisterButton();";

                if ($_SESSION['userType'] == "ClubAdmin") {
                    echo "showManageButton();";
                }
                else {
                    echo "hideManageButton();";
                }
            }

            // If user is not logged in
            else {
                echo "hideLoginUser();";
                echo "showLoginRegisterButton();";
            }
        ?>
    </script>
</body>

</html>
