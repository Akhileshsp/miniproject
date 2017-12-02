<html>
<head> <title> FORM site </title>

<style>
	form{
	padding-top:20px;
	text-align:center;
	font-size:15px;
	}
	input{
	width:250px;
	heighth:30px;
	font-size:20px;
	}
		
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
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

<?php
$cus_fname = $cus_lname = $address = $city = $pincode = $email = $phone = "";
?>


<body class='container'>

<div class="col-sm-0.5">
	<img src="https://scontent.cdninstagram.com/t51.2885-19/s150x150/22794392_516155352083166_5793438534685687808_n.jpg" align="left" width="100" height="80"/>
	</div><br>
<h1 align="center" style="color:red;"> <b> WELCOME TO ONLINE SHOPPING </b> </h1>
<p align="center" style="font-size:160%;">(Bengaluru)</p>


<form class='container' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
cus_fname:<br><input class='form-control' type="text" name="cus_fname"><br>
cus_lname:<br><input class='form-control' type="text" name="cus_lname"><br>
address:<br><input class='form-control' type="text" name="address"><br>
city:<br><input class='form-control' type="text" name="city"><br>
pincode:<br><input class='form-control' type="text" name="pincode"><br>
phone:<br><input class='form-control' type="text" name="phone"><br>
email:<br><input class='form-control' type="email" name="email"><br>
password:<br><input class='form-control' type="password" name="password"><br>
<input class='form-control btn btn-success' type="submit" value="Submit">
</form>


<?php

$cus_fname=filter_input(INPUT_POST,'cus_fname');
$cus_lname=filter_input(INPUT_POST,'cus_lname');
$address=filter_input(INPUT_POST,'address');
$city=filter_input(INPUT_POST,'city');
$pincode=filter_input(INPUT_POST,'pincode');
$email=filter_input(INPUT_POST,'email');
$phone=filter_input(INPUT_POST,'phone');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql1="INSERT INTO customer(cus_fname,cus_lname,address,city,pincode,email,phone)
	values ('$cus_fname','$cus_lname','$address','$city','$pincode','$email','$phone') ";


if($conn->query($sql1)){
		
		echo "<p class='alert alert-success'>new record is inserted successfully<p>";
	}
 
$sql2 = "SELECT cus_fname,cus_lname,address,city,pincode,email,phone from customer";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table class='table-striped table table-bordered'>";
	echo "<th>
			<tr><td><b>fname</td><td><b>lname</td><td><b>address</td><td><b>city</td><td><b>pincode</td><td><b>email</td><td><b>phone</td></tr>
		</th>";
    while($row = $result->fetch_assoc()) {
			echo "<tr>
				<td>$row[cus_fname]</td><td>$row[cus_lname]</td><td>$row[address]</td><td>$row[city]</td><td>$row[pincode]</td><td>$row[email]</td><td>$row[phone]</td>
				</tr>";
				}
	echo "</table>";
	
} else {
    echo "0 results";
}
$conn->close();
?>


</body>

</html>