<?php
    require('connection.php');
    session_start();

    $vid=$_SESSION['username'];
    $med_name=$_POST['med_name'];
    $com=$_POST['composition'];
    $company=$_POST['company'];
    $price=$_POST['price'];
    $qnty=$_POST['qnty'];

    $sql="INSERT INTO `med_list`(`Vendor_ID`, `Med_Name`, `Composition`, `Company`, `Price`, `Qty`, `Available`) VALUES ('$vid','$med_name','$com','$company','$price','$qnty','yes')";

    if(mysqli_query($con,$sql))
    {
        echo "
                <script type=\"text/javascript\">
                    alert('Medicine added');
                   window.location.replace(\"vendor_meds.php\");
                </script>
            ";
    }