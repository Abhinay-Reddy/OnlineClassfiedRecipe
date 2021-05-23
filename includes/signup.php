<?php
include_once './dbConnection.php';
ob_start();
$name = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$utype = 2;

if(($password==$cpassword))
{
    $resut=mysqli_query($con,"INSERT INTO users (name , email , password , utype) VALUES  ('$name' , '$email' , '$password' , '$utype')");
    header("location:../loginpage.php");
}  
else if ($password!=$cpassword)
{
    echo "<script>alert('Passwords are not matching. Please renter the passwords')</script>";
    header("<script>location.href='../signuppage.php'</script>");
}
else
{
    echo "<script>alert('User already registered with this email')</script>";
    header("<script>location.href='../signuppage.php'</script>");
}
?>