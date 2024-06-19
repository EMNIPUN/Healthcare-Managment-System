<?php

    require_once 'config.php';



    if(isset($_POST["submit"]))
    {
        session_start();

        $uid = $_SESSION["icreid"];
        $query = "SELECT * FROM `plan` WHERE uid = '$uid'";
        $result = mysqli_query($conn,$query);

        if($result->num_rows>0)
        {
            echo "<script>alert(\"You have already subscribe a plan\")</script>";
        }
        else
        {
            $email = $_POST["email"];
            $number = $_POST["number"];
            $plan = $_POST["plan"];
        
            $sql ="INSERT INTO `plan`(`uid`, `email`, `number`, `type`) VALUES 
                    ('$uid','$email','$number','$plan')"; 
        
        
            $result = mysqli_query($conn,$sql);
        
        
            if($result)
            {
                    
                header ("Location:userdashboard.php");
        
            }      

        }
 
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cards.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Plan - Health Insurance</title>
</head>
<body>

    <header>
        <?php
            include("homeheader.php");
        ?>
    </header>



    <div class="flexp">
        <h1 >Plans</h1>
    </div>
   

    <div class="card-container">

        <div class="card">
            <h1>Silver Plan</h1>
            <p class="price"><b>Rs.2000</b>/month<br>
            <b>Rs.24,000</b>/year
            </p>
            
            <hr>
            <ul class="card-ul">
                <li> Basic hospitalization expenses</li>
                <li> Outpatient consultations</li>
                <li> Prescription medications</li>
                <li> Limited coverage for specialized treatments</li>
                <li> No Additional benefits</li>
                <li> 100+ Partner Health Care Providers</li>
            </ul>
        </div>
        
        <div class="card">
            <h1>Gold Plan</h1>
            <p class="price"><b>Rs.5000</b>/month<br>
                <b>Rs.60,000</b>/year
            </p>
            
            <hr>
            <ul class="card-ul">
                <li> Comprehensive hospitalization expenses</li>
                <li> Extensive coverage for outpatient services</li>
                <li> Prescription medications</li>
                <li> Coverage for specialized treatments</li>
                <li> Limited Additional benefits</li>
                <li> 150+ Partner Health Care Providers</li>
            </ul>
        </div>
        
        <div class="card">
            <h1>Platinum Plan</h1>
            <p class="price"><b>Rs.10,000</b>/month<br>
            <b>Rs.120,000</b>/year
            </p>
            
            <hr>
            <ul class="card-ul">
                <li> Full coverage for hospitalization expenses</li>
                <li> Comprehensive outpatient services</li>
                <li> Prescription medications</li>
                <li> Extensive coverage for specialized treatments</li>
                <li> Access to all Additional benefits</li>
                <li> 200+ Partner Health Care Providers</li>
            </ul>
        </div>
        
    </div>

    <br>
    <hr>

    <div class="getplan">

        <h1>Request a Plan</h1>
        
        <form method = "POST">

            <input type="email" id="email" placeholder="Enter your email" name="email" required>

            <input type="text" id="number" placeholder="Enter your number" name="number" >

            <select id="plan-type" name="plan">
                <option value="silver">Silver</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
            </select>

            <div class="button">
                <input type="submit" name="submit" value="Request a Plan">
            </div>
        </form>

    </div>

    <div class="bottom-container">
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>