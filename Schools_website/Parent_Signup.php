<?php
require_once ('Connect.php');
include "header.php";

$fname = $_POST['fname'];
$lname= $_POST['lname'];
$email = $_POST['email'];
$home=$_POST['home'];
$city = $_POST['city'];
$street = $_POST['street'];
$block = $_POST['block'];
$username = $_POST['username'];
$password = $_POST['password'];
$zipcode = $_POST['zipcode'];
$mobile = $_POST['mobile'];
//Register_Parent(fname VARCHAR(50), lname VARCHAR(50),email VARCHAR(100), home VARCHAR(20),city VARCHAR(30),
//street VARCHAR(30), blk VARCHAR(10), username VARCHAR(50), password VARCHAR(50), zipcode VARCHAR(10))

$s_validate = mysqli_query($conn,"Select * from Parents where username = '{$username}'");
$e_validate = mysqli_query($conn,"Select * from Parents where email = '{$email}'");

if(!($s_validate->num_rows) && !($e_validate->num_rows)) {
    $apply = $conn->prepare("call Register_Parent(?,?,?,?,?,?,?,?,?,?)");
    $apply->bind_param('ssssssssss',$fname,$lname,$email,$home,$city,$street,$block,$username,$password,$zipcode);
    $apply->execute();
    $apply->free_result();
    if($mobile)
    {
        $apply = $conn->prepare("call Register_Parent_Mobile(?,?)");
        $apply->bind_param('ss',$mobile,$username);
        $apply->execute();
    }
    if (!$apply) {
        echo $conn->errno . " " . $conn->error;
    } else {
        header("location: Success.php");
        die();
    }
}else
{
    echo "Username or email already exist. " . $conn->errno . " " . $conn->error;
}

?>