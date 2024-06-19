<?php
    session_start();
    require_once 'config.php';
    // require_once 'function.php';
    
    if(isset($_POST["submit"]))
    {
        $uid = $_SESSION["icreid"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

    
        $sql =" UPDATE registeruser SET password = '$password', cpassword = '$cpassword'WHERE uid = '$uid'";

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