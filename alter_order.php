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
                <li><a href="doctor_index.php">Home</a></li>
                <li><a href="doctor_history.php">History</a></li>
                <li><a href="doctor_detail.php">My Account</a></li>
                <li><a href="logout_process.php">Log Out</a></li>
            </ul>
        </nav>
        
        <?php
            session_start();
            $name=$_SESSION['vname'];
            echo "<label id='header-label'> <b>Welcome</b> ".$name."</label>";
        ?>
    </header>


    <?php
        require('connection.php');
        $user=$_SESSION['vid'];

        $status=$_GET['status'];
        $oid=$_GET['oid'];
        $sql="";
        switch($status)
        {
            case "confirm": $sql="UPDATE orders SET `status`='confirmed' where order_id=$oid";
                            break;

            case "reject": $sql="UPDATE orders SET `status`='rejected' where order_id=$oid";
                            break;
            case "adjust_confirm" : echo "
                                    <script type=\"text/javascript\">
                                        let new_status=prompt(\"Please enter the adjustment\");
                                        window.location.href = \"status_order.php?status=confirmed-\"+new_status+\"&oid=\"+$oid+\"\";
                                    </script>
                                    ";
                                    break;

            case "reason_reject" : echo "
                                    <script type=\"text/javascript\">
                                        let new_status=prompt(\"Please enter the rejection reason\");
                                        window.location.href = \"status_order.php?status=rejected-\"+new_status+\"&oid=\"+$oid+\"\";
                                    </script>
                                    ";
                                    break;
                                    
        }

        if($sql!="")
        {
            if(mysqli_query($con,$sql))
            {
                echo "<script type=\"text/javascript\">
                    alert('Status Updated');
                   window.location.replace(\"vendor_index.php\");
                </script>";
            }
            else
            {
                die('error');
            }
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