<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");
	
$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM customer WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	
	if(is_array($row)) {
	$_SESSION["cus_id"] = $row['cus_id'];
	} else {
	$message = "Invalid Username or Password!";
	}
}

if(!empty($_POST["logout"])) {
	$_SESSION["cus_id"] = "";
	session_destroy();
}

?>
<html>
<head>
<title>User Login</title>
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
<div style="display:block;margin:0px auto;" class="text-align">

<?php if(empty($_SESSION["cus_id"])) { ?>
<form action="" method="post" id="frmLogin">
<h2><mark style="background-color:#FAAFBE;"> Customer Login Protol </mark></h2>
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

<a href="customersignup.php"><button class="btn btn-primary">Sign up</button></a>


<?php 
} else { 
$result = mysqlI_query($conn,"SELECT * FROM customer WHERE cus_id='" . $_SESSION["cus_id"] . "'");
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

<!-- DropBox menu -->
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
	  </button>
      <a class="navbar-brand" href="#myPage">HOME</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">SHOP</a></li>
        <li><a href="#orders">Orders</a></li>
        <li><a href="#gallery">Offers</a></li>
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Category<span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <li><a href="#electronics">Electronics</a></li>
          <li><a href="#books">Books</a></li>
          <li><a href="#clothing">Clothing</a></li>
		  <li><a href="#shoes">Shoes</a></li>
        </ul>
      </li>
        <li><a href="onemore.html">About</a></li>
      </ul>
    </div>
	

  </div>
</nav>
</body><br><br>



<div class="col-sm-0.5">
	<img src="https://scontent.cdninstagram.com/t51.2885-19/s150x150/22794392_516155352083166_5793438534685687808_n.jpg" align="left" width="100" height="80"/>
	</div><br>
<h1 align="center" color="black"> <b> WELCOME TO ONLINE SHOPPING </b> </h1>
<p align="center" style="font-size:160%;">(	<u>Bengaluru</u>)</p>



<form action="" method="post" id="frmLogout">
<div class="member-dashboard">Welcome <?php echo ucwords($row['cus_fname']); ?>, You have successfully logged in!<br>
Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
</form>

<!-- images to buy -->

<?php
$connect = mysqli_connect("localhost", "root", "", "project");
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="container" style="width:95%;">
	<h2 align="center">NON STOP shopping ! shop at your finger tips</h2>
	<h3 align="center">It's an <b> "ADD TO CART" </b> kinda day </h3>
    <?php
	$query = "SELECT * FROM products ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div class="col-md-3">
            <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
            <div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
            <img src="<?php echo $row["image"]; ?>" class="img-responsive">
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">RS. <?php echo $row["price"]; ?></h5>
            <input type="text" name="quantity" class="form-control" value="1">
			<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="Add to Bag">
            </div>
            </form>
            </div>
            <?php
		} 
	}
	?>
    <div style="clear:both"></div>
    <h2>My Shopping Bag</h2>
	
    <div class="table-responsive">
    <table id=orders class="table table-striped">
    <tr>
    <th width="40%">Product Name</th>
    <th width="10%">Quantity</th>
    <th width="20%">Price Details</th>
    <th width="15%">Order Total</th>
    <th width="5%">Action</th>
    </tr>
    <?php
	if(!empty($_SESSION["cart"]))
	{
		$total = 0;
		foreach($_SESSION["cart"] as $keys => $values)
		{
			?>
            <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"] ?></td>
            <td>RS. <?php echo $values["product_price"]; ?></td>
            <td>RS. <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
            <td><a href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">Remove</span></a></td>
            </tr>
            <?php 
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		?>
        <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">RS. <?php echo number_format($total, 2); ?></td>
        <td></td>
        </tr>
        <?php
	}
	?>
    </table>
    </div>
    </div>
  
  </div>
 </body>
 
 <form action="ordernow.php" method="post">
 <input type="submit" name="order" style="margin-top:5px;" class="btn btn-default" value="Order Now">
 </form>
 
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
    <div id="about" class="col-sm-4">
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
 
 <?php

$subject = 'Order details';
$from = 'patilakhilesh5@gmail.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Hi</h1>';
$message .= '<p style="color:#080;font-size:18px;">Your Order has been Confirmed</p>';
$message .= '</body></html>';
 
// Sending email
if(mail($row['email'], $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}
?>

<?php } ?>

</body>

</html>