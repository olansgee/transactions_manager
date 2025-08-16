<!DOCTYPE html>
<?php session_start();?>
<html>


<body>
    <?php 
        require_once("mysqli_connect.php");
        require_once("head.php");
        $table = "transactions";
     

        $query = "SELECT * FROM $table ";
        $result = mysqli_query($con, $query);

    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Profit/Loss transactions</h1>

                <p>
                    <a href="all_transactions.php">All</a> | 
                    <a href="credit_transactions.php">Credit Transactions</a> | 
                    <a href="debit_transactions.php">Debit Transactions</a> |  
                    <a href="loan_repayment_summary.php">Loan Repayment Summary</a>
                </p>
                <p><a href='index.php'>Home</a><br></p>

                <form class="form" name="transaction" method="POST" action="profloss.php" enctype="multipart/form-data">

                    <div class="form-group spaceup">
                        <label for="From Date" style="font-style: oblique;"><b>From date:</b></label>
                        <input type="date" class="form-control" id="date1" name="date1" placeholder="Select from date" required>
                    </div>

                    <div class="form-group spaceup">
                        <label for="To Date" style="font-style: oblique;"><b>To date:</b></label>
                        <input type="date" class="form-control" id="date2" name="date2" placeholder="Select to date" required>
                    </div>

                    <button type="submit" id="submit" class="btn btn-primary spaceup" >Submit</button>
                     <button type="reset" class="btn btn-primary spaceup">Reset</button>
                  </form>
                  <br><br>
                <div class="profloss">

                  <?php 
                    @$from_date = date_create($_POST['date1']);
                    @$to_date = date_create($_POST['date2']);
                    $from = date_format($from_date,"Y/m/d" );
                    $to = date_format($to_date,"Y/m/d" );
                    $query = "SELECT trans_date,sum(credit) as 'total credit' , count(credit) as 'number_of_credit', avg(credit) as 'average_cr_transaction' from $table WHERE credit > 0 AND (trans_date BETWEEN '$from' AND '$to') ";
                    $result1 = mysqli_query($con, $query);
                    while ($row1 = mysqli_fetch_assoc($result1)){
                        $date = $row1['trans_date'];
                        $total_credit = $row1['total credit'];
                        $num_of_cr_transaction = $row1['number_of_credit'];
                        $average_cr_transaction =  $row1['average_cr_transaction'];
                        
                        
                    }

                    
                     $query = "SELECT trans_date,sum(debit) as 'total debit' , count(debit) as 'number_of_debit', avg(debit) as 'average_dr_transaction' from $table WHERE debit > 0 AND (trans_date BETWEEN '$from' AND '$to') ";
                    $result1 = mysqli_query($con, $query);
                    while ($row1 = mysqli_fetch_assoc($result1)){
                        $date = $row1['trans_date'];
                        $total_debit = $row1['total debit'];
                        $num_of_dr_transaction = $row1['number_of_debit'];
                        $average_dr_transaction =  $row1['average_dr_transaction'];
                        
                    }
                    $profloss = $total_credit > $total_debit ?  "<font color='blue'>(Profit)</font>" :  "<font color='red'>(Loss)</font>";
                    ?>
                </div>
                <table class="table table-hover table-responsive-sm tbl" style="width: 65%; margin-left: auto; margin-right: auto;">
                    <thead>
                      <tr>
                        <th colspan="2" style="font-size: 24px;">Periodic Summary for:<font color="blue"> <?php echo $from ?> </font> to <font color="blue"><?php echo $to ?> </font></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Total Credit transaction</td><td align="right"><?php echo $total_credit; ?></td>
                      </tr>
                      <tr>
                        <td>Total Debit transaction</td><td align="right"><?php echo $total_debit;?></td>
                      </tr>
                      <tr>
                        <td>Number of credit transactions</td><td align="right"><?php echo $num_of_cr_transaction; ?></td>
                      </tr>
                      <tr>
                        <td>Number of debit transaction</td><td align="right"><?php echo $num_of_dr_transaction; ?></td>
                      </tr>
                      <tr>
                        <td>Average credit transaction</td><td align="right"><?php echo $average_cr_transaction   ?></td>
                      </tr>
                      <tr>
                        <td>Average debit transaction</td><td align="right"><?php echo $average_dr_transaction ?></td>
                      </tr>
                      <tr>
                        <td>Profit/Loss</td><td align="right"><?php echo $total_credit - $total_debit . $profloss ?></td>
                      </tr>
                      
                    
                    </tbody>
                </table>
                <?php 
                
               $query = "SELECT trans_date, credit from $table WHERE (trans_date BETWEEN '$from' AND '$to') GROUP BY trans_date ";
                $result = mysqli_query($con,$query);
                    if ($result){
                        $trans_date = array();
                        $credit = array();
                
                    while ($rows = mysqli_fetch_assoc($result)){
                        $trans_date[] = $rows['trans_date'];
                        $credit[] = $rows['credit'];
                     
                     
                    }
                    

                     $data_string = "[" . join(", ", $credit) . "]"  ;
                     $labels_string = "['" . join("', '", $trans_date) . "']";

                   
                 
                }

                

                ?>
                <center>
                    <h4>Periodic Credit Graph</h4>
                    <canvas id="cvs" width="700" height="300">
                        [No canvas support]
                    </canvas>
                    <script>
                        chart = new RGraph.Bar({
                            id: 'cvs',
                            data: <?php print($data_string); ?>,
                            options: {
                                marginLeft: 2,
                                marginRight: 2,
                                marginInner: 2,
                                tickmarksStyle: 'endcircle',
                                xaxisLabels: false,
                                colors: 'green'
                            }
                        }).draw()
                    </script>
