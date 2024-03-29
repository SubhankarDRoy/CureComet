<?php
    require('connection.php');

    $user_type=$_POST['login_type'];
    $user=$_POST['username'];
    $pass=$_POST['password'];


    echo $user_type;
    echo $user;
    echo $pass;
