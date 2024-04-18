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
                <li><a href="about.php">About</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="account.php">Accounts</a></li>
                <li><a href="login.php">Log Out</a></li>
            </ul>
        </nav>
        
        <?php
            session_start();
            $name=$_SESSION['name'];
            echo "<label id='header-label'> <b>Welcome</b> ".$name."</label>";
        ?>
    </header>

    <table>
        <?php
            require('connection.php');
            $query="Select * from vendor;";
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
                        echo "<a href='med_list.php?Vendor_ID=$arr[0]'>".$arr[2]."</a>";
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td><b>Address:</b>".$arr[5]."</td>";
                    echo "</tr><tr>";   
                    echo "<td><b>Contact:</b>".$arr[3]."</td>";
                    echo "</tr>";
                echo "</table>";
                
            }
        ?>
    
</body>
</html>