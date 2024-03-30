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
        $query="Select Admin_ID, Password from admin where Admin_ID = $user";
    }
    else if ($user_type=="Doctor")
    {
        $query="Select Doc_ID, Password from doctor where Doc_ID like '$user'";
    }
    else if ($user_type=="DeliveryPerson")
    {
        $query="Select DP_ID, Password from deliveryperson where DP_ID like '$user'";
    }
    else if ($user_type=="Vendor")
    {
        $query="Select Vendor_ID, Password from vendor where Admin_ID like '$user'";
    }
    else if ($user_type=="Counsellor")
    {
        $query="Select Coun_ID, Password from counsellor where Coun_ID like '$user'";
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
            switch($user_type)
           {
                case 'User': header('Location:user_index.php');
                                break;

                case 'Doctor': header('Location:doc_index.php');
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
	
