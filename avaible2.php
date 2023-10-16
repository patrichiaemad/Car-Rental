<html>
<head>
<title>CarCAr</title>
<link rel="stylesheet" href="main.css">
</head>
    <body>
    <div class="bar">
    <img src="Capture.PNG" class="logo">
    <nav>
    <ul>
    <li><a  href="user.html">Home</a></li>
        <li><a class="active" href="book.html">Book a car</a></li>
        <li><a href="return.php">return</a></li>
        <li><a href="index.html">Logout</a></li>
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
    </nav>
</div>



<div>
<?php
$carid=$_POST["carid"];
$end=$_POST["enddate"];
$name=$_POST["name"];
$date=$_POST["date"];
$status="pick up";
$status2="reserved";



if(!empty($carid) || !empty($days) || !empty($name)){
    //data connection
     $con = new mysqli("localhost","root","","car_rental");
  if($con->connect_error){
      die("failed to connect:".$con->connect_error);
 }else{
    $select = "SELECT car_id from cars where car_id='$carid' and status='active'";
    $result=mysqli_query($con,$select);
    $rnum=$result->num_rows;
    if($rnum >0){

        $sel = "SELECT user_id from users where name='$name'";
    $result=mysqli_query($con,$sel);
    $r=$result->num_rows;
    if($r >0){
    $INSERT = "INSERT into book (username,carid,start_date,end_date,status) values(?, ? , ? , ? , ? )";
    
    $stmt = $con->prepare($INSERT);
    $stmt->bind_param("sssss",$name,$carid,$date,$end,$status);
    $stmt->execute();
    
    
     $res="UPDATE cars set status=? where car_id=?";
     $stmt = $con->prepare($res);
    $stmt->bind_param("ss",$status2,$carid);
    $stmt->execute();
    }else{

        echo "there is no account with this name ";
    }
}
    //header ("location: user.html");
    
    else{
        echo "this car is already reserved";
    }
   // $stmt->close();
    $con->close();
 }
}else{
    echo "you have to fill all the inputs";
}




?>
</div>
<div>
<?php
error_reporting(0);
$carid=$_POST["carid"];
$days=$_POST["days"];
$name=$_POST["name"];
$date=$_POST["date"];
 $conn = mysqli_connect("localhost","root","","car_rental");
 if(mysqli_connect_errno()){
    die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

  
    $res="SELECT username, cars.model,cars.plate_id,start_date,(cars.pricePerDay*(end_date-start_date))  as total
    FROM book
    JOIN cars ON book.carid=cars.car_id
    where book.username='$name' and book.status='pick up'
     ";
    
    $result=mysqli_query($conn,$res);
    echo "<h1><center>reserved Cars</h1><br><br>";
?>
<center>
<table border='1'>
<tr>
<th>Name</th>
<th>car model</th>
<th>plate ID</th>
<th>start date</th>
<th>total price</th>

</tr>
<?php
//if (mysqli_fetch_assoc($result) >0) {
while($row  = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row["username"] . "</td>";
echo "<td>" . $row["model"] . "</td>";
echo "<td>" . $row["plate_id"] . "</td>";
echo "<td>" . $row["start_date"] . "</td>";
echo "<td>" . $row["total"] . "</td>";
echo "</tr>";
//}
}
?>
</div>
</body>
</html>