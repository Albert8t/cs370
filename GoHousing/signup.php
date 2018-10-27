<div style="background-color: #f4ecf7
;width:100%;height:325%;">

    <center>





            <?php






            $user['email']=$_POST['email'];
            $user['pass']=$_POST['pass'];
            $user['repass']=$_POST['repass'];
            if($user['repass']==$user['pass'])
            {
                $uid=mt_rand(0,100000);
                print("<p>");
                print("</p>");
                print("Your User Id is: ".$uid);
            $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");

                if (mysqli_connect_errno())            # ------ check connection error
                {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit(1);
                }

                print("<p>");
                print("</p>");
                $insert="insert into login (id,email,password)  values(".$uid.",'". $user['email']."','". $user['pass']. "')";

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
            <span class=\"title-signin\">
                Now it's time to complete your profile
            </span>
            <br>
            <div class= \"Name\">
                    <span class= \"txt1\">
                        Name
                    </span>
            </div>
            <div class=\"input-title\">
                <input class = \"input1\" type=\"text\" name=\"Name\" >
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
    <option value=\"NA\">Prefer not to answer</option>
  </select>

            <br>
            <br>
            
              <div class=\"Year\">
                    <span class=\"txt1\">
						Year	
                    </span>
            </div>
            
            <select name=\"Year\">
    <option value=\"Male\">Freshman</option>
    <option value=\"Female\">Sophomore</option>
    <option value=\"NA\">Junior</option>
    <option value=\"NA\">Senior</option>
    <option value=\"NA\">Grad School</option>
    <option value=\"NA\">I work here</option>
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
                $conn->close();




               }



            else{
                print("Passwords doesn't match");
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


    </center>


</div>
