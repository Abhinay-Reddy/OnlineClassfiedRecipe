<?php
session_start();
include_once './dbConnection.php';
$uid = $_SESSION['uid'];
$logintype = $_POST['recipeName'];
$pTime = $_POST['pTime'];
$cTime = $_POST['cTime'];
$servings = $_POST['servings'];
$psteps = $_POST['psteps'];
$mealType = $_POST['mealType'];
$rating = 0;
$rid = 1;
$cid = 1;

$filename = basename($_FILES['uploadfile']['name']);
$folder = "./$filename";
$tempname = $_FILES["uploadfile"]["tmp_name"];

move_uploaded_file($tempname, $folder);

$query = "INSERT INTO recipe ( uid, name, rdate, ptime, ctime, servings, psteps, mealtype, rating, picturename) 
            VALUES ('$uid','$logintype', NOW(),'$pTime','$cTime','$servings','$psteps','$mealType','$rating', '$filename')";
$result = mysqli_query($con,$query) or die('Error');

$query2 = "SELECT * FROM recipe where name='$logintype' AND uid=$uid";
$result2 = mysqli_query($con,$query2) or die('Error');

while($row2 = mysqli_fetch_array($result2))
{
    $rid = $row2["rid"];
}

if(isset($_POST['pizza']))
{
$query4 = "INSERT INTO recipecategories (cid,rid) VALUES (1,'$rid')";
$result4 = mysqli_query($con,$query4);
}

if(isset($_POST['superbowl']))
{
$query5 = "INSERT INTO recipecategories (cid,rid) VALUES (2,'$rid')";
$result5 = mysqli_query($con,$query5);
}

if(isset($_POST['weekday']))
{
$query6 = "INSERT INTO recipecategories (cid,rid) VALUES (3,'$rid')";
$result6 = mysqli_query($con,$query6);
}

if(isset($_POST['vegpizza']))
{
$query7 = "INSERT INTO recipecategories (cid,rid) VALUES (4,'$rid')";
$result7 = mysqli_query($con,$query7);
}

if(isset($_POST['pastapizza']))
{
$query8 = "INSERT INTO recipecategories (cid,rid) VALUES (5,'$rid')";
$result8 = mysqli_query($con,$query8);
}

if(isset($_POST['sides']))
{
$query10 = "INSERT INTO recipecategories (cid,rid) VALUES (6,'$rid')";
$result10 = mysqli_query($con,$query10);
}

if(isset($_POST['nonvegpizza']))
{
$query9 = "INSERT INTO recipecategories (cid,rid) VALUES (7,'$rid')";
$result9 = mysqli_query($con,$query9);
}

if($result)
 {
    header("location:../dashboard.php");
 }
 else
 {
    echo "<script>alert('Error !')</script>";
    header("<script>location.href='../addRecipepage.php'</script>");
 }
?>