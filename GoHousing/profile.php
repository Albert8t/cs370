jsut aeuifae



<?php
/**
 * Created by PhpStorm.
 * User: ALIENWARE
 * Date: 2018/10/20
 * Time: 16:38
 */

if ($_get['type']== 1) {

    $id = $_POST['id'];
    $profile['FirstName'] = $_POST['FirstName'];
    $profile['LastName'] = $_POST['LastName'];
    $profile['school'] = $_POST['uni'];
    $profile['gender'] = $_POST['Gender'];
    $profile['year'] = $_POST['Year'];
    $mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");

    if (mysqli_connect_errno())            # ------ check connection error
    {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit(1);
    }

    $sex = 3;
    if ($profile['gender'] === 'male')
        $sex = 1;
    if ($profile['gender'] === 'female')


        $id = intval($id);
    $insert = "insert into profile (uid,fname,lname,school, gender,year)  values(" . $id . ",'" . $profile['FirstName'] . "','" . $profile['LastName'] . "','" . $profile['school'] . "'," . $sex . ",'" . $profile['year'] . "')";
    if ($mysqli->query($insert) === TRUE) {
        echo "Your account has been set up";
        echo('inserted');

    } else {
        //  echo "Error: " . $insert . "<br>" . $mysqli->error;
    }


    $mysqli->close();
}


if($_get['type']== 2 )
{

echo("start this");

$login['email']=$_POST['email'];
$login['pass']=$_POST['pass'];
$mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");

if (mysqli_connect_errno())            # ------ check connection error
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit(1);
}
$ifExist="select password,id from login where email='".$login['email']."'";
$result = mysqli_query($mysqli, $ifExist);
$row=$result->fetch_assoc();
if (mysqli_num_rows($result) == 0)
{echo("No account yet");
    header("Location: http://gohousin.com/signup.php");
    exit;}
    $hashed=$row['pass'];
    $signin=false;
    if(password_verify(  $login['pass'],  $hashed ))
    {$signin=true;
    $uid=$result['id'];
        echo($signin);
        echo($id);
    }
    else
    {echo("incorrect password, try again");}



$mysqli->close();}


?>





