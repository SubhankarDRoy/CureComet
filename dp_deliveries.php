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
                <li><a href="dp_index.php">Home</a></li>
                <li><a href="dp_deliveries.php">Available Deliveries</a></li>
                <li><a href="dp_history.php">History</a></li>
                <li><a href="dp_detail.php">My Account</a></li>
                <li><a href="logout_process.php">Log Out</a></li>
            </ul>
        </nav>
        
        <?php
            session_start();
            $name=$_SESSION['name'];
            echo "<label id='header-label'> <b>Welcome</b> ".$name."</label>";
        ?>
    </header>

    
        <?php
        
            require('connection.php');
            $user=$_SESSION['username'];
            $query="Select Count(*) from orders where status like '%confirmed%'";
            $appointment_count=mysqli_query($con,$query);
            $arr=mysqli_fetch_array($appointment_count,MYSQLI_NUM);
            if($arr[0]==0)
            {
                echo "<br><br><br><br><br>";
                echo "<center><h2>No available deliveries</h2></center>";
                echo "<br><br><br><br><br>";
            }


            $query="Select * from orders where status like '%confirmed%';";
            $orders = mysqli_query($con, $query);

            if(!$orders)
            {
                die("error");
            }
            
            while ($arr=mysqli_fetch_array($orders,MYSQLI_NUM))
            {
                echo "<br>";
                echo "<table border = '1' >";
                    echo "<tr>";
                        echo "<td>Order ID:</td><td>$arr[0]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Order list:</td><td>";
                            $str = $arr[4];
                            $pattern = '/;/i';
                            echo preg_replace($pattern, '<br>', $str);
                    echo "</td></tr>";

                    echo "<tr>";
                        echo "<td>Price:</td><td>$arr[7]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Contact:</td><td>$arr[10]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Address:</td><td>$arr[8]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td><button onclick=\"document.location='dp_confirm.php?status=accept&oid=$arr[0]'\">Confirm</button</td>";
                    echo "</tr>";

                echo "</table>";
            }
        ?>
    <br><br><br><br><br><br><br><br><br><br>
    <footer id="footer">
        &copy;<br>
        Academic Project for BCA final semester<br>
        developed by Subhankar Deb Roy (2021-24)<br>
        Department of Computer Application, St. Edmund's College
    </footer>

    
</body>
</html>