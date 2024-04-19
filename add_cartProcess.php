<?php

    session_start();
    $user=$_SESSION['username'];

    require('connection.php');

    $vid=$_GET['Vendor_ID'];
    $med_name=$_GET['medname'];

    
    $query="Select * from cart where Username='".$user."';";
    
    $cart_list=mysqli_query($con,$query);
    
    if(!$cart_list)
    {
        $arr=mysqli_fetch_array($cart_list,MYSQLI_NUM);
        echo $arr[1];

        if($vid!=$arr[1])
        {
            echo "
            <script type=\"text/javascript\">
            if(confirm(\"Your cart contains medicines from other vendor. do you want to clear it ?\")==true)
            {
                window.location.replace(\"clear_cartProcess.php\");
            }
            else
            {
                window.location.replace(\"med_list.php?Vendor_ID=$vid\");
            }
            </script>
            ";
        }
        
    }
    else
    {
        
        $query="Select * from cart where Username=$user and med_name=$med_name";
        $query="insert into cart value ($user,$vid,$med_name,1);";
    }