<?php

$username="root";
$server="localhost";
$password="";

$con=mysqli_connect($server,$username,$password);

if(!isset($con))
{
    die("connection error $con->error");
}
else
{
    printf("Connection successful ");
}

$name=$_POST['name'];
$account=$_POST['number'];
$pass=$_POST['password'];

$com="SELECT * FROM `test`.`data` WHERE `Name`='$name' && `Account No.`='$account'";

if($result=$con->query($com))
{
    $row=$result->fetch_row();

    if($row[3]==$pass)
    {
        echo "Name : $row[0] <br> Current Balance : $row[2] <br> Aadhar No. : $row[4] ";
    }
    else
    {
        printf("Enter the correct Password !");
    }
}
else
{
    printf("Connection Error");
}

$con->close();

?>