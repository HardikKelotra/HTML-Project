<?php

$con=mysqli_connect("localhost","root","");

$acc=$_POST['acc'];
$password=$_POST['password'];

if(isset($con))
{
    echo "connection successful";
}
else
{
    die("connection error $con->eror() ");
}

$sql1="SELECT * FROM `test`.`data` WHERE `Account No.`='$acc' ";

if($result=$con->query($sql1))
{
    $check=$result->fetch_row();

    if($check[3]==$password)
    {
        $sql2="DELETE FROM `test`.`data` WHERE `Account No.`='$acc'";
        if($con->query($sql2))
        {
            printf("Account deleteed successfully !");
        }
        else
        {
            echo "Connection error $con->erro() ";
        }
    }
    else
    {
        printf("Password Incorrect !");
    }
}

$con->close();
?>