<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta charset="UTF-8">
    <title>Go Housin</title>
</head>
<body>
<?php
session_start();
if(!$_SESSION['loggedin']) {
    print( "<center><a class=\"navbar-brand\" href=\"http://gohousin.com/profile.php\">Sign In To Write Down Your Review</a></center>");
}

?>
        <div class="container-contact100">
        <div class="wrap-contact100">
            <form form class="contact100-form validate-form" action = "survey.php" method = "POST">
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">1. Rate how you prefer your shared living area: *</span>
                    <br>
                    <span class="label-input100l">1 means messy&disorganized while 5 means neat&clean</span>
                    <div>
                        <select class="js-select2" name="clean">
                            <option value = ""></option>
                            <option value = "1">1</option>
                            <option value = "2">2</option>
                            <option value = "3">3</option>
                            <option value = "4">4</option>
                            <option value = "5">5</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">2. Do you consider yourself: *</span>
                    <br>
                    <span class="label-input100l">1 means shy while 5 means outgoing</span>
                    <div>
                        <select class="js-select2" name="person">
                            <option value = ""></option>
                            <option value = "1">1</option>
                            <option value = "2">2</option>
                            <option value = "3">3</option>
                            <option value = "4">4</option>
                            <option value = "5">5</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">3. How do you tipically clean: *</span>
                    <div class = "radio">
                        <input type="radio" name="howclean" value="1" checked> Clean right away<br>
                        <input type="radio" name="howclean" value="2">  Clean before I go to bed<br>
                        <input type="radio" name="howclean" value="3">  I wait a few days
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">4. I will probably be at my apartment: *</span>
                    <div class = "radio">
                        <input type="radio" name="time" value="1" checked> A majority of the time<br>
                        <input type="radio" name="time" value="2">  I may be gone most weekends<br>
                        <input type="radio" name="time" value="3">   I will hardly be home
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">5. Describe your alcohol use: *</span>
                    <div class = "radio">
                        <input type="radio" name="alcohol" value="1" checked> Never<br>
                        <input type="radio" name="alcohol" value="2">  A few times a month<br>
                        <input type="radio" name="alcohol" value="3">   1-2 days per week<br>
                        <input type="radio" name="alcohol" value="4">   3-5 days per week<br>
                        <input type="radio" name="alcohol" value="5">   6-7 days per week
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">6.  Do you mind if your roommates drink: *</span>
                    <div class = "radio">
                        <input type="radio" name="roomalcohol" value="1" checked>  Prefer no alcohol<br>
                        <input type="radio" name="roomalcohol" value="2">  1-3 times per week<br>
                        <input type="radio" name="roomalcohol" value="3">   Anytime
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">7.  Do you somke: *</span>
                    <div class = "radio">
                        <input type="radio" name="smoke" value="1" checked>  Yes<br>
                        <input type="radio" name="smoke" value="2">   No
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">8.   Do you mind if your roommates are smokers: *</span>
                    <div class = "radio">
                        <input type="radio" name="roomsmoke" value="1" checked>  Yes<br>
                        <input type="radio" name="roomsmoke" value="2">   No
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">9. How often do you plan on having guests in the apartment: *</span>
                    <div class = "radio">
                        <input type="radio" name="guest" value="1" checked> Never<br>
                        <input type="radio" name="guest" value="2">  A few times a month<br>
                        <input type="radio" name="guest" value="3">   1-2 days per week<br>
                        <input type="radio" name="guest" value="4">   3-5 days per week<br>
                        <input type="radio" name="guest" value="5">   6-7 days per week
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">10.  How often may you roommates have guests in the apartment: *</span>
                    <div class = "radio">
                        <input type="radio" name="roomguest" value="1" checked>  Prefer no guests<br>
                        <input type="radio" name="roomguest" value="2">  1-3 times per week<br>
                        <input type="radio" name="roomguest" value="3">   Anytime
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">11.  When do you start your day: *</span>
                    <div class = "radio">
                        <input type="radio" name="day" value="1" checked>  In the morning<br>
                        <input type="radio" name="day" value="2">  At noon<br>
                        <input type="radio" name="day" value="3">   After noon
                    </div>
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">12.  When do you typically go to bed: *</span>
                    <div class = "radio">
                        <input type="radio" name="night" value="1" checked>  Before 10pm<br>
                        <input type="radio" name="night" value="2">  Before midnight<br>
                        <input type="radio" name="night" value="3">   After midnight
                    </div>
                </div>

                <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
                    <span class="label-input100">Please write any other concerns you have for your future roommates.</span>
                    <textarea class="input100" name="message" placeholder="Your message here..."></textarea>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        <span>
                            <input type="hidden" id="give" name="give" value=true>
                           <input type="submit" value="Submit">
                        </span>
                    </button>
                </div>
            </form>


        <?php
        if($_POST['give']) {
            $email = $_SESSION['username'];
            $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit(1);
            }
            $namequ = "select id from login where email='$email';";
            $nameres = $mysqli->query($namequ);
            $nameRow = $nameres->fetch_assoc();
            $id = $nameRow['id'];
            $cleaning = $_POST["clean"];
            $personality = $_POST["person"];
            $howtoclean = $_POST["howclean"];
            $timehome = $_POST["time"];
            $alco = $_POST["alcohol"];
            $roomalco = $_POST["roomalcohol"];
            $smo = $_POST["smoke"];
            $roomsmo = $_POST["roomsmoke"];
            $gue = $_POST["guest"];
            $roomgue = $_POST["roomguest"];
            $daytime = $_POST["day"];
            $nightime = $_POST["night"];
            $concern = $_POST["message"];
            $insert = "insert into survey (id,sharedplace,personality,howtoclean, present, alcoholuse, roommatealcoholuse, smoke, roommatesmoke, guests, roommateguests, daytime,  nighttime, suggestions)  values('" . $id . "','" . $cleaning. "','" . $personality . "','" . $howtoclean . "','" . $timehome . "','" . $alco . "','" . $roomalco . "','" . $smo . "','" . $roomsmo . "','" . $gue . "','" . $roomgue . "','" . $daytime . "','" . $nightime . "','" . $concern . "');";
            if ($mysqli->query($insert) === TRUE) {
                print("<br>");
                print("<a href='roommate%20searching.php' class=\"label-input100t\">Your Roommate Form Is Completed <br> Back to Roommate Searching Page</a>");
            }
            $mysqli->close();
        }

        ?>
        </div>
</div>
</body>
</html>
