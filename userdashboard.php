<?php
    session_start();
    require_once 'config.php';

    $uid = $_SESSION["icreid"];
    $sql = "SELECT * FROM claim WHERE uid = '$uid'";
    $result = mysqli_query($conn,$sql); 


    $query = "SELECT * FROM plan WHERE uid = '$uid'";
    $result1 = mysqli_query($conn,$query); 


    if(isset($_POST["submit"]))
    {
        $uid = $_SESSION["icreid"];
    
        $sql =" DELETE FROM registeruser WHERE uid = '$uid'";

        echo "<script>alert(\"Your Account has been deleted\");</script>";
    
        if($conn->query($sql))
        {
            header ("Location:registation.php"); 
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userdashboad.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>User Profile - Health Insurance</title>
</head>
<body>

    <header>
        <?php
            include("usernav.php");
        ?>
    </header>

    <div class="dashboard">
    
        <div class="summary">

            <div class="user-details">

                    <div class="title">
                       <h2>Account Summary</h2> 
                    </div>

                    <div class="name">

                        <h3>First Name</h3>
                        <p>
                            <?php 
                                echo "{$_SESSION['fname']}"; 
                            ?>
                        </p>

                    </div>

                    <div class="name">

                        <h3>Last Name</h3>
                        <p>
                            <?php 
                                echo "{$_SESSION['lname']}"; 
                            ?>
                        </p>

                    </div>
                    
                    <div class="name">

                        <h3>Email</h3>
                        <p>
                            <?php 
                                echo "{$_SESSION['email']}"; 
                            ?>
                        </p>

                    </div>

                    <div class="button">
                        <a class="update" href="updateform.php" target="_blank" >Update</a>
                        <div class="delete">
                            <form action="userdashboard.php" method="POST">
                                <input type="submit" name = "submit" value = "Delete Account">
                            </form>
                        </div>
                    </div>
            </div>    

            <div class="details">
    
                <img src="Source/profile.png" alt="profile picture">
                <h4>
                    <?php 
                        echo "{$_SESSION['uid']}"; 
                    ?>
                </h4>

                <br><hr>

                <div class="file">
                    <a href="requestclaim.php" target="blank">+ File a Claim</a>
                </div>
                
                <div class="request-plan">
                    <p>
                        <?php
                            while ($row = mysqli_fetch_assoc($result1)) 
                            {
                                echo $row['type']." "."Plan";
                            }
                        ?>
                    </p>
                </div>

            </div>

            <div class="password-details">

                    <div class="title">
                        <h2>Change Password</h2> 
                     </div>

                    <div class="passform">
                        <form action="password-process.php" method = "POST">
                            <input type="text" name = "cur_password" placeholder="Current password"><br>
                            <input type="password" name="password" placeholder="New password"><br>
                            <input type="password" name = "cpassword" placeholder="Confirm password"><br>
                            <input type="submit" name = "submit" value = "Change password">
                        </form>
                    </div>

            </div>

        </div>

        <div class="claim">
            <div class="claim-summary">

                <h3>Claim Summary</h3>
                <table>
                    <tr class = "title">
                        <th>User Id</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Plan Type</th>
                    </tr>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            echo "<tr>";  
                            echo "<td>" . $row['uid'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['number'] . "</td>";
                            echo "<td>" . $row['plan'] . "</td>";
                            echo "</tr>"; 
                        }
                    ?>
                </table>
                
                <div class="sum-button">
                    <form action="">
                        <input type="submit" name="delete" >
                    </form>
                </div>

            </div>
        </div>
    
    </div>

    <div class="bottom-container">
        <?php
            include("footer.php");
        ?>
    </div>
    
    

<script src="js/userdashboard.js"></script>
</body>
</html>