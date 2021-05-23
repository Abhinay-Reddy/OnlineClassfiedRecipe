<?php
include_once './dbConnection.php';
$logintype = $_POST['logintype'];
$loginname = $_POST['uname'];
$password = $_POST['password'];

if($logintype==1)
{
    $result = mysqli_query($con,"SELECT email FROM users WHERE email = '$loginname' and password = '$password'") or die('Error');
    $userdata = mysqli_query($con,"SELECT * FROM users WHERE email = '$loginname' and password = '$password'") or die('Error');
}
else
{
    $result = mysqli_query($con,"SELECT name FROM users WHERE name = '$loginname' and password = '$password'") or die('Error');
    $userdata = mysqli_query($con,"SELECT * FROM users WHERE name = '$loginname' and password = '$password'") or die('Error');
}

$row = mysqli_fetch_array($userdata);
$count=mysqli_num_rows($result);

if($count==1){
    session_start();
    $_SESSION["uid"] = $row['uid'];
    $_SESSION["name"] = $row['name'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["password"] = $row['password'];
    $_SESSION["utype"] = $row['utype'];
    if($utype=2)
        header("location:../dashboard.php");
}
else
{
    echo "<script>alert('Username or Password incorrect')</script>";
    echo "<script>location.href='../loginpage.php'</script>";
}
?>
