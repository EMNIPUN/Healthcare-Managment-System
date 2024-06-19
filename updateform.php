<?php
    session_start();
    require_once 'config.php';
    // require_once 'function.php';

    if(isset($_POST["submit"]))
    {
        $uid = $_SESSION["icreid"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
    
        $sql =" UPDATE registeruser SET fname = '$fname', lname = '$lname',email ='$email' WHERE uid = '$uid'";

        $result = mysqli_query($conn,$sql);

        if(!$result)
        {
            echo "error";
        }
        else
        {
            header ("Location:login.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/updateform.css">
    <title>Document</title>
</head>
<body>
    <div class="container">

        <div class="card">

            <div class="title">
                <h1>Update Details</h1>
            </div>

            <form action="updateform.php" method="post">

                <div class="userid">
                    <label for="uid">New First Name</label> <br>
                    <input type="text" id="fname" name="fname" placeholder="Enter your first name" required>
                </div>

                <div class="userid">
                    <label for="uid">New Last Name</label> <br>
                    <input type="text" id="uid" name="lname" placeholder="Enter your first name" required>
                </div>

                <div class="userid">
                    <label for="email">New Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
    

                <div class="button">
                    <input type="submit" name="submit" value="Update">
                </div>

            </form>


        </div>
    </div>
</body>
</html>