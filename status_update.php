<?php

    require('connection.php');
    Session_start();

    $status=$_GET['status'];
    $aid=$_GET['aid'];
    echo $status;

    if($status=="confirmed-null" || $status == "rejected-null")
    {
        echo "<script type=\"text/javascript\">
                window.location.replace(\"doctor_index.php\");
            </script>";
    }
    else
    {
        $sql="UPDATE appointments SET `status`='$status' where appointment_id=$aid";
    if(mysqli_query($con,$sql))
    {
        echo "<script type=\"text/javascript\">
            alert('Status Updated');
           window.location.replace(\"doctor_index.php\");
        </script>";
    }
    else
   {
        die('error');
    }
    }
    ?>