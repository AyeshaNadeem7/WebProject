<?php
    session_start();
    if(isset($_REQUEST["submit"])){
        $username = $_REQUEST["username"];
        $con = mysqli_connect("localhost","root","","test");
        // if($con) { echo "connected"; } else { echo "not connected"; }
        $queryLogin = "SELECT * FROM users WHERE username = '".$username."'";
        $result = mysqli_query($con, $queryLogin);
        // if($result) { echo "executed"; } else { echo "not executed"; }
        if(mysqli_num_rows($result) > 0) { 
            // echo "Login success"; 
            $_SESSION["login"] = true;
            // $_SESSION["role"] = $result["role"];

            header("location:index.php");
        } else { 
            
            // $_SESSION["login"] = false;
            echo "Invalid User"; 
            // header("location:login.php?status=0");
        }
        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a></p>
    <script src="js/login.js"></script>
</body>
</html>