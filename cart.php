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
            $query="SELECT c.Username, c.Vendor_ID, c.med_name, c.qty, m.Price FROM cart c, med_list m WHERE c.Username='$user' and m.Vendor_ID=c.Vendor_ID and c.med_name=m.Med_Name";
            $cart_list = mysqli_query($con, $query);
            
            
            echo "<br>";
            $order_list="";
            if($cart_list)
            {
                
                echo "<table border = '1' >";
                
                while($arr=mysqli_fetch_array($cart_list,MYSQLI_NUM))
                {
                    $vid=$arr[1];
                    $order_list=$order_list.$arr[2].",".$arr[3].";";

                    echo "<tr>";
                        echo "<td>";
                            echo $arr[2]."&nbsp; (Price:&#8377;".$arr[4]*$arr[3].")";
                            
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
                
            }

            $q="SELECT COUNT(*) FROM cart where Username ='$user'";
            $res=mysqli_query($con,$q);
            $arr=mysqli_fetch_array($res, MYSQLI_NUM);
            if($arr[0]>0)
            {
                echo "<button class=\"clear-button\" onclick=\"document.location='clear_cartProcess.php?redirect=cart'\">Clear Cart</button>";
                echo "<br><br><br>";
                //Bill calculation
                $query="SELECT c.qty, m.price from cart c,med_list m where c.Username='$user' and m.Vendor_ID=c.Vendor_ID and c.med_name=m.Med_Name";

                $res=mysqli_query($con,$query);
                $total=0;
                 while($arr=mysqli_fetch_array($res,MYSQLI_NUM))
                 {
                    $total=$total+$arr[0]*$arr[1];
                 }

                echo "<table>";
                echo "<tr>";
                        echo "<td>";
                            echo "Total Price:";
                        echo "</td>";
                        echo "<td>";
                            echo "&#8377;".$total;
                        echo "</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>";
                            echo "Platform Service Charge:";
                        echo "</td>";
                        echo "<td>";
                            echo "&#8377;".(7*$total)/100;
                        echo "</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>";
                            echo "Delivery Charges:";
                        echo "</td>";
                        echo "<td>";
                            echo "&#8377;100";
                        echo "</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>";
                            echo "Total payable amount:";
                        echo "</td>";
                        echo "<td>";
                            echo "<b>&#8377;".($total+((7*$total)/100)+100)."</b>";
                        echo "</td>";
                echo "</tr>";
                echo "</table>";
            
                echo "<button class=\"order-button\" onclick=\"document.location='order.php?ol=$order_list&vid=$vid&price=$total&platform=(7*$total)/100&delivery=100'\">Place Order</button>";
            }
            
            
    ?>
    
    

</body>
</html>