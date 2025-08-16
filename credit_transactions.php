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
        $query = "SELECT * FROM $table WHERE credit > 0 ";
        $result = mysqli_query($con, $query);

    ?>
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

                <?php
                while ($row = mysqli_fetch_assoc($result)){
                        $sn = $row['sn'];
                        $date = $row['trans_date'];
                        $narrations = $row['narrations'];
                        $credit = $row['credit'];
                        $balance = $row['balance'];

                    
                   echo"<tr style='margin-top:100px;margin-bottom:100px;'>
                    <td>" . $sn . "</td>
                    <td>" . wordwrap($date, 10,"<br>\n") . "</td>
                    <td>" . $narrations . "</td>
                    <td>". $credit . "</td>
                    <td>" . $balance . "</td>";

                }
                 echo"<tr style='margin-top:100px;margin-bottom:100px;'>
                    <td colspan='5'><b><i>Total</i></b></td>";
                $query = "SELECT sum(credit) as 'Amount' FROM $table ";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['Amount'];

                echo  "<td><b><i>" . $sum . "</i></b></td>
                <td></td>
                    </tr>";
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