<?php

$username="root";
$server="localhost";
$password="";

$con=mysqli_connect($server,$username,$password);

$acc1=$_POST['acc1'];
$acc2=$_POST['acc2'];
$amm=$_POST['amm'];
$pass=$_POST['password'];


if(!$con)
{
    die("Sorry connection can't be done !");
}
else
{
    /*echo"Connection successful ";*/
    session_start();
    $_SESSION['flag']=0;
}

$sql1="SELECT * FROM `test`.`data` WHERE `Account No.`='$acc1';";
$sql2="SELECT * FROM `test`.`data` WHERE `Account No.`='$acc2';";

if($result=$con->query($sql2))
{
    $data2=$result->fetch_row();
    $amm2=$data2[2];
}
else
{
    echo "Some error Occured $con->error() " ;
}

if($result=$con->query($sql1))
{
    $data1=$result->fetch_row();
    if($data1[3]==$pass)
    $amm1=$data1[2];
    else
    {
        /*die("Wrong Password Please Enter Correct Password !");*/
        $_SESSION['flag']=-1;
    }
}
else
{
    /*die("some error occured $con->error() ");*/
}

if($amm1<$amm)
{
    /*die("Sorry this transaction can't be processed insufficient balance ");*/
    $_SESSION['flag']=2;
}
else
{
    $new=$amm1-$amm;
    $new1=$amm2+$amm;

    $newc="UPDATE `test`.`data` SET `Current Balance`='$new' WHERE `Account No.`='$acc1'";
    $newc1="UPDATE `test`.`data` SET `Current Balance`='$new1' WHERE `Account No.`='$acc2'";

    if($con->query($newc) && $con->query($newc1))
    {
        /*echo"Transection successful !";*/
        $_SESSION['flag']=1;
    }
    else
    {
        echo"Some error occured $con->error() ";
    }
}

$con->close();
?>