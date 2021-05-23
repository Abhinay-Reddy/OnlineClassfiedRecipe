<html>

<head>
<title>OCR Login</title>
<link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <ul>
        <li><a href="index.php">ONLINE CLASSIFIED RECIPES</a></li>
        <li><a href="index.php">Home</a></li>
        <li style="float:right" class="active" ><a href="loginpage.php">Login</a></li>
        <li style="float:right"><a href="signuppage.php">Register</a></li>
    </ul>

    <form action="./includes/login.php" method="post">
    
        <div class="center">
            <h1>Login Form</h1>
            <select name="logintype">
                <option value="1">Email ID</option>
                <option value="2">User Name</option>
            </select>
            <br/><br/>
            <label><b>Input Login Data</b></label>
            <input type="text" name="uname" required>
            <br/><br/>
            
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br/><br/>
            <button type="submit">Login</button>
            
            <span><a href="#">Forgot Password?</a></span>

        </div>

    </form>

    <div class="footer">
        <p>Copyright 2021-2022 @ ONLINE CLASSIFIED RECIPES. All Rights Reserved</p>
    </div>
</body>

</html>