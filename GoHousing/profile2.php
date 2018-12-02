<!DOCTYPE html>
<html lang="en">
<head>
    <title>Go Housin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">GoHousin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="app/information%20review/information%20review.html" class="nav-link">Information Reivew</a></li>
                <li class="nav-item"><a href="app/information%20sharing/information%20sharing.html" class="nav-link">Information Sharing</a></li>
                <li class="nav-item"><a href="app/roommate%20searching/roommate%20searching.html" class="nav-link">Roommate Searching</a></li>
                <li class="nav-item"><a href="app/aboutus/about.html" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="app/contact/contact.php" class="nav-link">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>


<?php
    session_start();
        $id = $_POST['id'];
        $email=$_POST['email'];
        $profile['FirstName']= $_POST['FirstName'];
        $profile['LastName'] = $_POST['LastName'];
        $profile['school'] = $_POST['uni'];
        $profile['gender'] = $_POST['Gender'];
        $profile['year'] = $_POST['Year'];
        $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit(1);
        }
        $sex = 3;
        if ($profile['gender'] === 'Male') {
            $sex = 1;
        }
        if ($profile['gender'] === 'Female') {
            $sex = 2;
        }
        $id = intval($id);
        $insert = "insert into profile (uid,fname,lname,school, gender,year)  values(" . $id . ",'" . $profile['FirstName'] . "','" . $profile['LastName'] . "','" . $profile['school'] . "'," . $sex . ",'" . $profile['year'] . "')";
        if ($mysqli->query($insert) === TRUE) {
            $_SESSION['username'] = $email;
            $_SESSION['loggedin'] = true;
            echo("<br>");
            echo($_SESSION['username']);
            echo("<br>");
            echo($_SESSION['loggedin']);
        }
    $mysqli->close();
?>

<div class="block-30 block-30-sm item"  data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10">
                <span class="subheading-sm">Profile Page</span>
                <h2 class="heading">Wenqin Dong</h2>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class = "reviewtitle">
    <div class = "reviewinput">
        <h3>Here is your information</h3>
    </div>
</div>




    
</body>
</html>





