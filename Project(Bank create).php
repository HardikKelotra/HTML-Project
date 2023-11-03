<?php

$username="root";
$userserver="localhost";
$password="";


$con=mysqli_connect($userserver,$username,$password);

$name=$_POST['name'];
$adh=$_POST['Aadhaar'];
$add=$_POST['address'];
$age=$_POST['age'];
$cont=$_POST['num'];
$ccd=$_POST['ccd'];


if(!$con)
{
    die("Connection failed");
}
else
{
    /*echo "connection successfull !";*/
}

$opt="INSERT INTO `test`.`data`  (`Name`,`Aadhaar`,`Address`,`Age`,`Contact`,`Country-Code`) VALUES ('$name','$adh','$add','$age','$cont','$ccd');";

if($con->query($opt))
{
   /* echo "Your account is created !";*/

   header( 'Location: Formation.php');
   exit;
}
else
{
    echo "some error occur";
}



$con->close();
?>