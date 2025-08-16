<?php
	require_once("mysqli_connect.php");
	require_once("head.php");
	$updateid = $_GET['updateid'];
	$query = "SELECT * FROM transactions WHERE sn = '$updateid'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$sn = $row['sn'];
		$type = $_POST['transaction_type'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];
		$rate = $_POST['rate'];


	$query = "UPDATE transactions SET type = '$type', quantity = '$quantity', description = '$description', rate = '$rate', amount = quantity*rate   WHERE sn = '$updateid'";
	$result = mysqli_query($con, $query);
	if ($result){
		echo "Record updated <b>SUCCESSFULLY</b>";

		$query = "SELECT * FROM transactions WHERE sn = '$updateid'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$sn = $row['sn'];
		$type = $row['type'];
		$description = $row['description'];
		$quantity = $row['quantity'];
		$rate = $row['rate'];
		$amount = $row['amount'];
	?>
	<center>
		<table class="table table-hover table-responsive-sm tbl" style="width:50%; ">
			   </tbody>
			      <tr>
			        <td style="font-weight: bold; width: 25px;text-align: right;">SN</td><td style="width: 250px;"><?php echo $sn ?></td>
			      </tr>
			      <tr>
			        <td style="font-weight: bold; width: 25px;text-align: right;">Type</td><td style="width: 250px;"><?php echo $type ?></td>
			      </tr>
			      <tr>
			        <td style="font-weight: bold; width: 25px;text-align: right;">Description</td><td style="width: 250px;"><?php echo wordwrap($description,35,"<br>\n"); ?></td>
			      </tr>
			      <tr>
			        <td style="font-weight: bold; width: 25px;text-align: right;">Quantity</td><td style="width: 250px;"><?php echo $quantity ?></td>
			      </tr>
			      <tr>
			        <td style="font-weight: bold; width: 25px;text-align: right;">Rate</td><td style="width: 150px;"><?php echo $rate ?></td>
			      </tr>
			      <tr>
			        <td style="font-weight: bold; width: 25px; text-align: right;">Amount</td><td style="width: 250px;"><b><?php echo $amount ?></b></td>
			      </tr>
			    </tbody>
			</table>
		</center>
		<?php
		}

	require_once("footer.php");
	?>
