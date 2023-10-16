<?php
error_reporting(0);
 $conn = mysqli_connect("localhost","root","","car_rental");
 if(mysqli_connect_errno()){
    die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

  $date1=$_POST["date"];
  $date2=$_POST["enddate"];
  $name=$_POST["name"];
    
    $res="SELECT book.username,users.email,users.location,cars.model,cars.type,cars.year,cars.plate_id,book.status
    FROM book
    JOIN cars on book.carid=cars.car_id
    JOIN users on book.username=users.name
    WHERE book.start_date BETWEEN '$date1' and '$date2'
    and book.username='$name'";
    
    $result=mysqli_query($conn,$res);
    echo "<h1><center>Cars</h1><br><br>";
?>
<center>
<table border='1'>
<tr>
<th>username</th>
<th>email</th>
<th>location</th>
<th>car model</th>
<th>car type</th>
<th>car year</th>
<th>car plate id</th>
<th>status</th>
</tr>

<?php
//if (mysqli_fetch_assoc($result) >0) {
while($row  = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row["username"] . "</td>";
echo "<td>" . $row["email"] . "</td>";
echo "<td>" . $row["location"] . "</td>";
echo "<td>" . $row["model"] . "</td>";
echo "<td>" . $row["type"] . "</td>";
echo "<td>" . $row["year"] . "</td>";
echo "<td>" . $row["plate_id"] . "</td>";
echo "<td>" . $row["status"] . "</td>";
echo "</tr>";
//}
}
?>