<?php

$conn=mysqli_connect("localhost","root","","car_rental");

if(mysqli_connect_errno()){
    die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }
$type=$_POST["typeup"];
$plateid=$_POST["plateidup"];
$status=$_POST["statusup"];

$select = "SELECT plate_id from cars where plate_id='$plateid'and type='$type'";
$result=mysqli_query($conn,$select);
$rnum=$result->num_rows;
if($rnum >0){
    $res="UPDATE cars set status=? where type=? and plate_id=?";
    $stmt = $conn->prepare($res);
    $stmt->bind_param("sss",$status,$type,$plateid);
    $stmt->execute();
    header("location: viewcar.php");  
}

else {
    echo "there's no car with this plate id ";
}

?>