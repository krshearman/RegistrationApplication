<!------------------------------------------------------------
Name: Kendall Shearman
Assignment: Coding Seven
Purpose: MVC Frameworks
Notes: No questions or comments at this time
--------------------------------------------------------------->

<html lang="en">
    <head>

        <!-- Vendor CSS -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/featherlight.css">
        <link rel="stylesheet" href="assets/css/featherlight.css">
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/navbar.css">
        <link rel="stylesheet" href="assets/css/small-business.css">
        <link rel="stylesheet" href="assets/css/signin.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="assets/css/main.css" type="text/css">

        <!-- Favicon -->
        <link rel="icon" href="android-chrome-192x192.png">
        <link rel="icon" href="android-chrome-512x512.png">
        <link rel="icon" href="apple-touch-icon.png">
        <link rel="icon" href="favicon-16x16.png">
        <link rel="icon" href="favicon-32x32.png">
        <link rel="icon" href="favicon.ico">

        <!-- Scripts -->
        <script src="assets/js/jquery-3.4.1.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/featherlight.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/main.js"></script>


        <title><?= $title; ?></title>

    </head>
    <body>

   <!-- <h1><?/*= $title; */?></h1>-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="home"><i class="ion-ios-home nav-home"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="gallery">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carousel">CAROUSEL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin">LOG IN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
