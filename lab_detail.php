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
        $user=$_SESSION['username'];
        
            require('connection.php');
            $query="Select * from labs where lab_id like '$user';";
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
                        echo "<b>Lab_ID: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "$arr[0]";
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr><td>";
                        echo "<b>Lab Name: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "$arr[2]";
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr><td>";
                        echo "<b>Phone Number: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "$arr[4]";
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr><td>";
                        echo "<b>Email: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "$arr[5]";
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr><td>";
                        echo "<b>Address: </b>";
                    echo "</td>";
                    echo "<td>";
                        echo "$arr[6]";
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