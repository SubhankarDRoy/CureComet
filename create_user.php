<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CureComet User Registration</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='login.css'>
    <script src='user_validate.js'></script>
    
</head>
<body>
    <header>
        <img class="logo" src="Images/curecomet_HQ.png" width="200px" height="150px" >

        
    </header>

    <div class="login_form">
    <center>
        <form id="create_user_form" class="form" action="user_process.php" method="POST">
            <table>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" id="fname" name="fullname"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" id="username" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" id="pass" name="password"></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" id="conpass" name="confirm_password"></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><input type="date" id="dob" name="dob"></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="text" id="phno" name="phno"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" id="email" name="email"></td>
                </tr>
                <tr>
                    <td>Home Address</td>
                    <td><input type="text" id="address" name="address"></td>
                </tr>
                <tr><td></td><td><input type="button" name="enter" value="Sign up" onclick="check_empty()"></td></tr>
            </table>
        </form>
    </center>    
    </div>
</body>
</html>