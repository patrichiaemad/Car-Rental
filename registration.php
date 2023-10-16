<?php
error_reporting(0);
$username = $_POST['fname2'];
$email=$_POST['mail'];
$password = $_POST['passw'];
$location=$_POST['location'];
//$passwordenc = md5($password);

if(!empty($usernmae) || !empty($email) || !empty($password)){
   //data connection
    $con = new mysqli("localhost","root","","car_rental");
 if($con->connect_error){
     die("failed to connect:".$con->connect_error);
}else{
    $SELECT = "SELECT email from users where email = ? limit 1";
$INSERT = "INSERT into users (name, password , email , location) values(? , ? , ? ,?)";
$stmt = $con->prepare($SELECT);
     $stmt->bind_param("s",$email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
    
     
     if($rnum ==0){
         $stmt->close();
         $stmt = $con->prepare($INSERT);
         $stmt->bind_param("ssss",$username,$password,$email,$location);
         $stmt->execute();
        
        header("location: login.html");   
      }else{
         
         echo "someone already register using this email";
     }
     $stmt->close;
     $con->close;
}

}else{
    echo "all field are required";
    die();
}

?>
