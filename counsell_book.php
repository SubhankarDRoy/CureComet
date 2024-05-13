<?php
    session_start();
    require('connection.php');

    $user=$_SESSION['username'];
    $c_id=$_POST['c_id'];
    $p_name=$_POST['patient_name'];
    $comm=$_POST['comm'];
    $contact=$_POST['contact'];
    $s_id=time();
    $date=date("Y-m-d");

    $query="INSERT INTO `counsell`(`s_id`, `c_id`, `username`, `patient_name`, `comm`, `contact`, `status`, `date`) VALUES ('$s_id','$c_id','$user','$p_name','$comm','$contact','Under Review','$date')";
    echo $c_id;
    echo $p_name;
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