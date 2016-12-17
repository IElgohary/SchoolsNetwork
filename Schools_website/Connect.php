<?php
$conn =new mysqli('localhost','root','admin','School_Network');
if (mysqli_connect_errno())
{
    echo 'Error: ' . mysqli_connect_error();

}
?>