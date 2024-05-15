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
            $name=$_SESSION['lab_name'];
            $user=$_SESSION['lab_id'];
            echo "<label id='header-label'> <b>Welcome</b> ".$name."</label>";
        ?>
    </header>
    <br><br>
    <form class="form" action="add_testProcess.php" method="POST">
        <input type="text" name="test_name" placeholder="Test Name" required><br>
        <select name="test_type">
                <option value="home">Home</option>
                <option value="In Centre">In-Centre</option>
            </select><br>
        <input type="text" name="requirement" placeholder="Test Requirements required"><br>
        <input type="text" name="price" placeholder="Test Price" required><br>
        <input type="submit" value="Add Test"> 
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

