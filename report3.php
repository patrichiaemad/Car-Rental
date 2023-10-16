<?php
error_reporting(0);
 $conn = mysqli_connect("localhost","root","","car_rental");
 if(mysqli_connect_errno()){
    die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

  $model=$_POST["model"];
 
    
    $res="SELECT cars.model,cars.pricePerDay*(book.end_date-book.start_date) as total ,book.status
    FROM cars
    JOIN book on cars.car_id=book.carid
    where cars.model='$model'";
    
    $result=mysqli_query($conn,$res);
    echo "<h1><center>Cars</h1><br><br>";
?>
<center>
<table border='1'>
<tr>
<th>car model</th>
<th>total profit</th>
<th>status</th>
</tr>
<?php
//if (mysqli_fetch_assoc($result) >0) {
while($row  = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row["model"] . "</td>";
echo "<td>" . $row["total"] . "</td>";
echo "<td>" . $row["status"] . "</td>";


echo "</tr>";
//}
}
?>