<?php
    require("sql_clean.php");
    require("connection.php");

    #step-1 of validation checking for empty fields
	if(empty($_POST['fullname']))
	{
		die("Name field cannot be blank");
	}
	if(empty($_POST['username']))
	{
		die("Username cannot be blank");
	}
	if(empty($_POST['password']))
	{
		die("Password cannot be blank");
	}
    if(empty($_POST['phno']))
	{
		die("Phone Number field cannot be blank");
	}
    if(empty($_POST['email']))
	{
		die("Email field cannot be blank");
	}
    if(empty($_POST['address']))
	{
		die("Address field cannot be blank");
	}

	#step-2 of validation sanitising the data inputs
	$name=mysqlclean($_POST,'fullname',80,$con);
	$username=mysqlclean($_POST,'username',80,$con);
	$password=mysqlclean($_POST,'password',80,$con);
	$phno=mysqlclean($_POST,'phno',50,$con);
	$dob=mysqlclean($_POST,'dob',50,$con);
	$email=mysqlclean($_POST,'email',50,$con);
	$address=mysqlclean($_POST,'address',50,$con);

    
    $res=mysqli_query($con,"Select Username, PhoneNumber from users;");

    while($un=mysqli_fetch_array($res, MYSQLI_BOTH))
    {
        if ($un[0]==$username)
        {
            echo "Username already taken";
        }
        else if($un[1]==$phno)
        {
            echo "User already exists";
        }
		else
		{
			$query="insert into users(Name,Username,Password,DoB,PhoneNumber,Email,Address) values('$name','$username','$password','$dob','$phno','$email','$address');";

    		if(mysqli_query($con, $query))
    		{
    		    echo "Account Created";
    		    echo "<br><br> <a href='login.php'>Go to Login Page</a>";
    		}
		}
    }

    

