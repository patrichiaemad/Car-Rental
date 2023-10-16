<?php
$Model=$_POST["model"];
$type=$_POST["type"];
$plateid=$_POST["plateid"];
$year=$_POST["year"];
$status= "active";
$price=$_POST["price"];

if(!empty($Model) || !empty($plateid) || !empty($year)){
    //data connection
     $con = new mysqli("localhost","root","","car_rental");
  if($con->connect_error){
      die("failed to connect:".$con->connect_error);
 }else{
    $SELECT = "SELECT plate_id from cars where plate_id = ? limit 1";
    $INSERT = "INSERT into cars (model,type,year,plate_id,status,pricePerDay) values(? , ? , ? , ? , ? , ?)";

    $stmt = $con->prepare($SELECT);
     $stmt->bind_param("s",$plateid);
     $stmt->execute();
     $stmt->bind_result($plateid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if($rnum ==0){
        $stmt->close();
    $stmt = $con->prepare($INSERT);
    $stmt->bind_param("ssssss",$Model,$type,$year,$plateid,$status,$price);
    $stmt->execute();
    header ("location: car.html");
     }
     else{
         
        echo "this car is already registered";
    }
    $stmt->close();
     $con->close();
 }
}



?>