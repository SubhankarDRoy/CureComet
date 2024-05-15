<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CureComet User Registration</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='user_validate.js'></script>
    
</head>
<body>
    <header>
        <img class="logo" src="Images/curecomet_HQ.png" width="200px" height="150px" >

        
    </header>
    <br><br>
    <div class="login_form">
    <center>
        <form id="create_user_form" class="form" action="user_process.php" method="POST">
            
                    
                    <input type="text" id="fname" name="fullname" placeholder="Full Name"  required>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="pass" name="password" placeholder="Password" required>
                    <input type="password" id="conpass" name="confirm_password" placeholder="Confirm Password" required>
                    <label>Date of Birth</label>
                    <input type="date" id="dob" name="dob" placeholder="Date of Birth" required>
                    <input type="text" id="phno" name="phno" placeholder="Phone Number" required>
                    <input type="text" id="email" name="email" placeholder="Email" required>
                    <input type="text" id="address" name="address" placeholder="Address" required>
                    <input type="submit" name="enter" value="Sign up">
        </form>
    </center>    
    </div>
</body>
</html>