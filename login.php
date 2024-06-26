<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CureComet Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <header>
        <img class="logo" src="Images/curecomet_HQ.png" width="200px" height="150px" >

        
    </header>

    <div class="login_form">
        <br><br>
    <center>
        <form class="form" action="log_process.php" method="POST">
            <img src="Images/login.png" height="80px" width="80px"><br><br>
            <select name="login_type">
                <option disabled>Select User Type</option>
                <option value="User">User</option>
                <option value="Doctor">Doctor</option>
                <option value="Lab">Lab</option>
                <option value="Vendor">Vendor</option>
                <option value="DeliveryPerson">Delivery Person</option>
                <option value="Counsellor">Counsellor</option>
            </select></br></br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" name="enter" value="Login"></br><br>
            <a href="create.php">Create New Account</a>
        </form>
    </center>    
    </div>

    <br><br>
    <footer id="footer">
        &copy;<br>
        Academic Project for BCA final semester<br>
        developed by Subhankar Deb Roy (2021-24)<br>
        Department of Computer Application, St. Edmund's College
    </footer>
</body>
</html>