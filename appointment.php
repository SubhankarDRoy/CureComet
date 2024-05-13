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
        echo "<table>";
        require('connection.php');
        $query="Select * from doctors;";
        $test_list = mysqli_query($con, $query);

        if(!$test_list)
        {
            die("error");
        }
        
        while ($arr=mysqli_fetch_array($test_list,MYSQLI_NUM))
        {
            echo "<br>";
            echo "<table border = '1' ><tr>";
                echo "<td>";
                    echo "<h3>".$arr[2]."</h3>";
                echo "</td>";
                
                echo "</tr>";

                echo "<tr>";
                    echo "<td><b>Qualification:</b>".$arr[5]."</td>";
                echo "</tr><tr>";  
                    
                    echo "<td><b>Clinic:</b>".$arr[6]."</td>";
                    echo "<td>&emsp;&emsp;&emsp;&emsp; &emsp; </td>";
                    echo "<td>";
                    echo "<button onclick=\"document.location='doc_form.php?doctor_id=$arr[0]'\">Request Appointment</button";
                    echo "</td>";
                echo "</tr>";
            echo "</table>";
        }
        ?>
    <br><br><br><br><br><br>
    <footer id="footer">
        &copy;<br>
        Academic Project for BCA final semester<br>
        developed by Subhankar Deb Roy (2021-24)<br>
        Department of Computer Application, St. Edmund's College
    </footer>

    
</body>
</html>