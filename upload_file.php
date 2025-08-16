<!DOCTYPE html>
<html>
<?php require_once("head.php"); ?>
<body>
	

	<div class="container-fluid" >
		<h3 style="text-align: center;">Transaction Management</h3>
		<div class="row">
			<div class="col-md-6">
				<h5>Upload Data File</h5>
				<form name="transaction_file" method="POST" action="upload.php" enctype="multipart/form-data">

					 	<div class="form-group spaceup">
					      <label for="upload file" style="font-style: oblique;"><b>Upload file:</b></label>
					      <input type="file" class="form-control" id="file" name="file" placeholder=" file" required>
					    </div>
					 
					    
					    <button type="submit" id="submit" class="btn btn-primary spaceup" onclick="validate()">Upload</button>
					    
					  </form>
				 </div>
			</div>
		</div>
		<br>
		<p><a href="all_transactions.php">All Transactions</a> | <a href="credit_transactions.php">Credit Transactions</a> | <a href="debit_transactions.php">Debit Transactions</a> | <a href="profloss.php">Profit/Loss Summary</a> | <a href="loan_repayment_summary.php">Loan Repayment Summary</a></p>
		
 <?php require_once("footer.php"); ?>
	
</body>
</html>