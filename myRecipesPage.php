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
<title>OCR My Recipes</title>
<link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <ul>
        <li><a href="index.php">ONLINE CLASSIFIED RECIPES</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="myRecipesPage.php"  class="active">View My Recipes</a></li>
        <li><a href="addRecipePage.php">Add My Recipe</a></li>
        <li style="float:right"><a href="./includes/logout.php">Logout</a></li>
        <li style="float:right"><a href="index.php">Welcome <?php echo "$name"; ?></a></li>
    </ul>
    <br/>

    <?php include 'includes/searchrecipe.php';?>

    <table border=1px style="width:100%;";>
    <tr>
        <th style="width:33.33%";>Recipe Details</th>
        <th style="width:33.33%";>Steps</th>
        <th style="width:33.33%";>Picture</th>
    </tr>
    <?php
        $q=resultUserRecipes($uid);
        while($row=mysqli_fetch_array($q))
        {
            $rid = $row['rid'];
            $name = $row['name'];
            $rdate = $row['rdate'];
            $ptime = $row['ptime'];
            $ctime = $row['ctime'];
            $servings = $row['servings'];
            $psteps = $row['psteps'];
            $mealtype = $row['mealtype'];
            $picturename = $row['picturename'];
            $rating = $row['rating'];

            $categoriesquery = "select cid from recipecategories where rid=$rid";
            $categories = mysqli_query($con,$categoriesquery);

            echo '<tr><td><label><b>Recipe Id: &nbsp;</b>'.$rid.'</label>';
            echo '<br/><br/>';

            echo '<tr><td><label><b>Recipe Name: &nbsp;</b>'.$name.'</label>';
            echo '<br/><br/>';
            
            echo '<label><b>Recipe Date: &nbsp;</b>'.$rdate.'</label>';
            echo '<br/><br/>';

            echo '<label><b>Preparation Time: &nbsp;</b>'.$ptime.'</label>';
            echo '<br/><br/>';

            echo '<label><b>Cooking Time: &nbsp;</b>'.$ctime.'</label>';
            echo '<br/><br/>';

            echo '<label><b>Serving: &nbsp;</b>'.$servings.'People</label>';
            echo '<br/><br/>';

            echo '<label><b>Meal Type: &nbsp;</b>'.$mealtype.'</label>';
            echo '<br/><br/>';

            echo '<label><b>Categories: &nbsp;</b><br/></br>';
            while($row1=mysqli_fetch_array($categories)){
                if($row1['cid'] == 1)
                {
                    echo "Pizza";
                    echo "<img width='80' height='60' src='images/categoryImages/pizza.jpg'/>";
                }
                else if($row1['cid'] == 2)
                {
                    echo "Super Bowl";
                    echo "<img width='80' height='60' src='images/categoryImages/superbowl.jpg'/>";
                }   
                else if($row1['cid'] == 3)
                {
                    echo "Weekday";
                    echo "<img width='80' height='60' src='images/categoryImages/weekday.jpg'/>";
                }
                else if($row1['cid'] == 4)
                {
                    echo "Veg Pizza";
                    echo "<img width='80' height='60' src='images/categoryImages/vegpizza.jpg'/>";
                }
                else if($row1['cid'] == 5)
                { 
                    echo "Pasta Pizza";
                    echo "<img width='80' height='60' src='images/categoryImages/pastapizza.jpg'/>";
                }
                else if($row1['cid'] == 7)
                {
                    echo "Non Veg Pizza";
                    echo "<img width='80' height='60' src='images/categoryImages/nonvegpizza.jpg'/>";
                }
                else 
                {
                    echo "Sides";
                    echo "<img width='80' height='60' src='images/categoryImages/sides.jpg'/>";
                }
                echo '<br/><br/>';
            }
            echo '</label>';

            echo '<label><b>Rating: &nbsp;</b>'.$rating.'out of 5 </label>';
            echo '<br/><br/><br/><br/></td>';


            $steps=explode("||",$psteps);
            $noOfSteps=count($steps);
            echo '<td><b>Preparation Steps:</b><br/><br/>';
            
            for($i=1;$i<$noOfSteps;$i++){
                echo "<label>Step &nbsp;$i:&nbsp; $steps[$i]</label><br/>";
            }

            echo '</td>';
            echo "<td style='height:250px;width:15%'><img src='images/recipeImages/$picturename' /></td>";
            echo '</tr>';
        }
    ?>

    </table>
   
    <div class="footer">
        <p>Copyright 2021-2022 @ ONLINE CLASSIFIED RECIPES. All Rights Reserved</p>
    </div>
</body>

</html>