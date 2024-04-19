<?php

    session_start();
    $user=$_SESSION['username'];
    $vid=$_SESSION['vid'];
    require('connection.php');


    $query="SELECT `Vendor_ID` FROM `cart` WHERE Username='$user'";
    $res=mysqli_query($con,$query);
    $arr=mysqli_fetch_array($res, MYSQLI_NUM);
    
    
    $query="Delete from cart where Username='".$user."' and Vendor_ID='$arr[0]';";
    if(mysqli_query($con,$query))
    {
        echo "
        <script type=\"text/javascript\">
            alert('Your cart has been cleared');
           window.location.replace(\"med_list.php?Vendor_ID=$vid\");
        </script>
        ";
    }
    