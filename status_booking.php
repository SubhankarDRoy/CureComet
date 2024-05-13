<?php

    require('connection.php');
    Session_start();

    $status=$_GET['status'];
    $bid=$_GET['bid'];
    echo $status;

    if($status=="confirmed-null" || $status == "rejected-null")
    {
        echo "<script type=\"text/javascript\">
                window.location.replace(\"lab_index.php\");
            </script>";
    }
    else
    {
        $sql="UPDATE test_booking SET `status`='$status' where booking_id=$bid";
    if(mysqli_query($con,$sql))
    {
        echo "<script type=\"text/javascript\">
            alert('Status Updated');
           window.location.replace(\"lab_index.php\");
        </script>";
    }
    else
   {
        die('error');
    }
    }
    ?>