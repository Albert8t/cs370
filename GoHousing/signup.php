<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <meta charset="utf-8" http-equiv="x-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="nodeModule/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">

    <title>Title</title>
</head>
<body>
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
             $pass_hash=password_hash($pass,PASSWORD_BCRYPT);
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
             ?>
             <div class = "container-profile">
                 <form class = "form-login" action = "http://www.gohousin.com/profile.php" method = "post">
                     <span class="title-signin">
                        Now it's time to complete your profile
                     </span>
                     <br>
                     <div class= "username">
                         <span class= "txt1">
                            First Name
                         </span>
                     </div>
                     <div class="input-title">
                         <input class = "input1" type="text" name="FirstName" >
                     </div>

                     <div class= "username">
                         <span class= "txt1">
                            Last Name
                         </span>
                     </div>
                     <div class="input-title">
                         <input class = "input1" type="text" name="LastName" >
                     </div>

                     <div class= "username">
                         <span class= "txt1">
                            Your University
                         </span>
                     </div>
                     <div class="input-title">
                         <input class = "input1" type="text" name="uni" >
                     </div>

                     <div class= "username">
                         <span class= "txt1">
                            Gender
                         </span>
                     </div>
                     <select name="Gender">
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                         <option value="Third">Prefer not to answer</option>
                     </select>

                     <div class= "username">
                         <span class= "txt1">
                            Year
                         </span>
                     </div>
                     <select name="Year">
                         <option value="Freshman">Freshman</option>
                         <option value="Sophomore">Sophomore</option>
                         <option value="Junior">Junior</option>
                         <option value="Senior">Senior</option>
                         <option value="Grad">Grad School</option>
                         <option value="staff">I work here</option>
                     </select>
                     <br>
                     <br>
                     <div class="login-button">
                         <button class="button-form">
                             <a href="http://www.gohousin.com/signup.php">
                                 Submit
                             </a>
                         </button>
                     </div>
                 </form>
             </div>
    <?php   $mysqli->close();  }else {
             ?>
             <div class = "container-login">
                 <form class = "form-login" action="http://www.gohousin.com/signup.php" method="post">
                     <div class="dialog">
                         <a href="index.html" class="close-thick"></a>
                     </div>
                     <span class="txt2">
                         <?php
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
