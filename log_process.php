<?php
    require('connection.php');

    $user_type=$_POST['login_type'];
    $user=$_POST['username'];
    $pass=$_POST['password'];

    $query="";

    if ($user_type=="User")
    {
        $query="Select Username, Password from users where Username like '$user'";
    }
    else if ($user_type=="Admin")
    {
        $query="Select Admin_ID, Password from users where Admin_ID like '$user'";
    }
    else if ($user_type=="Doctor")
    {
        $query="Select Doc_ID, Password from users where Doc_ID like '$user'";
    }
    else if ($user_type=="DeliveryPerson")
    {
        $query="Select DP_ID, Password from users where DP_ID like '$user'";
    }
    else if ($user_type=="Vendor")
    {
        $query="Select Vendor_ID, Password from users where Admin_ID like '$user'";
    }
    else if ($user_type=="Counsellor")
    {
        $query="Select Coun_ID, Password from users where Coun_ID like '$user'";
    }

    $cred=mysqli_query($con, $query);
	$arr=mysqli_fetch_array($cred,MYSQLI_BOTH);
	
	if($user==$arr[0] && $pass==$arr[1])
	{
		header('Location:user_index.php');
	}
	else
	{
		echo "Wrong Username/Password";
	}
