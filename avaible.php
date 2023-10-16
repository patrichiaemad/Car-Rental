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
<div style="
  height: 100vh;
  min-height: 500px;
  background: url('images/back\ cars.jpg') no-repeat center;
  background-size: cover;
">


<div>
<form id="left" action="avaible2.php" method="post">
     <h1>Choose which car you want to rent</h1>
     The car ID: <input type="text" name="carid" placeholder="Car ID"/><br><br>
     Start date: <input type="date" name="date" placeholder="date"/><br><br>
    End date: <input type="date" name="enddate" placeholder=""/><br><br> 
     your name: <input type="text" name="name" placeholder="Name"/><br><br>
  
    <br>
    <button type="submit">submit</button>
    </form>
  </div>
<div>
<?php
error_reporting(0);
$type=$_POST["typeB"];
//$date=$_POST["date"];
//$avaible="active";


 $conn = mysqli_connect("localhost","root","","car_rental");
 if(mysqli_connect_errno()){
    die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

    $res="SELECT car_id,model,type,plate_id,year,pricePerDay from cars WHERE status='active' and type='$type' ";
    $result=mysqli_query($conn,$res);
    echo "<h1><center>".$type."&nbsp;Cars</h1><br><br>";
?>
<center>
<table border='1'>
<tr>
<th>car ID</th>
<th>Model</th>
<th>type</th>
<th>plate ID</th>
<th>Year</th>
<th>price per day</th>

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
echo "<td>" . $row["year"] . "</td>";
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