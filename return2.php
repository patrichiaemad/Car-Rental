<?php

$conn=mysqli_connect("localhost","root","","car_rental");

if(mysqli_connect_errno()){
    die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }
$carid=$_POST["returnid"];


$select = "SELECT plate_id from cars where car_id='$carid'and status='reserved'";
$result=mysqli_query($conn,$select);
$rnum=$result->num_rows;
if($rnum >0){
    $res="UPDATE cars set status='active' where car_id=?";
    $stmt = $conn->prepare($res);
    $stmt->bind_param("s",$carid);
    $stmt->execute();

    $res="UPDATE book set status='returned' where carid=?";
    $stmt = $conn->prepare($res);
    $stmt->bind_param("s",$carid);
    $stmt->execute();

    header("location: user.html");  
}

else {
    echo "there's no car with this plate id ";
}


?>