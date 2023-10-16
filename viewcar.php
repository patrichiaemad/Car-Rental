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
        <li><a  href="admin.html">Home</a></li>
        <li><a  href="car.html">Cars</a></li>
        <li><a class="active" href="viewcar.php">view car</a></li>
        <li><a href="report.html">reports</a></li>
        <li><a href="index.html">Logout</a></li>
        <li><a href="contact.html">Contact Us</a></li>
        
      </ul>
    </nav>
</div>
<div style="
  height: 100vh;
  min-height: 500px;
  background: url('images/back\ cars.jpg') no-repeat center;
  background-size: cover;
">
<div>
    <form id="left" action="viewcar.php" method="post">
     <h1>View Cars</h1> 
      type to view: <select name="type">
      <option>All</option>
    <option>Compact</option>
    <option>Medium</option>
    <option>Large</option>
    <option>SUV</option>
    <option>Van</option>
    <option>Truck</option>
    </select>
    <br>
    <button type="submit">View</button>
    </form>
  </div>
<div>
<?php
error_reporting(0);
 $conn = mysqli_connect("localhost","root","","car_rental");
 if(mysqli_connect_errno()){
    die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

  $type=$_POST["type"];
    $res="SELECT model,type,plate_id,year,status,pricePerDay from cars WHERE type='$type' ";
    if($type=="All"){
    $res="SELECT model,type,plate_id,year,status,pricePerDay from cars ";
    }
    $result=mysqli_query($conn,$res);
    echo "<h1><center>".$type."&nbsp;Cars</h1><br><br>";
?>
<center>
<table border='1'>
<tr>
<th>Model</th>
<th>type</th>
<th>plate ID</th>
<th>Year</th>
<th>status</th>
<th>price</th>

</tr>
<?php
//if (mysqli_fetch_assoc($result) >0) {
while($row  = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row["model"] . "</td>";
echo "<td>" . $row["type"] . "</td>";
echo "<td>" . $row["plate_id"] . "</td>";
echo "<td>" . $row["year"] . "</td>";
echo "<td>" . $row["status"] . "</td>";
echo "<td>" . $row["pricePerDay"] . "</td>";
echo "</tr>";
//}
}
?>
</div>
</div>
</table>
</body>
</html>