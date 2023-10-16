<?php
error_reporting(0);
 $conn = mysqli_connect("localhost","root","","car_rental");
 if(mysqli_connect_errno()){
    die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

  $date1=$_POST["date"];
  $date2=$_POST["enddate"];
    
    $res="SELECT book.resv_id,book.username,cars.model,cars.type,cars.plate_id,book.status
    FROM book
    JOIN cars ON book.carid=cars.car_id
    JOIN users ON book.username=users.name
    WHERE book.start_date between '$date1' AND '$date2'
    AND cars.status='reserved'";
    
    $result=mysqli_query($conn,$res);
    echo "<h1><center>Cars</h1><br><br>";
?>
<center>
<table border='1'>
<tr>
<th>reservation</th>
<th>username</th>
<th>car model</th>
<th>car type</th>
<th>plate id</th>
<th>status</th>
</tr>
<?php
//if (mysqli_fetch_assoc($result) >0) {
while($row  = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row["resv_id"] . "</td>";
echo "<td>" . $row["username"] . "</td>";
echo "<td>" . $row["model"] . "</td>";
echo "<td>" . $row["type"] . "</td>";
echo "<td>" . $row["plate_id"] . "</td>";
echo "<td>" . $row["status"] . "</td>";
echo "</tr>";
//}
}
?>