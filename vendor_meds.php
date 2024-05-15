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
                <li><a href="vendor_index.php">Home</a></li>
                <li><a href="vendor_meds.php">Medicine list</a></li>
                <li><a href="vendor_history.php">History</a></li>
                <li><a href="vendor_detail.php">My Account</a></li>
                <li><a href="logout_process.php">Log Out</a></li>
            </ul>
        </nav>
        
        <?php
            session_start();
            $name=$_SESSION['vname'];
            echo "<label id='header-label'> <b>Welcome</b> ".$name."</label>";
        ?>
    </header>
    <br><br><br>
    <center><button onclick="document.location='add_med.php'">Add Medicine</button></center>

    <?php
        
            require('connection.php');
            $user=$_SESSION['vid'];
            $query="Select Count(*) from med_list where vendor_id like '$user'";
            $appointment_count=mysqli_query($con,$query);
            $arr=mysqli_fetch_array($appointment_count,MYSQLI_NUM);
            if($arr[0]==0)
            {
                echo "<br><br><br><br><br>";
                echo "<center><h2>No medicines</h2></center>";
                echo "<br><br><br><br><br>";
            }


            $query="Select * from med_list where vendor_id like '$user'";
            $med_list = mysqli_query($con, $query);

            if(!$med_list)
            {
                die("error");
            }
            
            while ($arr=mysqli_fetch_array($med_list,MYSQLI_NUM))
            {
                echo "<br>";
                echo "<table border = '1' >";
                    echo "<tr>";
                        echo "<td>Test Name:</td><td>$arr[1]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Composition:</td><td>$arr[2]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Company:</td><td>$arr[3]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Price:</td><td>&#8377;$arr[4]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Quantity:</td><td>$arr[5]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Availibity:</td><td>$arr[6]</td>";
                    echo "</tr>";

                    echo "<tr>";
                        
                        echo "<td><button class=\"red-button\" onclick=\"document.location='alter_med.php?action=remove&vid=$arr[0]&medname=$arr[1]'\">Mark as Not Available</button</td>";
                        echo "<td><button onclick=\"document.location='alter_med.php?action=add&vid=$arr[0]&medname=$arr[1]'\">Mark as Available</button</td>";
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