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
    <div class="about us">
    <img class="logo_about" src="Images/curecomet_HQ.png" width="200px" height="150px" >
    <p class="about">CureComet is a pharmaceutical website that allows users to purchase medications from local pharmacies that have enrolled with CureComet. Apart from purchasing medicines, the users can also book doctor’s appointment or lab tests from their home. CureComet will have elements that will improve the user experience and comfort in addition to the ability to purchase medicines. CureComet targets to connect users with local pharmacies and clinics so that the process of medicine delivery is fast and affordable. The doctors with various specialties can enroll themselves and the users can book appointment with the doctors. It also allows user to connect with mental counselors all over the country for easy and secretive counseling sessions.
        It will also help the user as well as the pharmacies to keep records of purchase and sales respectively. All the information can be viewed in one platform. The clinical records of a user can be monitored for future treatment purposes.</p>
        
    </div>
</body>
</html>