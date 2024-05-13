<?php
    session_start();
    require('connection.php');

    $user_type=$_POST['login_type'];
    $user=$_POST['username'];
    $pass=$_POST['password'];

    $query="";

    if ($user_type=="User")
    {
        $query="Select Username, Password, Name from users where Username like '$user'";
    }
    else if ($user_type=="Admin")
    {
        $query="Select Admin_ID, Password, Name from admin where Admin_ID = $user";
    }
    else if ($user_type=="Doctor")
    {
        $query="Select doctor_id, Password, Name from doctors where doctor_id like '$user'";
    }
    else if ($user_type=="DeliveryPerson")
    {
        $query="Select DP_ID, Password, Name from deliveryperson where DP_ID like '$user'";
    }
    else if ($user_type=="Vendor")
    {
        $query="Select Vendor_ID, Password, Name from vendor where Admin_ID like '$user'";
    }
    else if ($user_type=="Counsellor")
    {
        $query="Select Coun_ID, Password, Name from counsellor where Coun_ID like '$user'";
    }

    $cred=mysqli_query($con, $query);
    
    if(!$cred)
    {
        echo "User Not found";
        echo "<a href='login.php'>Go back to login page</a>";
    }
    else
    {
        $arr=mysqli_fetch_array($cred,MYSQLI_BOTH);
	
	    if($user==$arr[0] && $pass==$arr[1])
    	{
            $_SESSION["username"] = $user;
            $_SESSION["name"] = $arr[2];
            switch($user_type)
           {
                case 'User': header('Location:user_index.php');
                                break;

                case 'Doctor': header('Location:doctor_index.php');
                           break;

                 case 'Vendor': header('Location:vendor_index.php');
                            break;

                case 'Admin': header('Location:admin_index.php');
                         break;

                case 'DeliverPerson': header('Location:dp_index.php');
                             break;

                case 'Counsellor': header('Location:coun_index.php');
                                 break;
            }
	    }
        else
        {
            echo "Wrong Username/Password";
            echo "<a href='login.php'>Go back to login page</a>";
        }
    }
	
