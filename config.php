<?php

    $conn=mysqli_connect("localhost","root","","healthcareinsurance");

    if(!$conn)
    {
        die("Coonection error".mysqli_connect_error());
    }

?>