<?php
session_start();
require_once("database.php");
require_once("functions.php");
require_once("head.php");

$table = "transactions";
$query = "SELECT * FROM $table WHERE credit > 0";
$result = mysqli_query($con, $query);

$transactions = [];
while ($row = mysqli_fetch_assoc($result)) {
    $transactions[] = $row;
}

$total_credit_query = "SELECT sum(credit) as 'Amount' FROM $table";
$total_credit_result = mysqli_query($con, $total_credit_query);
$total_credit_row = mysqli_fetch_assoc($total_credit_result);
$total_credit = $total_credit_row['Amount'];

?>
<!DOCTYPE html>
<html>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1>Credit transactions</h1>
				<p>
					<a href="all_transactions.php">All</a> |
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
			        <th>CREDIT</th>
			        <th>BALANCE</th>
			      </tr>
			    </thead>
			    <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr style='margin-top:100px;margin-bottom:100px;'>
                        <td><?php echo $transaction['sn']; ?></td>
                        <td><?php echo wordwrap($transaction['trans_date'], 10, "<br>\n"); ?></td>
                        <td><?php echo $transaction['narrations']; ?></td>
                        <td><?php echo $transaction['credit']; ?></td>
                        <td><?php echo $transaction['balance']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr style='margin-top:100px;margin-bottom:100px;'>
                    <td colspan='4'><b><i>Total</i></b></td>
                    <td><b><i><?php echo $total_credit; ?></i></b></td>
                </tr>
			    </tbody>
			  </table>
			</div>
		</div>
	</div>

	<?php require_once("footer.php"); ?>
</body>
</html>
