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
            $vid=$_GET['Vendor_ID'];
            require('connection.php');
            $query="Select * from med_list where Vendor_ID='".$vid."';";
            $vendor_list = mysqli_query($con, $query);

            if(!$vendor_list)
            {
                die("error");
            }
            
            while ($arr=mysqli_fetch_array($vendor_list,MYSQLI_NUM))
            {
                echo "<br>";
                echo "<table border = '1' ><tr>";
                    echo "<td>";
                        echo "<h3>".$arr[1]."</h3>";
                    echo "</td>";
                    
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td><b>Composition:</b>".$arr[2]."</td>";
                    echo "</tr><tr>";  
                        echo "<td><b>Company:</b>".$arr[3]."</td>";
                        echo "<td><b>Qty:</b>".$arr[5]."</td>";
                        echo "<td><b>Price:</b>".$arr[4]."</td>";
                        echo "<td>";
                        echo "<button onclick=\"document.location='add_cartProcess.php?Vendor_ID=$vid&medname=$arr[1]'\">+Add</button>";
                        echo "</td>";
                    echo "</tr>";
                echo "</table>";
            }
        ?>
    <br>
    <footer id="footer">
        &copy;
        Academic Project for BCA final semester<br>
        developed by Subhankar Deb Roy<br>
        Department of Computer Application, St. Edmund's College
    </footer>
</body>
</html>