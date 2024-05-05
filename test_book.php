<?php
    session_start();
    require('connection.php');

    $user=$_SESSION['username'];
    $lab_id=$_POST['lab_id'];
    $p_name=$_POST['patient_name'];