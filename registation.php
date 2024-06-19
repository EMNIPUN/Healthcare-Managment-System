<?php
    session_start();
    require_once 'config.php';

    if(isset($_POST["submit"]))
    {
        $uid = $_POST["uid"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $number = $_POST["number"];
        $address = $_POST["address"];
        $gender = $_POST["gender"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];


        $sql = "INSERT INTO registeruser(uname,fname,lname,email,age,number,address,gender,password,cpassword) VALUES
        ('$uid','$fname','$lname','$email','$age','$number','$address','$gender','$password','$cpassword')";


        $result = mysqli_query($conn,$sql);


            
        if($result)
        {

            $_SESSION["uid"] = $uid;
            $_SESSION["fname"] = $fname;
            $_SESSION["lname"] = $lname;
            $_SESSION["email"] = $email;
            
            header ("Location:login.php");

        }
        else
        {
            header("Location:registation.php");
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registation.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Registation - Health Insurance</title>
</head>
<body>
    
    <div class="container">

        <div class="card">

            <div class="title">
                <h1>Registation Form</h1>
            </div>

            <form method="POST" action = "registation.php">

                <div class="userid">
                    <label for="uid">User Id</label> <br>
                    <input type="text" id="uid" name="uid" placeholder="Enter your first name" required>
                </div>

                <div class="fname">

                    <div class="name">
                        <label for="name">First Name</label> <br>
                        <input type="text" id="name" name="fname" placeholder="Enter your first name" required>
                    </div>
    
                    <div class="name">
                        <label for="name">Last Name</label> <br>
                        <input type="text" id="name" name="lname" placeholder="Enter your last name" required>
                    </div>

                </div>

                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="details">

                    <div class="age">
                        <label for="age">Age</label> <br>
                        <input type="text" id="age" name="age" placeholder="Enter your age" required>
                    </div>

                    <div class="number">
                        <label for="number">Phone Number</label> <br>
                        <input type="text" id="number" name="number" placeholder="Enter your number" required>                    
                    </div>
    
                </div>

                <div class="address">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address" required>
                </div>

                <div class="gender">

                    <div class="title">
                        <label><strong>Gender</strong></label> <br>
                    </div>

                    <div class="male">
                        <input type="radio" id="g1" name="gender" value="male">
                        <label for="g1">Male</label>
                            
                    </div>
    
                    <div class="female">
                        <input type="radio" id="g1" name="gender" value="female">
                        <label for="g1">Female</label>
                            
                    </div>


                </div>
                
                <br>
                <hr>

                <div class="password">
                    <div class="pass">
                        <label for="name">Password</label> <br>
                        <input type="password" id="name" name="password" placeholder="Enter your password" required>
                    </div>
    
                    <div class="pass">
                        <label for="name">Confirm Password</label> <br>
                        <input type="password" id="name" name="cpassword" placeholder="Confirm your password" required>
                    </div>    

                </div>

                <div class="button">
                    <input type="submit" name ="submit" value="submit">
                </div>

                <div class="account">
                    <p>Already have an account? 
                       <a href="login.php">Signin</a>
                    </p>
                </div>
            </form>
        </div>

    </div>


</body>
</html>
