<?php
    require('connection.php');
    session_start();

    $lid=$_SESSION['username'];
    $test_name=$_POST['test_name'];
    $type=$_POST['test_type'];
    $requirement=$_POST['requirement'];
    $price=$_POST['price'];

    $sql="INSERT INTO `test_list`(`lab_id`, `test_name`, `test_type`, `requirement`, `Price`) VALUES ('$lid','$test_name','$type','$requirement','$price')";

    if(mysqli_query($con,$sql))
    {
        echo "
                <script type=\"text/javascript\">
                    alert('Test added');
                   window.location.replace(\"lab_tests.php\");
                </script>
            ";
    }


    