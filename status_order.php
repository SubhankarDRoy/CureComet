<?php

    require('connection.php');
    Session_start();

    $status=$_GET['status'];
    $oid=$_GET['oid'];
    echo $status;

    if($status=="confirmed-null" || $status == "rejected-null")
    {
        echo "<script type=\"text/javascript\">
                window.location.replace(\"vendor_index.php\");
            </script>";
    }
    else
    {
        $sql="UPDATE orders SET `status`='$status' where order_id=$oid";
    if(mysqli_query($con,$sql))
    {
        echo "<script type=\"text/javascript\">
            alert('Status Updated');
           window.location.replace(\"vendor_index.php\");
        </script>";
    }
    else
   {
        die('error');
    }
    }
    ?>