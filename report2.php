<?php
error_reporting(0);
 $conn = mysqli_connect("localhost","root","","car_rental");
 if(mysqli_connect_errno()){
    die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

  $date1=$_POST["date"];
  $date2=$_POST["enddate"];
  $type=$_POST["type"];
    
    $res="SELECT cars.car_id,cars.model,cars.type,cars.plate_id,cars.pricePerDay,book.status
    FROM cars 
    JOIN book on cars.car_id=book.carid
    WHERE cars.type='$type'
    AND book.start_date BETWEEN '$date1' and '$date2'
    AND cars.status='reserved'";
    
    $result=mysqli_query($conn,$res);
    echo "<h1><center>Cars</h1><br><br>";
?>
<center>
<table border='1'>
<tr>
<th>car id</th>
<th>car model</th>
<th>car type</th>
<th>plate id</th>
<th>price per day</th>
<th>status</th>
</tr>
<?php
//if (mysqli_fetch_assoc($result) >0) {
while($row  = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row["car_id"] . "</td>";
echo "<td>" . $row["model"] . "</td>";
echo "<td>" . $row["type"] . "</td>";
echo "<td>" . $row["plate_id"] . "</td>";
echo "<td>" . $row["pricePerDay"] . "</td>";
echo "<td>" . $row["status"] . "</td>";

echo "</tr>";
//}
}
?>