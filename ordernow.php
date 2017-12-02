<html>


 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php

session_start();
$conn = mysqli_connect("localhost","root","","project");


	if(!empty($_SESSION["cart"]))
	{

		$total = 0;
		$one=1;
		foreach($_SESSION["cart"] as $keys => $values)
		{
		
			$sql="INSERT INTO orders(cus_id,prod_id,quantity,ship_id) values (' " . $_SESSION['cus_id'] . " ',' " . $values['product_id'] . " ',' " . $values['item_quantity'] . " ','$one') ";
			$conn->query($sql);
			
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
	
		}
	}			
	
?>

 <form action="mail.php" method="post">
 <input type="submit" name="order" style="margin-top:5px;" class="btn btn-default" value="Confirm Order">
 </form>

<style>

body{
	background-color:lightgray;
}

</style>

<title>Confirm </title>
 <div class="text-center">
 <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">RS. <?php echo number_format($total, 2); ?></td>
        <td></td>
</tr>

<h2> Your orders has been confirmed </h2>
<h3> Our shippers will call you soon once they start shipping ! <h3>
<h4> Thank you <h4>
</div>

<form action="/user_login" method="post" id="frmLogout">
<input type="submit" name="logout" value="<-- GO back" class="logout-button">.</div>
</form>

</html>

