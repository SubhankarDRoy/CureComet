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
                <li><a href="L_Test.php">Lab Tests</a></li>
                <li><a href="appointment.php">Appointments</a></li>
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
                <li><a href="login.php">Log Out</a></li>
            </ul>
        </nav>
        
        <?php
            $name=$_SESSION['name'];
            echo "<label id='header-label'> <b>Welcome</b> ".$name."</label>";
        ?>
    </header>

    <?php
            require('connection.php');
            $user=$_SESSION['username'];
            $query="SELECT `Username`, `Vendor_ID`, `med_name`, `qty` FROM `cart` WHERE Username='$user'";
            $cart_list = mysqli_query($con, $query);
            
            
            echo "<br>";
            
            if($cart_list)
            {

                echo "<table border = '1' >";
                
                while($arr=mysqli_fetch_array($cart_list,MYSQLI_NUM))
                {
                    echo "<tr>";
                        echo "<td>";
                            echo $arr[2];
                            
                        echo "</td>";
                        
                        echo "<td>";
                            echo "<button onclick=\"document.location='adjust_cartQty.php?action=minus&vid=$arr[1]&mn=$arr[2]'\">-</button>";
                            echo "  $arr[3]  ";
                            echo "<button onclick=\"document.location='adjust_cartQty.php?action=plus&vid=$arr[1]&mn=$arr[2]'\">+</button>";
                        echo "</td>";
                        echo "<td>";
                            echo "<button class='delete-btn' onclick=\"document.location='adjust_cartQty.php?action=delete&vid=$arr[1]&mn=$arr[2]'\">Delete</button>";
                        echo "</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
                echo "<button class=\"clear-button\" onclick=\"document.location='clear_cartProcess.php?redirect=cart'\">Clear Cart</button>";
            }
    ?>
    
    

</body>
</html>