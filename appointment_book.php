<?php
    session_start();
    require('connection.php');

    $user=$_SESSION['username'];
    $doc_id=$_POST['doctor_id'];
    $p_name=$_POST['patient_name'];
    $date=$_POST['appointment_date'];
    $time=$_POST['appointment_time'];
    $appointment_id=time();

    $query="INSERT INTO appointments(appointment_id,username,doctor_id,patient_name,`date`,`time`, `status`) VALUES ('$appointment_id','$user','$doc_id','$p_name','$date','$time','Under Review')";
    
    if(mysqli_query($con,$query))
    {
        echo "
        <script type=\"text/javascript\">
            alert('Request initiated, Please check your account for updates');
           window.location.replace(\"appointment.php\");
        </script>
        ";
    }
    else
    {
        die("Error");
    }