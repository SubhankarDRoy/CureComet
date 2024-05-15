<?php
    require('connection.php');
    session_start();
    $user=$_SESSION['dp_id'];
    $oid=$_GET['oid'];
    $status=$_GET['status'];

    if($status=="delivered")
    {
        $sql="UPDATE `orders` SET `status`='order delivered' WHERE order_id='$oid'";
        $msg="Order delivered";
    }
    else
    {
        $sql="UPDATE `orders` SET `dp_id`='$user',`status`='delivery person assigned' WHERE order_id='$oid'";
        $msg="Delivery Accepted";
    }

    
    
    if(mysqli_query($con,$sql))
    {
        echo "
        <script type=\"text/javascript\">
            alert('$msg');
           window.location.replace(\"dp_index.php\");
        </script>
        ";
    }
    else
    {
        die(mysqli_error($con));
    }