<?php
/**
 * Created by PhpStorm.
 * User: ALIENWARE
 * Date: 2018/10/20
 * Time: 16:38
 */
print"complete";
$id=$_POST['id'];
$profile['FirstName']=$_POST['FirstName'];
$profile['LastName']=$_POST['LastName'];
$profile['school']=$_POST['uni'];
$profile['gender']=$_POST['Gender'];
$profile['year']=$_POST['Year'];

echo($profile['FirstName']);
echo('<br>');
echo($profile['LastName']);
echo('<br>');
echo($profile['school']);
echo('<br>');
echo($profile['gender']);
echo('<br>');
echo($profile['year']);
echo('<br>');
echo($profile['id']);
echo('<br>');

$mysqli = new mysqli("localhost", "root", "practicum370", "GoHousin");

if (mysqli_connect_errno())            # ------ check connection error
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit(1);
}

        $sex=3;
if($profile['gender']==='male')
    $sex=1;
if($profile['gender']==='female')


    $id=intval($id);
$insert="insert into profile (uid,fname,lname,school, gender,year)  values(".$id.",'". $profile['FirstName']."','". $profile['LastName']."','".$profile['school']."',".$sex.",'".$profile['year']."')";
if ($mysqli->query($insert) === TRUE) {
    echo "Your account has been set up";
} else {
    echo "Error: " . $insert . "<br>" . $mysqli->error;
}

echo('inserted');

$mysqli->close();



?>