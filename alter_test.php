<?php
    session_start();
    require('connection.php');
    $user=$_SESSION['username'];
    $testname=$_GET['testname'];
    $action=$_GET['action'];

    $sql="DELETE FROM `test_list` WHERE lab_id='$user' and test_name='$testname'";

    if(mysqli_query($con,$sql))
    {
        echo "
                <script type=\"text/javascript\">
                    alert('Test removed from list');
                   window.location.replace(\"lab_tests.php\");
                </script>
            ";
    }
    else
    {
        die("error");
    }
    