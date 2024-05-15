<?php
    session_start();
    require('connection.php');
    $user=$_SESSION['username'];
    $medname=$_GET['medname'];
    $action=$_GET['action'];

    if($action=="remove")
    {
        $sql="UPDATE `med_list` SET `Available`='no' WHERE vendor_id='$user' and `Med_name`='$medname'"; 
    }
    else
    {
        $sql="UPDATE `med_list` SET `Available`='yes' WHERE vendor_id='$user' and Med_name='$medname'";
    }
    

    if(mysqli_query($con,$sql))
    {
        if($action=="remove")
        {
            echo "
                <script type=\"text/javascript\">
                    alert('Medicine marked as not available');
                   window.location.replace(\"vendor_meds.php\");
                </script>
            "; 
        }
        else
        {
            echo "
                <script type=\"text/javascript\">
                    alert('Medicine marked as available');
                   window.location.replace(\"vendor_meds.php\");
                </script>
            ";
        }
        
    }
    else
    {
        die(mysqli_error($con));
    }