<?php
    session_start();
    require_once 'config.php';

    if(isset($_POST["submit"]))
    {
        $uid = $_SESSION["icreid"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $plan = $_POST["plan"];
        $comments = $_POST["comment"];


        $sql = "INSERT INTO `claim`(`uid`, `email`, `number`, `plan`, `details`) VALUES
               ('$uid','$email','$number','$plan','$comments')";


        $result = mysqli_query($conn,$sql);


            
        if($result)
        {
            
            header ("Location:userdashboard.php");

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
    <link rel="stylesheet" href="css/requestclaim.css">
    <title>Request Claim- Health Insurance</title>
</head>
<body>
    <?php
        include("homeheader.php");
    ?>
    <main>
        <h1>Request Claim</h1>
        <form action="requestclaim.php" method = "POST">

            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Enter your email" name="email" required>

            <label for="number">Number:</label>
            <input type="text" id="number" placeholder="Enter your number" name="number" >

            <label for="plan-type">Type of Plan:</label>
            <select id="plan-type" name="plan">
                <option value="silver">Silver</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
            </select>


            <label for="comments">Additional Comments:</label>
            <textarea id="comments" placeholder="Enter additional details of your claim" name="comments" rows="4"></textarea>

            <div class="button">
                <input type="submit" name="submit" value="Request Claim">
            </div>
        </form>
    </main>
</body>
</html>