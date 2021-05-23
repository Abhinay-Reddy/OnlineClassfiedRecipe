<?php
include_once './includes/dbConnection.php';
?>

<html>
<head>
<title>OCR Recipes</title>
<link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <ul>
        <li><a href="index.php">ONLINE CLASSIFIED RECIPES</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="homeRecipes.php" class="active">Search Recipes</a></li>
        <li style="float:right"><a href="loginpage.php">Login</a></li>
        <li style="float:right"><a href="signuppage.php">Register</a></li>
    </ul>
    <br/>
    <?php include 'includes/searchrecipe.php';?>
    <form action="#" method="POST">
        <input type="radio" name="search" value="searchCategory">
        <label>Search By Category: </label>
        <select id="searchCategory" name="searchCategory1">
            <option value="">None</option>
            <?php
                $selectCategory= "select * from category";
                $result1 = mysqli_query($con, $selectCategory);
                while($row1 = mysqli_fetch_array($result1))
                {
                    $categoryId = $row1["cid"];
                    $categoryName = $row1["categoryname"];
                    echo "<option value=".$categoryId.">$categoryName</option>";
                }					    
            ?>
        </select>
        <font color=#FF0000> <?php echo $GLOBALS['err1'];?></font>

        <input type="radio" name="search" value="searchMealType">
        <label>Search By Meal Type: </label>
        <select id="searchmealtype" name="searchMealType1">
            <option value="">None</option>
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
        <font color=#FF0000> <?php echo $GLOBALS['err2'];?></font>
        
        <input type="radio" name="search" value="searchName">
        <label>Search By Recipe Name: </label>
        <input type="text" name="searchName1">
        <font color=#FF0000> <?php echo $GLOBALS['err3'];?></font>
        <br/><br/>

        <button  type="submit"> Search </button>
    </form>

    <table border=1px style="width:100%;";>
    <tr>
        <th style="width:33.33%";>Recipe Details</th>
        <th style="width:33.33%";>Steps</th>
        <th style="width:33.33%";>Picture</th>
    </tr>
    <?php
        $q=resultAll();
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
            
            echo "<td style='height:150px;width:15%'><img src='images/recipeImages/$picturename' /></td>";
            echo '</tr>';
        }
    ?>

    </table>
    <div class="footer">
        <p>Copyright 2021-2022 @ ONLINE CLASSIFIED RECIPES. All Rights Reserved</p>
    </div>
</body>

</html>