<?php
    require('connection.php');
    session_start();
    $user=$_SESSION['username'];
    $sid=$_GET['sid'];
    $status=$_GET['status'];

    if($status=="confirm")
    {
        $sql="UPDATE `counsell` SET `status`='confirm' WHERE s_id='$sid'";
        $msg="Session Accepted";
    }
    else
    {
        $sql="UPDATE `counsell` SET `status`='reject' WHERE s_id='$sid'";
        $msg="Session Rejected";
    }

    
    
    if(mysqli_query($con,$sql))
    {
        echo "
        <script type=\"text/javascript\">
            alert('$msg');
           window.location.replace(\"c_index.php\");
        </script>
        ";
    }
    else
    {
        die(mysqli_error($con));
    }