<?php
include_once 'dbConnection.php';
$err = "";
$err1 = "";
$err2 = "";
$err3 = "";
$result = "1234";

if(isset($_POST["search"]))
    {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (($_POST["search"])=="searchCategory" AND ($_POST["searchCategory1"])=="") 
        {
            $err1 = "* Required";
        } 
        
        if (($_POST["search"])=="searchMealType" AND ($_POST["searchMealType1"]==""))
        {
            $err2 = "* Required";
        }
        
        if (($_POST["search"])=="searchName" AND ($_POST["searchName1"]==""))
        {
            $err3 = "* Required";
        }

        if (($_POST["search"])=="searchCategory" AND ($_POST["searchCategory1"])!="") 
        {
            $searchCategory=$_POST["searchCategory1"];
            resultSearchCategory($searchCategory);
        }
        else if (($_POST["search"])=="searchMealType" AND ($_POST["searchMealType1"]!=""))
        {
            $searchMealType=$_POST["searchMealType1"];
            resultSearchMealType($searchMealType);
        }
        else if (($_POST["search"])=="searchName" AND ($_POST["searchName1"]!=""))
        {
            $searchName=$_POST["searchName1"];
            resultSearchName($searchName);
        }
        else
        {
            resultAllRecipes();
        }

    }
}

function resultAll()
{
    if(isset($_POST['search']))
    {
        $option=$_POST['search'];
        $query = "";
        switch($option)
        {
            case "searchCategory":  {
                                        $query = resultSearchCategory($_POST["searchCategory1"]); 
                                        return $query;
                                    }
            case "searchMealType": {
                                        $query = resultSearchMealType($_POST["searchMealType1"]);
                                        return $query;
                                    }
            case "searchName": {
                                    $query = resultSearchName($_POST["searchName1"]);
                                    return $query;
                                }
        }
    }
    else 
    {
        $query = resultAllRecipes();
        return $query;
    }
}

function resultSearchCategory($arg){
    $con = new mysqli('localhost','root','','ocr');
    $query1 = "select * from recipe r inner join recipecategories rc on r.rid = rc.rid where rc.cid = '$arg' order by r.rid";
    $result = mysqli_query($con,$query1);
    return $result;
}

function resultSearchMealType($arg){
    $con = new mysqli('localhost','root','','ocr');
    $query2 = "select * from recipe where mealtype='$arg'";
    $result = mysqli_query($con,$query2);
    return $result;
}

function resultSearchName($arg){
    $con = new mysqli('localhost','root','','ocr');
    $query3 = "select * from recipe where name='$arg'";
    $result = mysqli_query($con,$query3);
    return $result;
}

function resultAllRecipes(){
    $con = new mysqli('localhost','root','','ocr');
    $query4 = "select * from recipe";
    $result = mysqli_query($con,$query4);
    return $result;
}

function resultUserRecipes($arg){
    $con = new mysqli('localhost','root','','ocr');
    $query3 = "select * from recipe where uid='$arg'";
    $result = mysqli_query($con,$query3);
    return $result;
}
?>