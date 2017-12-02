<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");
	
$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM customer WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	
	if(is_array($row)) {
	$_SESSION["cus_id"] = $row['cus_id'];
	$_SESSION["email"]=$row['email'];
	} else {
	$message = "Invalid Username or Password!";
	}
}

if(!empty($_POST["logout"])) {
	$_SESSION["cus_id"] = "";
	session_destroy();
	
}

?>


<div style="display:block;margin:0px auto;" class="text-align">

<?php if(empty($_SESSION["cus_id"])) { ?>
<form action="index.php" method="post" id="frmLogin">
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

<?php 
} 
?>

</div>

</html>
