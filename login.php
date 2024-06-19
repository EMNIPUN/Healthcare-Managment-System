<?php
    session_start();

    require_once 'config.php';

    if(isset($_POST["login"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];


        $sql = "SELECT * FROM registeruser WHERE email='$email' and password = '$password'";
        $query = "SELECT * FROM `admin` WHERE email='$email' and password = '$password'";


        $result = mysqli_query($conn,$sql);
        $result1 = mysqli_query($conn,$query);
        
        if($result->num_rows>0)
        {
                while($row = $result->fetch_assoc()) 
                {
                    $_SESSION["icreid"] = $row['uid'];
                    $_SESSION["uid"] = $row['uname'];
                    $_SESSION["fname"] = $row['fname'];  
                    $_SESSION["lname"] = $row['lname'];
                    $_SESSION["email"] = $row['email'];
                }

                header ("Location:home.php");
            
            
        } 
        else
        {
            echo "<script>alert(\"Invalid Username or Password\");</script>";
        }

        if ($result1->num_rows>0)
        {
            header ("Location:./admin/usermanage/usermanage.php");
        }
        else
        {
            echo "<script>alert(\"Invalid admin Username or Password\");</script>";
        }


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login - Health Insurance</title>
</head>
<body>
    <div class="container">

        <div class="card">

            <div class="photo">

            </div>

            <div class="title">
                <h1>Log In</h1>
            </div>

            <form action="login.php" method="post">

                <div class="email">
                    <input type="email" id="email" name="email" placeholder="Enter your email" autocomplete="off" required>
                </div>
    
                <div class="password">
                    <input type="password" id="name" name="password" placeholder="Enter your password"  autocomplete="off" required>
                </div>

                <div class="policy">
                    <input type="checkbox">
                    <label>Remember me</label>
                </div>
    
                <div class="button">
                    <input type="submit" name="login" value="Login">
                </div>

                <div class="account">
                    <p>Don't have an account? 
                       <a href="registation.php">Sign up</a>
                    </p>
                </div>

            </form>


        </div>
    </div>
</body>
</html>