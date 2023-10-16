<html>
<head>
<title>CarCAr</title>
<link rel="stylesheet" href="home.css">

</head>

<body>

<div class="bar">
<img src="Capture.PNG" class="logo">
    <nav>
    <ul>
        <li><a  href="user.html">Home</a></li>
        <li><a  href="book.html">Book a car</a></li>
        <li><a class="active" href="return.php">return</a></li>
        <li><a href="index.html">Logout</a></li>
        <li><a href="contact.html">Contact Us</a></li>
        
        
      </ul>
    </nav>
</div>
<div style="
  height: 100vh;
  min-height: 500px;
  background: url('images/11.jpg') no-repeat center;
  background-size: cover;
">
<div id="left">
    <b><form action="return.php" method="post" >
        <h3>enter your name:</h3><input type="text" name="name" placeholder="Name"/><br>
        <button type="submit">view reserved cars</button>
  </form>
  </b>
  </div>
  <div>
  <b><form action="return2.php" method="post" >
      <h3> The car id that you'll return :</h3>
       <input type="text" name="returnid" placeholder="Car ID"/><br>
        <button type="submit">return</button>
  </form>
  </b>
</div>
<div >
    <?php
error_reporting(0);

 $conn = mysqli_connect("localhost","root","","car_rental");
 if(mysqli_connect_errno()){
    die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

    $name=$_POST["name"];
    $res="SELECT book.carid,cars.model,cars.plate_id,book.start_date,end_date
    FROM book
    JOIN cars on book.carid=cars.car_id
    where book.username='$name' AND book.status='pick up' ";

    $result=mysqli_query($conn,$res);
?>
<center>
<table border='1'>
<tr>
<th>Car Id</th>
<th>Car model</th>
<th>plate ID</th>
<th>start date</th>
<th>end date</th>

</tr>
<?php
//if (mysqli_fetch_assoc($result) >0) {
while($row  = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row["carid"] . "</td>";
echo "<td>" . $row["model"] . "</td>";
echo "<td>" . $row["plate_id"] . "</td>";
echo "<td>" . $row["start_date"] . "</td>";
echo "<td>" . $row["end_date"] . "</td>";
//echo "<td>" . $row["pricePerDay"] . "</td>";
echo "</tr>";
//}
}
?>





</div>
</div>
</body>




</html>