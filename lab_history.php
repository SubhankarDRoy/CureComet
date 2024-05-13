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
                <li><a href="lab_index.php">Home</a></li>
                <li><a href="lab_tests.php">Tests</a></li>
                <li><a href="lab_history.php">History</a></li>
                <li><a href="lab_detail.php">My Account</a></li>
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
            $query="Select Count(*) from test_booking where lab_id like '$user'";
            $booking_count=mysqli_query($con,$query);
            $arr=mysqli_fetch_array($booking_count,MYSQLI_NUM);
            if($arr[0]==0)
            {
                echo "<br><br><br><br><br>";
                echo "<center><h2>No appointments requested</h2></center>";
                echo "<br><br><br><br><br>";
            }


            $query="Select * from test_booking where lab_id like '$user';";
            $vendor_list = mysqli_query($con, $query);

            if(!$vendor_list)
            {
                die("error");
            }
            
            while ($arr=mysqli_fetch_array($vendor_list,MYSQLI_NUM))
            {
                echo "<br>";
                echo "<table border = '1' >";
                    echo "<tr>";
                        echo "<td>Patient Name:</td><td>$arr[3]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Test Name:</td><td>$arr[4]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Test Date:</td><td>$arr[5]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Test Time:</td><td>$arr[6]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Status:</td><td>$arr[7]</td>";
                    echo "</tr>";
                echo "</table>";
                
            }
        ?>
    <br><br><br><br><br><br><br><br><br><br><br>
    <footer id="footer">
        &copy;<br>
        Academic Project for BCA final semester<br>
        developed by Subhankar Deb Roy (2021-24)<br>
        Department of Computer Application, St. Edmund's College
    </footer>

    
</body>
</html>