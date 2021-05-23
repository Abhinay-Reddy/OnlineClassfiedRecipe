<?php
include_once './includes/dbConnection.php';
session_start();
$uid = $_SESSION['uid'];
$name = $_SESSION['name'];
$email=$_SESSION['email'];
$utype = $_SESSION['utype'];
if(!(isset($_SESSION['email']))){
header("location:loginpage.php");
}
?>

<html>

<head>
<title>OCR Add Recipe</title>
<link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <ul>
        <li><a href="index.php">ONLINE CLASSIFIED RECIPES</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="myRecipesPage.php">View My Recipes</a></li>
        <li><a href="addRecipePage.php" class="active">Add My Recipe</a></li>
        <li style="float:right"><a href="./includes/logout.php">Logout</a></li>
        <li style="float:right"><a href="index.php">Welcome UserName</a></li>
    </ul>
    <br/>

    <form action="./includes/addRecipe.php" method="post">
        <table style="width:100%;">
        
        <tr>
            <th style="width:33.33%";><h2>Recipe Details:</h2></th>
            <th style="width:33.33%";><h2>Preparation Steps:</h2></th>
            <th style="width:33.33%";><h2>Category Details:</h2></th>
        </tr>
        
        <tr>
            <td>  
                </br>
                <label><b>Recipe Name: </b></label>
                <input type="text" name="recipeName">
                
                <br/><br/>
                
                <label><b>Preparation Time: </b></label>
                <input type="text" name="pTime">
                
                <br/><br/>
                
                <label><b>Cooking Time: </b></label>
                <input type="text" name="cTime">

                <br/><br/>
                
                <label><b>Servings: </b></label>
                <input type="text" name="servings">

                <br/><br/>
                
                <label><b>Meal Type: </b></label>
                <select id="mealtype" name="mealType">
                <?php
                    $selectmealtype= "select * from mealtype";
                    $result2 = mysqli_query($con, $selectmealtype);
                    while($row2 = mysqli_fetch_array($result2))
                    {
                        $mealname = $row2["mealname"];
                        echo "<option value=".$mealname.">$mealname</option>";
                    }					    
                ?>
                </select>
            </td>
            
            <td>
                <label><b>Preparation Steps: </b></label>
                
                <br/><br/>
                
                <label>Please enter steps in following format:</label>
                
                <label>Eg: step1||step2||step3</label>
                <br/><br/>
                <textarea style="width:90%;height:100px;" id="psteps" name="psteps"></textarea>

                <br/><br/>
            </td>

            <td>
                <label><b>Please select appropriate Categories:</b></label>

                <br/> <br/>

                <input type="checkbox" name="pizza" value="1">
                <label>Pizza</label><br>

                <input type="checkbox" name="superbowl" value="2">
                <label>Super Bowl</label><br>

                <input type="checkbox" name="weekday" value="3">
                <label>Weekday</label><br>

                <input type="checkbox" name="vegpizza" value="4">
                <label>Veg Pizza</label><br>

                <input type="checkbox" name="pastapizza" value="5">
                <label>Pasta Pizza</label><br>

                <input type="checkbox" name="nonvegpizza" value="7">
                <label>Non Pizza</label><br>

                <input type="checkbox" name="sides" value="6">
                <label>Sides</label><br>
            </td>
        </tr>
        <tr>
            <td>
                <br/><br/>
                <label><b>Upload Image:</b></label>
                <input type="file" name="uploadfile" value=""/>
            </td>
        </tr>
        </table>
        <br/><br/>
        <button  type="submit"> Submit Recipe </button>
    </form>
    <div class="footer">
        <p>Copyright 2021-2022 @ ONLINE CLASSIFIED RECIPES. All Rights Reserved</p>
    </div>

</body>

</html>