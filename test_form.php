<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home-CureComet: The Pharma Website</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<header>
        <img class="logo" src="Images/curecomet_HQ.png" width="200px" height="150px" >
        <nav>
            <ul class="menu">
                <li><a href="user_index.php">Home</a></li>
                <li><a href="labs.php">Lab Tests</a></li>
                <li><a href="appointment.php">Appointments</a></li>
                <li><a href="counselling.php">Counselling</a></li>
                <li><a href="cart.php">
                    <?php
                        session_start();
                        $user=$_SESSION['username'];
                        require('connection.php');
                        $query="SELECT COUNT(*) FROM cart where Username ='$user'";
                        $res=mysqli_query($con,$query);
                        $arr=mysqli_fetch_array($res, MYSQLI_NUM);
                        echo "Cart($arr[0])";
                    ?>
                </a></li>
                <li><a href="account_detail.php">My Account</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="logout_process.php">Log Out</a></li>
            </ul>
        </nav>
        
        <?php
            $name=$_SESSION['name'];
            echo "<label id='header-label'> <b>Welcome</b> ".$name."</label>";
        ?>
    </header>
    <?php

        require('connection.php');

        $lid=$_GET['lid'];
        $tn=$_GET['testname'];
        $p=$_GET['price'];
        $user=$_SESSION['username'];
    ?>

<div class="test_form">
    <br><br><br>
    <center>
        <form class="form" action="test_book.php" method="POST">
            <input type="hidden" name="lab_id" placeholder="Lab ID" value="<?php echo $lid;?>"><br>
            <input type="hidden" name="test_name" placeholder="Test Name" value="<?php echo $tn;?>"><br>
            <input type="text" name="test_price" placeholder="Test Price" disabled value="<?php echo '&#8377;'.$p;?>"><br>
            <input type="text" name="patient_name" placeholder="Patient Name" required><br>
            <input type="text" name="contact" placeholder="Contact Number" required><br>
            <label>Date of Test</label>
            <input type="date" name="test_date" placeholder="Test Date" required><br>
            <label>Date of Test</label>
            <input type="time" name="test_time" placeholder="Test Time" required><br>
            <input type="submit" name="book" value="Request Booking"></br><br>
        </form>
    </center>    
    </div>
</body>
</html>