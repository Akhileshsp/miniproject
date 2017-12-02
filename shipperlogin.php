<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");
	
$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM shipper WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	
	if(is_array($row)) {
	$_SESSION["ship_id"] = $row['ship_id'];
	} else {
	$message = "Invalid Username or Password!";
	}
}
if(!empty($_POST["logout"])) {
	$_SESSION["ship_id"] = "";
	session_destroy();
}
?>
<html>
<head>
<title>Shipper Login</title>
<style>
#frmLogin { 
	padding: 20px 60px;
	background: #B6E0FF;
	color: #555;
	display: inline-block;
	border-radius: 4px; 
}
.field-group { 
	margin:15px 0px; 
}
.input-field {
	padding: 8px;width: 200px;
	border: #A3C3E7 1px solid;
	border-radius: 4px; 
}
.form-submit-button {
	background: #65C370;
	border: 0;
	padding: 8px 20px;
	border-radius: 4px;
	color: #FFF;
	text-transform: uppercase; 
}
.member-dashboard {
	padding: 40px;
	background: #D2EDD5;
	color: #555;
	border-radius: 4px;
	display: inline-block;
	text-align:center; 
}
.logout-button {
	color: #09F;
	text-decoration: none;
	background: none;
	border: none;
	padding: 0px;
	cursor: pointer;
}
.error-message {
	text-align:center;
	color:#FF0000;
}
.demo-content label{
	width:auto;
}
</style>
</head>
<body>
<div>
<div style="display:block;margin:0px auto;">

<?php if(empty($_SESSION["ship_id"])) { ?>
<form action="" method="post" id="frmLogin">
<h2><mark style="background-color:#FAAFBE;"> Shipper Login Protol </mark></h2>
	<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="field-group">
		<div><label for="login">Email</label></div>
		<div><input name="email" type="text" class="input-field"></div>
	</div>
	<div class="field-group">
		<div><label for="password">Password</label></div>
		<div><input name="password" type="password" class="input-field"> </div>
	</div>
	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
	</div> 
	<h3> can not login ? sign up here </h3>
</form><br>

<a href="http://localhost/user_login/shippersignin.php"><button class="btn btn-primary">Sign up</button></a>

<?php 
} else { 
$result = mysqlI_query($conn,"SELECT * FROM shipper WHERE ship_id='" . $_SESSION["ship_id"] . "'");
$row  = mysqli_fetch_array($result);
?>


<!-- this is main page -->


<head>
 <title> ONLINE SHOPPING </title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
</head>

<style>

#wrapper{ position:relative; }
#button{ position:absolute; top: 10px; left:0px; z-index:10; }
img{max-width:100%; }	

img {
    border-radius: 8px;
}

div.inset {
border-style: inset;
}

h1,p,h3{
font-family:Courier New;
font-variant: small-caps;
color:black;
padding-left:2%;
}

h4{
font-family:Comic Sans MS;
}

html {
    margin: 0;
    padding: 0;
}
body {
    font-family: 'Handlee', cursive;
    font-size: 13pt;
    background-color: #efefef;
    padding: 10px;
    margin: 0;
}
h1 {
    font-size: 15pt;
    color: red;
    text-align: center;
    padding: 0 0 0 0;
    margin: 0 0 10px 0;
}
h1 span {
    border: 4px dashed blue;
    padding: 10px;
}
p {
    padding: 0;	
    margin: 0;
}



</style>

<br><br>

<div class="jumbotron">
<div class="col-sm-0.5">
	<img src="https://scontent.cdninstagram.com/t51.2885-19/s150x150/22794392_516155352083166_5793438534685687808_n.jpg" align="left" width="100" height="80"/>
	</div><br>
<h1 align="center" color="black"> <b> WELCOME TO ONLINE SHOPPING </b> </h1>
<p align="center" style="font-size:160%;">(	<u>Bengaluru</u>)</p>



<form action="" method="post" id="frmLogout">
<div class="member-dashboard">Welcome <?php echo ucwords($row['ship_fname']); ?>, You have successfully logged in!<br>
Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
</form>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="container" style="width:95%;">
	<h2 align="center">These are your Orders</h2>
	<h3 align="center"><b> "SHIP" </b> as soon as possible</h3>
    <?php
	$connect = mysqli_connect("localhost", "root", "", "project");
	$query = "select O.order_id,O.cus_id,O.prod_id,C.address,C.city,C.pincode,C.phone
				from customer C,orders O
				where C.cus_id=O.cus_id AND
				ship_id=' " . $_SESSION["ship_id"] . " ' ";
	$result = mysqli_query($connect, $query);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table class='table-striped table table-bordered'>";
	echo "<th>
			<tr><td><b>order_id</td><td><b>cus_id</td><td><b>prod_id</td><td><b>address</td><td><b>city</td><td><b>pincode</td><td><b>phone</td></tr>
		</th>";
    while($row = $result->fetch_assoc()) {
			echo "<tr>
				<td>$row[order_id]</td><td>$row[cus_id]</td><td>$row[prod_id]</td><td>$row[address]</td><td>$row[city]</td><td>$row[pincode]</td><td>$row[phone]</td>
				</tr>";
				}
	echo "</table>";
	
} else {
    echo "0 results";
}
$conn->close();
?>

    </div>
 </body>
 

 
<br><br><hr>
<!-- footer -->
<div class="row slideanim">
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>SHOPPING QUOTE</h3>
      <h5><i>Black Friday is not another bad hair day in Wall Street. <br>
	  It's the term used by American retailers to describe the day after the Thanksgiving Holiday, seen as the semi-official start of Christmas shopping season. <br> </i></h5>
		   <img src="https://www.mandalaybay.com/content/dam/MGM/mandalay-bay/retail/mandalay-bay-retail-resort-shops-shopping-bags.tif" width="200" height="200"> 
	</div>
    <div class="col-sm-4">
      <h3>FIND US @</h3>
	  <h4><address>
		BANGALORE INSTITUTE OF TECHNOLOGY <br>
		K.R. ROAD , V V PURAM <br>
		BANGALORE-560004, INDIA <br>
		<strong>Mail To</strong>
		<a href="mailto:#">patilakhilesh5@gmail.com</a><br>
		<aabr title="Phone">Phone :</abbr> (+91)8073451684<br>
		</address>
	  </h4>
     </div>
    <div class="col-sm-4">
      <h3>MAP TO OFFICE</h3>       
<div id="map" style="width:400px;height:250px;background:lightblue"></div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng(51.5, -0.2), zoom: 10
  };
  var map = new google.maps.Map(mapCanvas, mapOptions);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqNorbysFavxBCpYt5XFnj8j9bBuZ41Xg&callback=myMap"></script>	  
     </div>
  </div>
</div>
</div>
<br><br>

<footer class="container-fluid text-center">
	<a href="#myPage" title="To Top">
	<span class="glyphicon glyphicon-chevron-up"></span>
	</a>
	<a href="#myPage" title="To Top">GO-UP
    <span class="glyphicon glyphicon-chevron-up"></span>
	</a>
	<br><br>
  <h5 align="center"> Copyrights &copy 2017 Akhilesh | All rights reserved | </h5>
</footer>
 

<?php } ?>

</body>
</div>

</html>