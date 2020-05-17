<!------------------------------------------------------------
Name: Kendall Shearman
Assignment: Final Project
Purpose: MVC Frameworks
Notes: No questions or comments at this time
--------------------------------------------------------------->

<html lang="en">
    <head>

        <!-- Vendor CSS -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/featherlight.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/featherlight.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/navbar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/small-business.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/signin.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" type="text/css">

        <!-- Favicon -->
        <link rel="icon" href="<?php echo base_url(); ?>android-chrome-192x192.png">
        <link rel="icon" href="<?php echo base_url(); ?>android-chrome-512x512.png">
        <link rel="icon" href="<?php echo base_url(); ?>apple-touch-icon.png">
        <link rel="icon" href="<?php echo base_url(); ?>favicon-16x16.png">
        <link rel="icon" href="<?php echo base_url(); ?>favicon-32x32.png">
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico">

        <title><?= $title; ?></title>

    </head>
    <body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>home"><i class="ion-ios-home nav-home"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>gallery">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>carousel">CAROUSEL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>contact">CONTACT</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="<?php /*echo base_url(); */?>users/signin">LOG IN</a>
                    </li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            MEMBERS
                        </a>
                        <div class="dropdown-menu dd-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>userhome">MEMBER HOME</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>register">REGISTER</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>signin">LOG IN</a>
                            <div class="dropdown-divider hidden"></div>
                            <a class="dropdown-item hidden" href="#">MEMBER'S AREA</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
