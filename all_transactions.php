<!DOCTYPE html>
<?php session_start();?>
<html>
<?php 
	require_once("mysqli_connect.php");
	require_once("head.php");
	$table = "transactions"
 ?>
<body>
	<?php 
		$query = "SELECT * FROM $table ";
		$result = mysqli_query($con, $query);

	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1>All transactions</h1>
				<p>
					<a href="credit_transactions.php">Credit Transactions</a> | 
					<a href="debit_transactions.php">Debit Transactions</a> | 
					<a href="profloss.php">Profit/Loss Summary</a> | 
					<a href="loan_repayment_summary.php">Loan Repayment Summary</a>
				</p>
				<p><a href='index.php'>Home</a><br></p>
				<table class="table table-hover table-responsive-sm tbl" style=" margin-left: auto; margin-right: auto; font-size: 12px;">
			    <thead>
			      <tr>
			        <th>No</th>
			        <th>TRANS. DATE</th>
			        <th>NARRATIONS</th>
			        <th>DEBIT</th>
			        <th>CREDIT</th>
			        <th>BALANCE</th>
			        
        	      </tr>
			    </thead>
			    <tbody>

			    <?php
			    while ($row = mysqli_fetch_assoc($result)){
						$sn = $row['sn'];
						$date = $row['trans_date'];
						$narrations = $row['narrations'];
						$debit = $row['debit'];
						$credit = $row['credit'];
						$balance = $row['balance'];
						


					
			      echo"<tr style='margin-top:50px;margin-bottom:50px;'>
			        <td>" . $sn . "</td>
			        <td>" . wordwrap($date, 10,"<br>\n") . "</td>
			        <td>" . $narrations . "</td>
			        <td>". $debit . "</td>
			        <td>". $credit . "</td>
			        <td>" . $balance . "</td>"

			       ?>
			        <!-- <a href='edit.php?updateid=<?php echo $row["sn"]; ?>'> modify </a> -->

			        <?php
			          // echo "</td>";
			          echo "</tr>";
			    }
			    ?>
			      


			    </tbody>
			  </table>


				<?php
					
				?>
			</div>
		</div>
	</div>
	
	<?php require_once("footer.php"); ?>
</body>
</html>