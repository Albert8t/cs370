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
        <a class="navbar-brand" href="../../index.html">GoHousin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="information%20review.html" class="nav-link">Information Reivew</a></li>
                <li class="nav-item"><a href="../information%20sharing/index.php" class="nav-link">Information Sharing</a></li>
                <li class="nav-item"><a href="../roommate%20searching/roommate%20searching.php" class="nav-link">Roommate Searching</a></li>
                <li class="nav-item"><a href="../aboutus/about.html" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="../contact/contact.php" class="nav-link">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->




<div class="block-30 block-30-sm item"  data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10">
                <span class="subheading-sm">User Review</span>
                <h2 class="heading">Highland Lake</h2>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<?php

session_start();
//print($_SESSION['loggedin']);
//print($_SESSION['username']);
if(!$_SESSION['loggedin'])
print( "<center><a class=\"navbar-brand\" href=\"http://gohousin.com/profile.php\">Sign In To Write Down Your Review</a></center>");
else
print("<div class = \"reviewtitle\">
    <div class = \"reviewinput\">
        <form form class = \"form-login\"  ACTION=\"HighlandLakeReview.php\" METHOD=\"POST\">
            <h3>Please fill in your reviews</h3>

            <p>Your reviews help other learn about Highland Lake.</p>
            <textarea name= \"review\" rows=\"5\" cols=\"105\"></textarea>
            <br>
            <p>Give A Rate Of Highland Lake From 0 to 10 </p>
            <input type=\"range\" name=\"points\" min=\"0\" max=\"10\">
            <input type=\"hidden\" id=\"give\" name=\"give\" value=true>
            <input type=\"submit\" value=\"Submit\">
        </form>
    </div>
</div>
<br>
<br>
<div class = \"gapbetween\">
    <div class=\"row mb-5\">
        <div class=\"col-md-7 section-heading\">
            <span class=\"subheading-sm\">Guest Reviews</span>
            <h3>Here are the reviews for Highland Lake</h3>
        </div>
    </div>
</div>");

if($_POST['give']) {
    $email = $_SESSION['username'];
    // print($_SESSION['username']);

    //  print('<br>');
    $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit(1);
    }
    //  print($email);
    $namequ = "select * from login join profile on login.id=profile.uid where email='$email';";
    //  print('<br>');
    // print($namequ);
    $nameres = $mysqli->query($namequ);
    // print(mysqli_num_rows($nameres));
    $nameRow = $nameres->fetch_assoc();
    $name = $nameRow['fname'];
    //print($name);

    $insert = "insert into review (user,house,context,rating)  values('" . $name . "','" . "HighlandLake" . "','" . $_POST['review'] . "','" . $_POST['points'] . "')";
    if ($mysqli->query($insert) === TRUE) {
        echo(" <Center>Your Review Is Added</Center>");
    }
    $mysqli->close();
}









$mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit(1);
}
$ifExist = "select * from review where house='HighlandLake';";
$result = mysqli_query($mysqli, $ifExist);
$rowNum=mysqli_num_rows($result)/3 +1;
$row=$result->fetch_row();
for( $i=0;$i<$rowNum;$i++)
{print("<div class=\"site-section bg-light\">
    <div class=\"container\">
        <div class=\"row\">");

    for($j=0;$j<3;$j++)
    {$row = $result->fetch_assoc();
        if($row!=false)
        {
            print("<div class=\"col-md-6 col-lg-4\">
                <div class=\"block-33\">
                    <div class=\"vcard d-flex mb-3\">
                        <div class=\"image align-self-center\"><img src=\"images/anonymous.jpg\" alt=\"Person here\"></div>
                        <div class=\"name-text align-self-center\">
                            <h2 class=\"heading\">");
            print($row['user']." rated here ".$row['rating']."/10");
            print("</h2>
                        </div>
                    </div>
                    <div class=\"text\">
                        <blockquote>
                            <p>");
            print($row['context']);
            print("</p>
                        </blockquote>
                    </div>
                </div>

            </div>");}


    }



    print("</div>
    </div>
</div>");
  print('<br>');
    print('<br>');

}
$mysqli->close();










?>









<!-- loader -->
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

</body>
</html>