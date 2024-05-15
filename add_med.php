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
            $name=$_SESSION['name'];
            echo "<label id='header-label'> <b>Welcome</b> ".$name."</label>";
        ?>
    </header>

    <form class="form" action="add_medProcess.php" method="POST">
        <input type="text" name="med_name" placeholder="Medicine Name" required><br>
        <input type="text" name="composition" placeholder="Composition" required><br>
        <input type="text" name="company" placeholder="Manufacturing Company"><br>
        <input type="text" name="price" placeholder="Medicine Price" required><br>
        <input type="text" name="qnty" placeholder="Quantity" required><br>
        <input type="submit" value="Add Medicine"> 
    </form>


    <br><br><br><br><br><br><br><br><br><br>
    <footer id="footer">
        &copy;<br>
        Academic Project for BCA final semester<br>
        developed by Subhankar Deb Roy (2021-24)<br>
        Department of Computer Application, St. Edmund's College
    </footer>

    
</body>
</html>