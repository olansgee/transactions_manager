<!DOCTYPE html>
<html>
<?php require_once("head.php"); ?>
<body>
	

	<div class="container-fluid" >
		<h3 style="text-align: center;">Transaction Management</h3>
		<div class="row">
			<div class="col-md-6">
				<h5 style="float:left">Input your Data</h5> 
				<a href="upload_file.php"> <button class="btn btn-primary" >Or Upload Data File</button> </a>
				<br><br>

				<form name="transaction" method="POST" action="process.php" enctype="multipart/form-data">

					<div class="form-group spaceup">
				  		<label for="select type of transaction" style="font-style: oblique;"><b>Type of Transaction:</b></label>
				  		<select name="transaction_type" class="form-control" id="select_transaction">
				  			<option>Select Type of Transaction </option>
				    		<option>Credit</option>
				    		<option>Debit</option>
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
		<br>
		<p><a href="all_transactions.php">All Transactions</a> | <a href="credit_transactions.php">Credit Transactions</a> | <a href="debit_transactions.php">Debit Transactions</a> | <a href="profloss.php">Profit/Loss Summary</a> | <a href="loan_repayment_summary.php">Loan Repayment Summary</a></p>
		
 <?php require_once("footer.php"); ?>
	
</body>
</html>