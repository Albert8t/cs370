<!DOCTYPE html>
<html lang="en">
<head>
	<title>Civic - CV Resume</title>
	<meta charset="UTF-8">
	<meta name="description" content="Civic - CV Resume">
	<meta name="keywords" content="resume, civic, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="../../index.html">GoHousin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="information%20review.html" class="nav-link">Information Reivew</a></li>
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
		if (!empty($_POST['FirstName'])) {
		    $id = $_POST['id'];
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
        $insert = "insert into profile (uid,fname,lname,school, gender,year)  values(" . $id . "','" . $profile['FirstName'] . "','" . $profile['LastName'] . "','" . $profile['school'] . "'," . $sex . ",'" . $profile['year'] . "')";
        if ($mysqli->query($insert) === TRUE) {
            ?>
    <section class="hero-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-text">
                                <h2>
                                    <?php>
                                    echo $profile['FirstName'] . " " . $profile['LastName'];
                                    ?>
                                </h2>
                                <p>Welcome to GoHousin</p>
                            </div>
                            <div class="hero-info">
                                <ul>
                                    <li><span>school</span>
                                        <?php>
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
	        } else{
		        $login['email'] = $_POST['email'];
                $pass =  (string)$_POST['pass'];
                $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
                if (mysqli_connect_errno())   {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit(1);
                }
                $ifExist = "select password,id, email from login where email='" . $login['email'] . "'";
                $result = mysqli_query($mysqli, $ifExist);
                if (mysqli_num_rows($result) == 0) {
                    echo("No account yet");
                    header("Location: http://gohousin.com/signup.php");
                    exit;
                }
                $row = $result->fetch_assoc();
                $hashed =  (string)$row['password'];
                $signin = false;
                echo($hashed);
                echo('<br>');
                echo($row['email']);
                echo('<br>');
                echo(strlen($hashed));
                echo('<br>');
                echo('<br>');
            if (password_verify($pass,$hashed)) {
                echo('tohere');
                $signin = true;
            } else {
                echo("incorrect password, try again");
            }
            echo('end');
            $mysqli->close();
        }

    ?>


	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>