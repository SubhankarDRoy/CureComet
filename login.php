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
        <form class="form">
            <img src="Images/login.png" height="80px" width="80px"><br><br>
            <select name="login type">
                <option name="User">User</option>
                <option name="doctor">Doctor</option>
                <option name="vendor">Vendor</option>
                <option name="delivery_person">Delivery Person</option>
                <option name="counsellor">Counsellor</option>
            </select></br></br>
            <input type="text" name="username"><br>
            <input type="password" name="password"><br>
            <input type="submit" name="enter">

        </form>
    </center>    
    </div>
</body>
</html>