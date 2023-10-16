<?php
$email=$_POST['email'];
$password = $_POST['password'];
//$passwordenc = md5($password);

//data connection
 $con = new mysqli("localhost","root","","car_rental");
 if($con->connect_error){
     die("failed to connect:".$con->connect_error);
 }else{
     $stmt = $con->prepare("select * from users where email = ?");
     $stmt->bind_param("s",$email);
     $stmt->execute();
     $stmt_result = $stmt->get_result();
     if($stmt_result->num_rows >0){
         $data = $stmt_result->fetch_assoc();
         if($data['password'] == $password && $data['user_id']==1){

           // echo "hi admin";
             header("location: admin.html");
             
         }elseif($data['password']==$password && $data['user_id']>1){
             //echo "hi user";
             header("location: user.html");
             
         }
         else{
             echo "Invalid email or password";
         }
        }else{
         echo "Invalid email or password";
     }
    }
?>