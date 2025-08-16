<?php 
	$updateid = $_GET['updateid'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modify Record</title>
	<?php 
		require_once("mysqli_connect.php");
		require_once("head.php"); 
		$query = "SELECT * FROM transactions WHERE sn = '$updateid'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$sn = $row['sn'];
		$type = $row['type'];
		$quantity = $row['quantity'];
		$description = $row['description'];
		$rate = $row['rate'];

	?>

</head>
<body>
	<div class="container-fluid" >
		<div class="row">
			<div class="col-md-12">
				<h1>Transaction Management</h1>

				<form name="transaction" method="POST" action="modify.php?updateid=<?php echo $row["sn"]; ?>" enctype="multipart/form-data">

					<div class="form-group spaceup">
				  		<label for="select type of transaction" style="font-style: oblique;"><b>Type of Transaction:</b></label>
				  		<select name="transaction_type" class="form-control" id="select_transaction" value="<?php echo $type; ?>">
				  			<option selected="<?php echo $type; ?>"><?php echo $type; ?></option>
				    		<option>Credit</option>
				    		<option>Debit</option>
				    	 </select>
					</div>
				
				   <div class="form-group spaceup">
				      <label for="description" style="font-style: oblique;"><b>Description:</b></label>
				     <textarea name="description" class="form-control" rows="5" cols="30" placeholder="Type description" value="<?php echo $description; ?>" required><?php echo $description; ?> </textarea> 
				 	</div>
				 	
				 	<div class="form-group spaceup">
				      <label for="Quantity" style="font-style: oblique;"><b>Enter Quantity:</b></label>
				      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Type quantity" value="<?php echo $quantity; ?>" required>
				    </div>
				 
				    <div class="form-group spaceup">
				      <label for="Rate" style="font-style: oblique;"><b>Enter Rate:</b></label>
				      <input type="number" class="form-control" id="rate" name="rate" placeholder="Type rate" value="<?php echo $rate; ?>" required>
				    </div>

				    <button type="submit" id="submit" class="btn btn-primary spaceup" onclick="validate()">Submit</button>
				     <button type="reset" class="btn btn-primary spaceup">Reset</button>
				  </form>
				</div>
			</div>
		</div>
		
</body>
</html>