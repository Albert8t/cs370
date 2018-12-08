

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
    <link rel="stylesheet" href="roommate%20searching.css">


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
                <li class="nav-item"><a href="../information%20review/information%20review.html" class="nav-link">Information Reivew</a></li>
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
                <h2 class="heading">Roommate Searching</h2>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<?php

session_start();
if(!$_SESSION['loggedin']) {
    print( "<center><a class=\"navbar-brand\" href=\"http://gohousin.com/profile.php\">Sign In To Search For Roommate</a></center>");
}else {
    $email = $_SESSION['username'];
    $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit(1);
    }
    $namequ = "select * from login join survey on login.id=survey.id where email='$email';";
    $nameres = $mysqli->query($namequ);
    $nameRow = $nameres->fetch_assoc();
    if ($nameRow != 0) {
        $share = $nameRow['sharedplace'];
        $person = $nameRow['personality'];
        $clean = $nameRow['howtoclean'];
        $pre = $nameRow['present'];
        $alcohol = $nameRow['alcoholuse'];
        $roomalcohol = $nameRow['roommatealcoholuse'];
        $smoke = $nameRow['smoke'];
        $roomsmoke = $nameRow['roommatesmoke'];
        $guest = $nameRow['guests'];
        $roomguest = $nameRow['roommateguests'];
        $time = $nameRow['daytime'];
        $night = $nameRow['nighttime'];
        $match="select * from profile join survey on profile.uid=survey.id join login on profile.uid=login.id where email!= '$email '" ;
        $tomatch=$mysqli->query($match);
        $count = 0;
        foreach ($tomatch as $one)
        { $diff=0;
            if(abs($nameRow['sharedplace']-$one['sharedplace'])>2)
                continue;
            if(abs($nameRow['personality']-$one['personality'])>2)
                continue;
            if(abs($nameRow['howtoclean']-$one['howtoclean'])>2)
                continue;
            if(abs($nameRow['present']-$one['present'])>2)
                continue;
            if(abs($nameRow['alcoholuse']-$one['alcoholuse'])>2)
                continue;
            if(abs($nameRow['sroommatealcoholuse']-$one['roommatealcoholuse'])>2)
                continue;
            if(abs($nameRow['smoke']-$one['smoke'])>2)
                continue;
            if(abs($nameRow['roommatesmoke']-$one['roommatesmoke'])>2)
                continue;
            if(abs($nameRow['guests']-$one['guests'])>2)
                continue;
            if(abs($nameRow['roommateguests']-$one['roommateguests'])>2)
                continue;
            if(abs($nameRow['daytime']-$one['daytime'])>2)
                continue;
            if(abs($nameRow['nighttime']-$one['nighttime'])>2)
                continue;

            $matchresf[$count] = $one['fname'];
            $matchresl[$count] = $one['lname'];
            $matchress[$count] = $one['school'];
            $matchrese[$count] = $one['email'];
            $count++;

        }
        $i = 0;
        while ($i < $count)
        {print("<div class=\"site-section bg-light\">
    <div class=\"container\">
        <div class=\"row\">");

            for($j=0;$j<3;$j++)
            {
                if ($i >= $count) {
                  break;
                }
                    print("<div class=\"col-md-6 col-lg-4\">
                <div class=\"block-33\">
                    <div class=\"vcard d-flex mb-3\">
                        <div class=\"image align-self-center\"><img src=\"defaultpicture.png\" alt=\"Person here\"></div>
                        <div class=\"name-text align-self-center\">
                            <h2 class=\"heading\">");
                print($matchresf[$i]." ".$matchresl[$i]);
                    print("</h2>
                        </div>
                    </div>
                    <div class=\"text\">
                        <blockquote>
                            <p>");
                print($matchress[$i]." is his/her school" . ", contact him/her through email ".$matchrese[$i]  );
                    print("</p>
                        </blockquote>
                    </div>
                </div>

            </div>");
                $i++;
                print"<br>"."<br>";
            }

            print"<br>"."<br>";
            }
    }else {
        ?>
        <div class="gapbetween2">
            <h4>Click here to fill out the survey</h4>
            <p class="card-text">Your survey result will be shown to those who match with you.</p>
            <a href="survey.php" class="btn btn-info">Survey</a>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

        <?php

    }
    $mysqli->close();
}
?>



<br>
<br>
<br>



</div>
</body>

</html>

