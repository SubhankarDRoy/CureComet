<?php
    session_start();
    require('connection.php');

    $user=$_SESSION['username'];
    $lab_id=$_POST['lab_id'];
    $p_name=$_POST['patient_name'];
    $test_name=$_POST['test_name'];
    $contact=$_POST['contact'];
    $date=$_POST['test_date'];
    $time=$_POST['test_time'];
    $booking_id=time();

    $query="INSERT INTO test_booking(booking_id,username,lab_id,patient_name,test_name,contact,`date`,`time`, `status`) VALUES ('$booking_id','$user','$lab_id','$p_name','$test_name','$contact','$date','$time','Under Review')";
    
    if(mysqli_query($con,$query))
    {
        echo "
        <script type=\"text/javascript\">
            alert('Request initiated, Please check your account for updates');
           window.location.replace(\"test_list.php?Lab_ID=$lab_id\");
        </script>
        ";
    }
    else
    {
        die("Error");
    }