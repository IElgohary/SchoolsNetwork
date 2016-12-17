<?php
include "header.php";
require_once ('Connect.php');


$username = $_POST['username'];
$password = $_POST['password'];
$class = $_POST['class'];
$flag = true;
if($class == 'Parent')
    $query = "SELECT * from Parents where username='{$username}' AND password = '{$password}'";
elseif($class=='Teacher')
    $query = "SELECT * from Employees E INNER JOIN Teachers T on T.ssn = E.ssn
              where username='{$username}' AND password = '{$password}'";
elseif ($class == 'Student')
    $query = "SELECT * from Students where username='{$username}' AND password = '{$password}'";
elseif ($class == 'Admin')
    $query = "SELECT * from Employees E INNER JOIN Admins A on A.ssn = E.ssn
              where username='{$username}' AND password = '{$password}'";
else $flag = false;

if($flag) {
    $result = $conn->query($query) or Die("Error: " . $conn->error);
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['class'] = $class;
        if ($class == 'Teacher' || $class == 'Student' || $class='Admin') {
            $_SESSION['ssn'] = $result->fetch_array()[0];
//            echo $_SESSION['ssn'];
        }
        if($_SESSION['class']!='Admin')
        header("Location: index.php");
        else
            header("Location:admin.php");
        die();
    } else {
        echo "User Does not exist. ". $conn->error;
    }
}else
    echo "Please Choose A Class";
?>