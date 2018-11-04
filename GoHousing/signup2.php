<html>
<title>Sign up your account</title>




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

            }else
            {
            $split=explode('@',$user['email']);
            //echo($split[1]);
            if (!($split[1]==="emory.edu"))
                {$haserr=1;
                $emory=1;}

            }



            $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");

            if (mysqli_connect_errno())            # ------ check connection error
            {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit(1);
            }
            $ifrepeat="select * from login where email='".$user['email']."'";
            $result = mysqli_query($mysqli, $ifrepeat);
           // echo(mysqli_num_rows($result));
            print("<br>");
            if (mysqli_num_rows($result) != 0)
            {$haserr=1;
            $taken=1;}
            $mysqli->close();




            if(strlen($user['pass'])<8)
            { $haserr=1;
            $shortpass=1;


            }
            elseif(!preg_match('/[A-Za-z]/', $user['pass']) || !preg_match('/[0-9]/', $user['pass']))
            { $haserr=1;
            $weakpass=1;
            }
            elseif(!($user['repass']===$user['pass']))
            {$haserr=1;
            $passmatch=1;

            }
            //echo($haserr);
            //echo($invalidEmail);
            //echo($shortpass);
           // echo($weakpass);
            //echo($passmatch);





            //after pre-processing of emial and password, has two states, signup or reenter
            if($haserr==0)
            {


            $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");

                if (mysqli_connect_errno())            # ------ check connection error
                {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit(1);
                }

                print("<br>");

                $uid=mt_rand(0,100000);
                $checkId="select * from login where id=".$uid;
                $result = mysqli_query($mysqli, $chekId);

                while(mysqli_num_rows($result) > 0)
                {$uid=mt_rand(0,100000);
               $checkId="select * from login where id=".$uid;
               $result = mysqli_query($mysqli, $ifrepeat);}



                $pass_hash=password_hash($pass,PASSWORD_BCRYPT);
                //echo($pass_hash);
                $_SESSION['id']=$uid;
                $insert="insert into login (id,email,password)  values(".$uid.",'". $user['email']."','". $pass_hash. "')";

                if ($mysqli->query($insert) === TRUE) {
                    echo "Your account has been set up";
                } else {
                    echo "Error: " . $insert . "<br>" . $mysqli->error;
                }


                print("<div class = \"container-profile\">
        <form class = \"form-profile\" action=\"http://www.gohousin.com/profile.php\"
              method=\"post\">
            <div class=\"dialog\">
                <a href=\"index.html\" class=\"close-thick\"></a>
            </div>
             <input type=\"hidden\" id=\"id\" name=\"id\" value=$uid>
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
    </div>");
                $mysqli->close();




               }



            else{ if($invalidEmail==1)
                print('Email is invalid');
            elseif($emory==1)
                print("Please use your emory Email to Sign Up");
            elseif($taken==1)
                print("This email address has been taken");
            elseif($shortpass==1)
            print("password must contain at least 8 letters or numbers");
            elseif($weakpass==1)
            print("password must contain letters and numbers");
            elseif($passmatch==1)
            print("passwords don't match, try again");









                print("<div class = \"container-login\">
        <form class = \"form-login\" action=\"http://www.gohousin.com/signup.php\"
              method=\"post\">
            <div class=\"dialog\">
                <a href=\"index.html\" class=\"close-thick\"></a>
            </div>
            <span class=\"title-signin\">
                Please retype your information
            </span>
            <br>
            <div class= \"email\">
                    <span class= \"txt1\">
                        Email Address
                    </span>
            </div>
            <div class=\"input-title\">
                <input class = \"input1\" type=\"text\" name=\"email\" >
            </div>

            <div class=\"password\">
                    <span class=\"txt1\">
							Password
                    </span>
            </div>
            <div class=\"input-title\">
                <input class=\"input1\" type=\"password\" name=\"pass\" >
            </div>

            <div class=\"repassword\">
                    <span class=\"txt1\">
							Retype Password
                    </span>
            </div>
            <div class=\"input-title\">
                <input class=\"input1\" type=\"password\" name=\"repass\" >
            </div>

            <br>
            <br>

            <div class=\"signin-button\">
                <button class=\"button-form\" ng-click=\"isShowHide1('show')\">
                    Register
                </button>
            </div>
            <br>

        </form>
    </div>");

            }




            ?>


</html>