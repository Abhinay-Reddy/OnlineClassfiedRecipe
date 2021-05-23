<html>

<head>
<title>OCR Signup</title>
<link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <ul>
        <li><a href="index.php">ONLINE CLASSIFIED RECIPES</a></li>
        <li><a href="index.php">Home</a></li>
        <li style="float:right"><a href="loginpage.php">Login</a></li>
        <li style="float:right"  class="active"><a href="signuppage.php">Register</a></li>
    </ul>

    <form action="./includes/signup.php" method="post">
    
        <div class="center">
            <h1>Registration Form</h1>

            <label><b>Username</b></label>
            <input type="text" name="uname" required>
            <br/><br/>

            <label><b>Email ID</b></label>
            <input type="text" name="email" required>
            <br/><br/>
            
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br/><br/>

            <label><b>Confirm Password</b></label>
            <input type="password" placeholder="Re-Enter Password" name="cpassword" required>
            <br/><br/>

            <button type="submit">Sign Up</button>
        </div>

    </form>

    <div class="footer">
        <p>Copyright 2021-2022 @ ONLINE CLASSIFIED RECIPES. All Rights Reserved</p>
    </div>
</body>

</html>