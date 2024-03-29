<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CureComet Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='login.css'>
    <script src='main.js'></script>
</head>
<body>
    <header>
        <img class="logo" src="Images/curecomet_HQ.png" width="200px" height="150px" >

        <ul class="menu">
            <li><a href="user_index.php">Home</a></li>
            <li><a href="L_Test.php">Lab Tests</a></li>
            <li><a href="appointment.php">Appointments</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="Cart.php">Cart</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="account.php">Accounts</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </header>

    <div class="login_form">
    <center>
        <form class="form" action="log_process.php" method="POST">
            <img src="Images/login.png" height="80px" width="80px"><br><br>
            <select name="login_type">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
                <option value="Doctor">Doctor</option>
                <option value="Vendor">Vendor</option>
                <option value="DeliveryPerson">Delivery Person</option>
                <option value="Counsellor">Counsellor</option>
            </select></br></br>
            <input type="text" name="username"><br>
            <input type="password" name="password"><br>
            <input type="submit" name="enter"></br><br>
            <a href="Create.php">Create New Account</a>
        </form>
    </center>    
    </div>
</body>
</html>