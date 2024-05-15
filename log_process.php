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
    else if ($user_type=="Doctor")
    {
        $query="Select doctor_id, Password, Name from doctors where doctor_id like '$user'";
    }
    else if ($user_type=="DeliveryPerson")
    {
        $query="Select dp_id, password, Name from delivery_person where dp_id like '$user'";
    }
    else if ($user_type=="Vendor")
    {
        $query="Select Vendor_ID, Password, Name from vendor where Vendor_ID like '$user'";
    }
    else if ($user_type=="Counsellor")
    {
        $query="Select c_id, Password, Name from counsellor where c_id like '$user'";
    }
    else
    {
        $query="Select lab_id, password, lab_name from labs where lab_id like '$user'";
    }

    $cred=mysqli_query($con, $query);
    
    if(!$cred)
    {
        echo "
                <script type=\"text/javascript\">
                    alert('User Not found');
                   window.location.replace(\"login.php\");
                </script>
            ";
        
    }
    else
    {
        $arr=mysqli_fetch_array($cred,MYSQLI_BOTH);
	
	    if($user==$arr[0] && $pass==$arr[1])
    	{
            
            
            switch($user_type)
            {
                case 'User':    $_SESSION["username"] = $user;
                                $_SESSION["name"] = $arr[2];
                                header('Location:user_index.php');
                                break;

                case 'Doctor':  $_SESSION["doc_id"] = $user;
                                $_SESSION["doc_name"] = $arr[2];
                                header('Location:doctor_index.php');
                                break;

                 case 'Vendor': $_SESSION["vid"] = $user;
                                $_SESSION["vname"] = $arr[2];
                                header('Location:vendor_index.php');
                                break;

                case 'DeliveryPerson':  $_SESSION["dp_id"] = $user;
                                        $_SESSION["dp_name"] = $arr[2];
                                        header('Location:dp_index.php');
                                        break;

                case 'Counsellor':  $_SESSION["c_id"] = $user;
                                    $_SESSION["c_name"] = $arr[2];
                                    header('Location:c_index.php');
                                    break;
                case 'Lab': $_SESSION["lab_id"] = $user;
                            $_SESSION["lab_name"] = $arr[2];
                            header('Location:lab_index.php');
                            break;
                default:echo $user_type;
            }
	    }
        else
        {
            echo "
                <script type=\"text/javascript\">
                    alert('Wrong Username/Password');
                   window.location.replace(\"login.php\");
                </script>
            ";
            
        }
    }
	
