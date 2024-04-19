<?php

    session_start();
    $user=$_SESSION['username'];

    require('connection.php');

    $vid=$_GET['Vendor_ID'];
    $med_name=$_GET['medname'];

    
    $query="SELECT `Username`, `Vendor_ID`, `med_name`, `qty` FROM `cart` WHERE Username='$user'";
    
    $cart_list=mysqli_query($con,$query);
    $arr=mysqli_fetch_array($cart_list,MYSQLI_NUM);

    if($cart_list)
    {
        
        if($vid!=$arr[1])
        {
            
            $_SESSION['vid']=$vid;
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
    
    $c=0;
    do
    {
        if($arr[2]==$med_name)
        {   
            $c++;
            $query="Update cart set qty=$arr[3]+1 where med_name='$med_name' and Username='$user' and Vendor_ID='$vid'";
            if(mysqli_query($con,$query))
            {
                echo "
                    <script type=\"text/javascript\">
                        alert('Item updated in the cart');
                        window.location.replace(\"med_list.php?Vendor_ID=$vid\");
                    </script>
                ";
            }
        }
        
    }
    while($arr=mysqli_fetch_array($cart_list,MYSQLI_NUM));
    if($c==0)
    {
        $query="INSERT INTO `cart`(`Username`, `Vendor_ID`, `med_name`, `qty`) VALUES ('$user','$vid','$med_name','1');";
        if(mysqli_query($con,$query))
        {
            echo "
                <script type=\"text/javascript\">
                    alert('Item added to the cart');
                   window.location.replace(\"med_list.php?Vendor_ID=$vid\");
                </script>
            ";
        }
    }