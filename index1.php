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
	
	<link rel="stylesheet" href="style.css"/>
	
</head>

<?php

	// everytime the connection happens
	$conn = mysqli_connect("localhost","root","","project");
	
	
	$message="";

	if(!empty($_POST["login"])) {    // incase you hit login and session does not exists
		
		$result = mysqli_query($conn,"SELECT * FROM customer WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
		$row  = mysqli_fetch_array($result);
		
		if(is_array($row)) {
			
			session_start();
			
			$_SESSION["cus_id"] = $row['cus_id'];
			$_SESSION["email"]  = $row['email'];
			
		}else {
			$message = "<h1 class='alert alert-danger'>Invalid Username or Password!</h1>";
		}
	}
?>

	<div style="display:block;margin:0px auto;" class="text-align">

	<?php if(empty($_SESSION["cus_id"])){ ?>
	
			<form action="" method="post" id="frmLogin">
				<h2> Customer Login Protol </h2>
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
			</form>
			<a href="customersignup.php"><button class="button">Sign up</button></a>

	<?php } 
		else {                     
			$result = mysqli_query($conn,"SELECT * FROM customer WHERE cus_id='" . $_SESSION["cus_id"] . "'");
			$row  = mysqli_fetch_array($result);
		}

	?>

<!-- this is main page -->

<!-- drop box menu -->
<?php 
	if(!empty($_SESSION["cus_id"]))
	{
?>

	<div id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

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
						<li><a href="crazy.html">Play</a></li>
						<li><a href="onemore.html">About</a></li>
					</ul>
				</div>
			</div>
		</nav>

	</div>

	<br><br>

	<div class="col-sm-0.5">
		<img src="https://scontent.cdninstagram.com/t51.2885-19/s150x150/22794392_516155352083166_5793438534685687808_n.jpg" align="left" width="100" height="80"/>
	</div>
	<br>
	<h1 align="center" color="black"> <b> WELCOME TO ONLINE SHOPPING </b> </h1>
	<p align="center" style="font-size:160%;">(	<u>Bengaluru</u>)</p>

	<!-- logout form -->
	<form action="" method="post" id="frmLogout">
		<div class="member-dashboard">Welcome <?php echo ucwords($row['cus_fname']); ?>, You have successfully logged in!<br>
		Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
	</form>
	
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
</div>

<?php
	if(!empty($_POST["logout"])) {
		$_SESSION["cus_id"] = "";
		session_destroy();
		header('index.php');
	}
?>