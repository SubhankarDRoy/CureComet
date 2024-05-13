<?php
    session_start();
    require('connection.php');
    $order_id=time();
    $user=$_SESSION['username'];
    $vid=$_POST['vendor_id'];
    $order_list=$_POST['order_list'];
    $price=$_POST['price'];
    $platform=$_POST['platform'];
    $delivery=$_POST['delivery'];
    $address=$_POST['address'];
    $order_date=date("Y-m-d");
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
     #upload directory path
    $uploads_dir = 'prescriptions';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "INSERT INTO `orders`(`order_id`, `username`, `vendor_id`, `d_id`, `order_list`, `price`, `platform_charge`, `delivery`, `address`, `prescription`, `status`, `order_date`) VALUES ('$order_id','$user','$vid','NA','$order_list','$price','$platform','$delivery','$address','$pname','Under Review','$order_date')";
 
    if(mysqli_query($con,$sql))
    {
        echo "
        <script type=\"text/javascript\">
            alert('Order placed, Please check your account for updates');
           window.location.replace(\"user_index.php\");
        </script>
        ";
    }
    else
    {
        echo "Error";
    }

 
