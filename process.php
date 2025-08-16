<?php session_start();
require_once("mysqli_connect.php");

$transaction_type = $_POST['transaction_type'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$rate = $_POST['rate'];
//$amount = $rate * $quantity;
$datetime=date('y/m/d h:i:s');



$query = "INSERT INTO transactions (date, description, quantity, rate, amount, type) VALUES ('$datetime', '$description', '$quantity', '$rate', $quantity*$rate, '$transaction_type')";

$result = mysqli_query($con, $query);

if (!$result){
	echo "Data <b>NOT</b> submitted" . mysqli_error($con);
} 
else{
	echo "Data submitted <b>SUCCESSFULLY</b><br>"; 
	echo "<b><i>Want to submit another record?</i></b> Go right ahead!<br>";
	echo "<a href='index.php'>Home</a><br>";
}

?>

<!DOCTYPE html>
<html>
<?php require_once("head.php"); ?>
<body>
	

	<div class="container-fluid" >
		<div class="row">
			<div class="col-md-12">
				<h1>Transaction Management</h1>

				<form name="transaction" method="POST" action="process.php" enctype="multipart/form-data">

					<div class="form-group spaceup">
				  		<label for="select type of transaction" style="font-style: oblique;"><b>Type of Transaction:</b></label>
				  		<select name="transaction_type" class="form-control" id="select_transaction">
				  			<option>Select Type of Transaction </option>
				    		<option>Credit</option>
				    		<option>Debit</option>
				    		<option>Loan  Credit</option>
				    		<option>Loan  Debit</option>
				    	</select>
					</div>
				
				   <div class="form-group spaceup">
				      <label for="description" style="font-style: oblique;"><b>Description:</b></label>
				     <textarea name="description" class="form-control" rows="5" cols="30" placeholder="Type description" required> </textarea> 
				 	</div>
				 	
				 	<div class="form-group spaceup">
				      <label for="Quantity" style="font-style: oblique;"><b>Enter Quantity:</b></label>
				      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Type quantity" required>
				    </div>
				 
				    <div class="form-group spaceup">
				      <label for="Rate" style="font-style: oblique;"><b>Enter Rate:</b></label>
				      <input type="number" class="form-control" id="rate" name="rate" placeholder="Type rate" required>
				    </div>

				    <button type="submit" id="submit" class="btn btn-primary spaceup" onclick="validate()">Submit</button>
				     <button type="reset" class="btn btn-primary spaceup">Reset</button>
				  </form>
				</div>
			</div>
		</div>
		
 <?php require_once("footer.php"); ?>
	
</body>
</html>

