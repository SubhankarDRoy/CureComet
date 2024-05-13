<!DOCTYPE html>
<body>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home-CureComet: The Pharma Website</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

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
        $user=$_SESSION['username'];
        
            require('connection.php');
            $query="Select * from users where USername like '$user';";
            $user_details = mysqli_query($con, $query);

            if(!$user_details)
            {
                die("error");
            }
            echo "<br><br>";
            echo "<table border = '1' >";
            echo "<tr><td><h3>Account Details</td></tr>";
            while ($arr=mysqli_fetch_array($user_details,MYSQLI_NUM))
            {
                echo "<tr>";
                    echo "<td>";
                        echo "<b>Username: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "$arr[0]";
                    echo "</td>";
                    echo "</tr>";

                    echo "<td>";
                        echo "<b>Name: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "$arr[2]";
                    echo "</td>";
                    echo "</tr>";

                    echo "<td>";
                        echo "<b>Date of Birth: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "$arr[3]";
                    echo "</td>";
                    echo "</tr>";

                    echo "<td>";
                        echo "<b>Phone Number: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "$arr[4]";
                    echo "</td>";
                    echo "</tr>";

                    echo "<td>";
                        echo "<b>Email: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "$arr[5]";
                    echo "</td>";
                    echo "</tr>";

            }
            echo "</table>";
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