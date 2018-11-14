<!DOCTYPE html>
<html lang="en">
<head>
    <title>Go Housin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <!--<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">-->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!--<link rel="stylesheet" href="css/magnific-popup.css">-->
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!--<link rel="stylesheet" href="css/bootstrap-datepicker.css">-->
    <!--<link rel="stylesheet" href="css/jquery.timepicker.css">-->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">




</head>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="../../index.html">GoHousin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="http://www.gohousin.com/app/information%20review/GablesReview.php" class="nav-link">Information Reivew</a></li>
                <li class="nav-item"><a href="../information%20sharing/information%20sharing.html" class="nav-link">Information Sharing</a></li>
                <li class="nav-item"><a href="../roommate%20searching/roommate%20searching.html" class="nav-link">Roommate Searching</a></li>
                <li class="nav-item"><a href="../aboutus/about.html" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="../contact/contact.php" class="nav-link">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
<body>
	<?php
    session_start();
		if (!empty($_POST['FirstName'])) {
		    $id = $_POST['id'];
		    $email=$_POST['email'];
            $profile['FirstName']= $_POST['FirstName'];
            $profile['LastNmae'] = $_POST['LastName'];
            $profile['school'] = $_POST['uni'];
            $profile['gender'] = $_POST['Gender'];
            $profile['year'] = $_POST['Year'];
            $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit(1);
            }
        $sex = 3;
        if ($profile['gender'] === 'male') {
            $sex = 1;
        }
        if ($profile['gender'] === 'female') {
            $sex = 2;
        }
        $id = intval($id);
            $insert = "insert into profile (uid,fname,lname,school, gender,year)  values(" . $id . ",'" . $profile['FirstName'] . "','" . $profile['LastName'] . "','" . $profile['school'] . "'," . $sex . ",'" . $profile['year'] . "')";
        if ($mysqli->query($insert) === TRUE) {

            $_SESSION['username']=$email;
            $_SESSION['loggedin']=true;

            echo('<br>');
            echo($_SESSION['username']);
            echo('<br>');
            echo($_SESSION['loggedin']);
            echo('<br>');
            ?>
    <section class="hero-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-text">
                                <h2>
                                    <?php
                                    echo $profile['FirstName'] . " " . $profile['LastName'];
                                    ?>
                                </h2>
                                <p>Welcome to GoHousin</p>
                            </div>
                            <div class="hero-info">
                                <ul>
                                    <li><span>school</span>
                                        <?php
                                            echo $profile['school'];
                                        ?>
                                    </li>
                                    <li><span>Year</span>
                                        <?php
                                            echo $profile['year'];
                                        ?>
                                    </li>
                                    <li><span>Gender</span>
                                        <?php
                                            echo $profile['gender'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <figure class="hero-image">
                                <img src="img/hero.jpg" alt="5">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            <?php
	            } else {
	                echo "insert error";
	            }
	            $mysqli->close();
	        }
	        else {
		        $login['email'] = $_POST['email'];
                $pass =  (string)$_POST['pass'];
                $up=$_POST['up'];
                $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
                if (mysqli_connect_errno())   {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit(1);
                }
                $ifExist = "select password,id, email from login where email='" . $login['email'] . "'";
                $result = mysqli_query($mysqli, $ifExist);
                if (mysqli_num_rows($result) == 0) {
                    echo("No account yet");
                    echo('<br>');
                    print("<a class=\"navbar-brand\" href=\"http://gohousin.com/signup.php\">Sign Up for a New Account</a>");
                    echo('<br>');
                    print("OR Sign In To Your Account");
                    echo('<br>');
                    print("<div class = \"container-login\">
        <form class = \"form-login\"  ACTION=\"http://www.gohousin.com/profile.php\" METHOD=\"POST\">

            <div class=\"dialog\">
                <a href=\"index.html\" class=\"close-thick\"></a>
            </div>
            <br>
            <br>
            <input type=\"hidden\" id=\"up\" name=\"up\" value=true>
            <div class= \"email\">
                    <span class= \"txt1\">
                        Email
                    </span>
            </div>
            <div class=\"input-title\">
                <input class = \"input1\" type=\"text\" name=\"email\" >
            </div>

            <div class=\"password\">
                    <span class=\"txt1\">
							Password
                    </span>
                <a href=\"app/login/forgotpassword.html\" class=\"txt2\">
                    Forgot?
                </a>
            </div>
            <div class=\"input-title\">
                <input class=\"input1\" type=\"password\" name=\"pass\" >
            </div>
            <br>
            <br>
            <div class=\"login-button\">
                <button class=\"button-form\" ng-click=\"isShowHide('show')\">
                    Sign In
                </button>
            </div>
            <br>
        </form>
    </div>");
                    exit;
                }
                $row = $result->fetch_assoc();
                $hashed =  (string)$row['password'];
                $signin = false;

            $rehash=md5($pass);

            if ($rehash===$hashed) {

                echo('Login Success');
                $signin = true;
                $_SESSION['username']=$login['email'];
                $_SESSION['loggedin']=true;

                echo('<br>');
                print($_SESSION['username']);
                echo('<br>');
                print($_SESSION['loggedin']);
                echo('<br>');
            } else {
                echo("incorrect password, try again");
            }
            echo('end');
            $mysqli->close();
        }

    ?>



    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>

    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
</html>