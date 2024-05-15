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

        $vid=$_GET['vid'];
        $user=$_SESSION['username'];
        $price=$_GET['price'];
        $platform=$_GET['platform'];
        $delivery=$_GET['delivery'];
        $orderlist=$_GET['ol'];
        $total=(int)$price+(int)$platform+(int)$delivery;
    ?>

    <div class="order_form">
    <br><br><br>
    <center>
        <form class="form" action="order_confirm.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="order_list" placeholder="Order list" value="<?php echo $orderlist;?>"><br>
            <input type="hidden" name="price" placeholder="Price" value="<?php echo $price;?>"><br>
            <input type="hidden" name="platform" placeholder="Platform Charge" value="<?php echo $platform;?>"><br>
            <input type="hidden" name="delivery" placeholder="Delivery Charge" value="<?php echo $delivery;?>"><br>
            <input type="hidden" name="vendor_id" placeholder="Vendor ID" value="<?php echo $vid;?>"><br>
            <label>Order List</label>
            <input type="text" name="order_list" placeholder="Order list" disabled value="<?php echo $orderlist;?>"><br>
            <label>Total Price</label>
            <input type="text" name="total_price" placeholder="Price" disabled value="<?php echo $total;?>"><br>
            <input type="text" name="contact" placeholder="Contact Number" required><br>
            <input type="text" name="address" placeholder="Address" required><br>
            <label>Upload doctor's prescription</label>
            <input type="file" name="file" required><br>
            
            <input type="submit" name="book" value="Order Medicines"></br><br>
        </form>
    </center>    
    </div>

    <br><br><br><br><br><br><br><br><br><br>
    <footer id="footer">
        &copy;<br>
        Academic Project for BCA final semester<br>
        developed by Subhankar Deb Roy (2021-24)<br>
        Department of Computer Application, St. Edmund's College
    </footer>

    
</body>
</html>
</body>
</html>