<?php
include 'layout/hed.php';

$count = 1;
$data='';
$print='';


$acc_name_sql = select("SELECT * FROM account_tb");

if(isset($_GET['acn']) && isset($_GET['df']) && isset($_GET['dt'])){
    $acc_name = $_GET['acn'];
    $dfrom = $_GET['df'];
    $dto = $_GET['dt'];

    $sql = select("SELECT * FROM transaction_tb WHERE creditAccID='$acc_name' && date BETWEEN '$dfrom' AND '$dto' || debitAccID='$acc_name' && date BETWEEN '$dfrom' AND '$dto'  ");

    $ac_name = select("SELECT * FROM account_tb WHERE account_id='$acc_name' ");
    foreach($ac_name as $a_name){}

    $data = "FOR ".$a_name['account_name']." AS AT ".$dto."<hr>";
    $bal = "TOTAL ACCOUNT BALANCE: GHC ".$a_name['acc_balance'];

//    $print = '<a href="print_report.php?acn='.$acc_name.'&df='.$dfrom.'&dt='.$dto.'" class="btn" >Print</a>';

}else{

$sql = select("SELECT * FROM transaction_tb");

    $data = "FOR ALL TRANSACTION AS AT ".date('D d, M Y');

//    $print = '<a href="print_report.php" class="btn" >Print</a>';
}

?>

<script>
window.print();
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">


            <h3>FINANCIAL REPORT <?php echo @$data; ?></h3>
            <p><?php echo @$bal; ?></p>
            <?php
                    if(count($sql) <= 0){
                        echo "No data found";
                    }else{
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Date</th>
                        <th>Particulars/Description</th>
                        <th>Credit Account</th>
                        <th>Credit Balance</th>
                        <th>Debit Account</th>
                        <th>Debit Balance</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sql as $row){ ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['naration']; ?></td>
                        <td><?php echo $row['creditAccName']; ?></td>
                        <td><?php echo $row['creditAccBal']; ?></td>
                        <td><?php echo $row['debitAccName']; ?></td>
                        <td><?php echo $row['debitAccBal']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>

        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>
