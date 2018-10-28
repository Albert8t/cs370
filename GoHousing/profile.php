<?php
/**
 * Created by PhpStorm.
 * User: ALIENWARE
 * Date: 2018/10/20
 * Time: 16:38
 */
print"complete";
session_start();
$profile['FirstName']=$_POST['FirstName'];
$profile['LastName']=$_POST['LastName'];
$profile['school']=$_POST['uni'];
$profile['gender']=$_POST['Gender'];
$profile['year']=$_POST['Year'];
$id=$_SESSION['id'];
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
echo($id);
echo('<br>');


?>