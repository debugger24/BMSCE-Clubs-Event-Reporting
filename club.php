<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BMSCE Event Reporting</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <style>
        body {
            padding-top: 5rem;
        }

        .card {
            margin: 4px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4" id="clubName">BMSCE IEEE Student Branch</h1>

                <!-- Club Name -->
                <p class="lead"><a href="#" id="eventWebsite" target="_blank">www.bmsceieee.com</a></p>
                <hr>

                <!-- Post Content -->
                <div id="clubDetails" style="text-align:justify;"></div>
                <hr>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Club Details Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Contact</h5>
                    <div class="card-body" id="contactWidget">

                    </div>
                </div>

                <!-- Events Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Recent Events</h5>
                    <div class="card-body" id="recentEventsWidget">
                        <ul class="list-unstyled mb-0">
                            <li><a href="#">Event 1</a></li>
                            <hr>
                            <li><a href="#">Event 2</a></li>
                            <hr>
                            <li><a href="#">See all</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Side Widget -->
                <!-- <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        We will add something here later.
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Developed by Rahul Kumar for BMS College of Engineering</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="js/common.js"></script>
    <script src="js/clubDetails.js"></script>
</body>

</html>
