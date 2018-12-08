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
                <li class="nav-item"><a href="app/information%20sharing/information%20sharing.html" class="nav-link">Information Sharing</a></li>
                <li class="nav-item"><a href="app/roommate%20searching/roommate%20searching.html" class="nav-link">Roommate Searching</a></li>
                <li class="nav-item"><a href="app/aboutus/about.html" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="app/contact/contact.php" class="nav-link">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="block-30 block-30-sm item"  data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10">
                <span class="subheading-sm">Sign Up Page</span>
                <h2 class="heading">
                    Welcome to GoHousin
                </h2>
                <h4 class="heading">
                    Please fill in your information below
                </h4>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class = "limiter">
    <?php
        $haserr=0;
        $passmatch=0;
        $shortpass=0;
        $invEmail=0;
        $weakpass=0;
        $emory=0;
        $taken=0;
        $user['email']=$_POST['email'];
        $user['pass']=$_POST['pass'];
        $user['repass']=$_POST['repass'];

        if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $invalidEmail=1;
            $haserr=1;
        }else {
            $split=explode('@',$user['email']);
            if (!($split[1]==="emory.edu")){
                $haserr=1;
                $emory=1;
            }
        }
        $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
         if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit(1);
         }
         $ifrepeat="select * from login where email='".$user['email']."'";
         $result = mysqli_query($mysqli, $ifrepeat);
//    print("<br>");
         if (mysqli_num_rows($result) != 0) {
             $haserr=1;
             $taken=1;
         }
         $mysqli->close();
         if(strlen($user['pass'])<8) {
             $haserr=1;
             $shortpass=1;
         }
         elseif(!preg_match('/[A-Za-z]/', $user['pass']) || !preg_match('/[0-9]/', $user['pass'])) {
             $haserr=1;
             $weakpass=1;
         }
         elseif(!($user['repass']===$user['pass'])) {
             $haserr=1;
             $passmatch=1;
         }

         if ($haserr == 0) {
             $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");
             if (mysqli_connect_errno()) {
                 printf("Connect failed: %s\n", mysqli_connect_error());
                 exit(1);
             }
             $uid=mt_rand(0,100000);
             $checkId="select * from login where id=".$uid;
             $result = mysqli_query($mysqli, $chekId);
             while(mysqli_num_rows($result) > 0) {
                 $uid=mt_rand(0,100000);
                 $checkId="select * from login where id=".$uid;
                 $result = mysqli_query($mysqli, $ifrepeat);
             }
             $pass_hash=md5($user['pass']);
             $_SESSION['id']=$uid;
             $insert="insert into login (id,email,password)  values(".$uid.",'". $user['email']."','". $pass_hash. "')";
             if ($mysqli->query($insert) === TRUE) {
                 ?>
                 <span class = "title-signin">
                     Your account has been set up!
                 </span>
                 <?php
             } else {
                 echo "Error: " . $insert . "<br>" . $mysqli->error;
             }
                $email=$_POST['email'];
             print("<div class = \"container-profile\">
        <form class = \"form-profile\" action=\"http://www.gohousin.com/profile.php\"
              method=\"post\">
            <div class=\"dialog\">
                <a href=\"index.html\" class=\"close-thick\"></a>
            </div>
             <input type=\"hidden\" id=\"id\" name=\"id\" value=$uid>
             <input type=\"hidden\" id=\"email\" name=\"email\" value=$email>
            <br>
            <span class=\"title-signin\">
                Now it's time to complete your profile
            </span>
            <br>
            <div class= \"Name\">
                    <span class= \"txt1\">
                        First Name
                    </span>
            </div>
            <div class=\"input-title\">
                <input class = \"input1\" type=\"text\" name=\"FirstName\" >
            </div>
            
            <div class= \"Name\">
                    <span class= \"txt1\">
                        Last Name
                    </span>
            </div>
            <div class=\"input-title\">
                <input class = \"input1\" type=\"text\" name=\"LastName\" >
            </div>
            
            

            <div class=\"School\">
                    <span class=\"txt1\">
							Your University
                    </span>
            </div>
            <div class=\"input-title\">
                <input class=\"input1\" type=\"text\" name=\"uni\" >
            </div>

            <div class=\"Gender\">
                    <span class=\"txt1\">
							Gender
                    </span>
            </div>
            
              <select name=\"Gender\">
    <option value=\"Male\">Male</option>
    <option value=\"Female\">Female</option>
    <option value=\"Third\">Prefer not to answer</option>
  </select>

            <br>
            <br>
            
              <div class=\"Year\">
                    <span class=\"txt1\">
						Year	
                    </span>
            </div>
            
            <select name=\"Year\">
    <option value=\"Freshman\">Freshman</option>
    <option value=\"Sophomore\">Sophomore</option>
    <option value=\"Junior\">Junior</option>
    <option value=\"Senior\">Senior</option>
    <option value=\"Grad\">Grad School</option>
    <option value=\"staff\">I work here</option>
  </select>

            <br>
            <br>

            <div class=\"submit-button\">
                <button class=\"button-form\" ng-click=\"isShowHide1('show')\">
                    submit
                </button>
            </div>
            <br>

        </form>
    </div>");   $mysqli->close();  }else {
             print("<div class = \"container-profile\">
                 <form class = \"form-profile\" action=\"http://www.gohousin.com/signup.php\" method=\"post\">
                     <div class=\"dialog\">
                         <a href=\"index.html\" class=\"close-thick\"></a>
                     </div>
                     <span class=\"txt2t\">");


                            if($invalidEmail==1) { ?>
                                Email is invalid <?php
                            } else if ($emory == 1) { ?>
                                Please use your emory Email to Sign Up <?php
                            } else if ($taken == 1) { ?>
                                This email address has been taken <?php
                            } else if ($shortpass == 1) { ?>
                                Password must contain at least 8 letters or numbers <?php
                            } else if ($weakpass == 1) { ?>
                                Password must contain letters and numbers <?php
                            } else if ($passmatch == 1) { ?>
                                Passwords don't match, try again <?php
                            }
                            ?>
                         <br>
                         Please retype your information
                     </span>
                     <br>
                     <div class= "email">
                        <span class= "txt1">
                            Email Address
                        </span>
                     </div>
                     <div class="input-title">
                         <input class = "input1" type="text" name="email" >
                     </div>

                     <div class="password">
                        <span class="txt1">
							Password
                        </span>
                     </div>
                     <div class="input-title">
                         <input class="input1" type="password" name="pass" >
                     </div>

                     <div class="repassword">
                         <span class="txt1">
							Retype Password
                         </span>
                     </div>
                     <div class="input-title">
                         <input class="input1" type="password" name="repass" >
                     </div>

                     <br>
                     <br>

                     <div class="signin-button">
                         <button class="button-form">
                             Register
                         </button>
                     </div>
                     <br>
                 </form>
             </div>

            <?php }
    ?>
</div>
</body>
</html>
