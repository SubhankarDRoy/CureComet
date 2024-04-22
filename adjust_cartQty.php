<?php
    session_start();
    require('connection.php');

    $username=$_SESSION['username'];
    $action=$_GET['action'];
    $vid=$_GET['vid'];
    $med_name=$_GET['mn'];

    if($action=="plus")
    {
        $query="UPDATE cart SET qty=qty+1 where Username='$username' and Vendor_ID='$vid' and med_name='$med_name'";
    }
    elseif($action=="minus")
    {
        $check="SELECT qty from cart where Username='$username' and Vendor_ID='$vid' and med_name='$med_name'";
        $res=mysqli_query($con,$check);
        $arr=mysqli_fetch_array($res,MYSQLI_NUM);
        if($arr[0]==1)
        {
            $query="DELETE from cart where Username='$username' and Vendor_ID='$vid' and med_name='$med_name'";
        }
        else
        {
            $query="UPDATE cart SET qty=qty-1 where Username='$username' and Vendor_ID='$vid' and med_name='$med_name'";
        }
        
    }
    else
    {
        $query="DELETE from cart where Username='$username' and Vendor_ID='$vid' and med_name='$med_name'";
    }

    if(mysqli_query($con,$query))
    {
        header("location:cart.php");
    }
