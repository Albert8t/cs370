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
    <link rel="stylesheet" href="login.css">
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
                <li class="nav-item"><a href="app/information%20sharing/index.php" class="nav-link">Information Sharing</a></li>
                <li class="nav-item"><a href="app/roommate%20searching/roommate%20searching.php" class="nav-link">Roommate Searching</a></li>
                <li class="nav-item"><a href="app/aboutus/about.html" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="app/contact/contact.php" class="nav-link">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>


	<?php
    session_start();
		if (!empty($_POST['FirstName'])) {
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
                $_SESSION['username']=$email;
                $_SESSION['loggedin']=true；
     ?>

<div class="block-30 block-30-sm item"  data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10">
                <span class="subheading-sm">Profile Page</span>
                <h2 class="heading">
                    Welcome to GoHousin
                </h2>
            </div>
        </div>
    </div>
</div>
<br>
<br>

                <div class="reviewtitle">
                    <h2>Here is your information</h2>
                    <br>
                    <br>
                    <span>
                    <h4 class = "heading">
                        Name: <?php
                        print "  " . $profile['FirstName'] . " " . $profile['LastName']; ?>
                    </h4>
                </span>
                    <span>
                    <h4 class = "heading">
                        School:<?php
                        print "  ". $profile['school']; ?>
                    </h4>
                </span>
                    <span>
                        <h4 class = "heading">
                            Year:<?php
                            print "  ". $profile['year']; ?>
                        </h4>
                </span>
                    <span>
                        <h4 class = "heading">
                            Gender:<?php
                            print "  ". $profile['gender']; ?>
                        </h4>
                </span>
                    <br>
                    <br>
                    <br>
                </div>

            <?php
	            } else {
	                echo "insert error";
	            }
	            $mysqli->close();
	        } else {
                ?>

           <div class="block-30 block-30-sm item"  data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-10">
                            <span class="subheading-sm">Profile Page</span>
                            <h2 class="heading">
                                Welcome to GoHousin
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>

<?php
            $login['email'] = $_POST['email'];
            $pass = (string)$_POST['pass'];
            $up = $_POST['up'];
            $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit(1);
            }
            $ifExist = "select * from login join profile on profile.uid=login.id where email='" . $login['email'] . "'";
            $result = mysqli_query($mysqli, $ifExist);
            if (mysqli_num_rows($result) == 0) {

                echo "<br>";
                echo('<br>');
                print("<div class = \"container-profile\">
        <form class = \"form-profile\"  ACTION=\"http://www.gohousin.com/profile.php\" METHOD=\"POST\">

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

            }



            $row = $result->fetch_assoc();
            $hashed = (string)$row['password'];
            $signin = false;

            $rehash = md5($pass);

            if ($rehash === $hashed) {

                $signin = true;
                $_SESSION['username'] = $login['email'];
                $_SESSION['loggedin'] = true;

            } 

            $mysqli->close();
            ?>
<div class="reviewtitle">
                    <h2>Here is your information</h2>
                    <br>
                    <br>
                <span>
                    <h4 class = "heading">
                        Name: <?php
                        print "  " . $row['fname'] . " " . $row['lname']; ?>
                    </h4>
                </span>
                <span>
                    <h4 class = "heading">
                        School:<?php
                        print "  " . $row['school']; ?>
                    </h4>
                </span>
                <span>
                        <h4 class = "heading">
                            Year:<?php
                            print "  " . $row['year']; ?>
                        </h4>
                </span>
                <span>
                        <h4 class = "heading">
                            Gender:<?php
                            print "  " . $row['gender']; ?>
                        </h4>
                </span>
                    <br>
                    <br>
                    <br>
</div>

            <?php
        }
?>
</body>
</html>