<br><br><br><br>
<!-- ----------------------------------------------------- -->

            <?php 
                
               $query = "SELECT trans_date, debit from $table WHERE (trans_date BETWEEN '$from' AND '$to') GROUP BY trans_date ";
                $result = mysqli_query($con,$query);
                    if ($result){
                        $trans_date = array();
                        $debit = array();
                
                    while ($rows = mysqli_fetch_assoc($result)){
                        $trans_date[] = $rows['trans_date'];
                        $debit[] = $rows['debit'];
                     
                    }
                    
                     $data_string = "[" . join(", ", $debit) . "]";
                     $labels_string = "['" . join("', '", $trans_date) . "']";
                 
                }

                

                ?>
                <center>
                    <h4>Periodic Debit Graph</h4>
                    <canvas id="cvt" width="700" height="300">
                        [No canvas support]
                    </canvas>
                    <script>
                        chart = new RGraph.Bar({
                            id: 'cvt',
                            data: <?php print($data_string); ?>,
                            options: {
                                marginLeft: 2,
                                marginRight: 2,
                                marginInner: 2,
                                tickmarksStyle: 'endcircle',
                                xaxisLabels: false,
                                
                            }
                        }).draw()
                    </script>








<!-- ----------------------------------------------------- -->

                   <!--  <div style="position: relative">
                        <canvas id="axes" width="41" height="200" style="position: absolute; top: 0; left: 0; z-index: 3"></canvas>
                        <div style="width: 1100px; overflow: auto">
                            <canvas id="cva" width="1000" height="400"></canvas>
                        </div>
                    </div> -->
                    <!-- <script>
                        // This is the code that produces the chart
                        new RGraph.Bar({
                            id: 'cva',
                            data: <?php //print_r($data_string); ?>,
                            options: {
                                xaxisLabels: <?php// print($labels_string); ?>,
                                
                                xaxis: false,
                                yaxis: false,
                                yaxisLabels: false,
                                marginInner: 5,
                                tickmarksStyle: 'endcircle',
                            marginInner: 5
                            }
                        }).draw();
                        
                        new RGraph.Drawing.YAxis({
                            id: 'axes',
                            x: 40,
                            options: {
                                yaxisScaleMax: line.scale2.max,
                                colors: ['black'],
                                textSize: 8,
                                textAccessible: false
                            }
                        }).draw();
                    </script> -->

                </center>
            </div>
        </div>
    <?php require_once("footer.php"); ?>
</body>
</html>