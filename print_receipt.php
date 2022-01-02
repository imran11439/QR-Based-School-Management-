<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- Nafees Nastaleeq -->
<link rel="stylesheet" media="screen" href="" type="text/css"/>
<style>
@font-face {
    font-family: 'NafeesRegular';
    src: url('files/NafeesRegular.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

/* The following rules are deprecated. */ 
@font-face {
    font-family: 'Nafees';
    src: url('files/NafeesRegular.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

.urdufont { 
   font-family: 'NafeesRegular'; 
   font-weight: normal; 
   font-style: normal; 
}

.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.printClass{
    background-color: #ccc !important;
    -webkit-print-color-adjust: exact; 
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>

<?php 
    include_once 'connect/db.php';
    $id = $_GET['student_id'];
    $month = $_GET['paid_month'];
    $qq = str_replace(array( '[', ']','"' ), ' ', $id);
    $id2 = explode(',', $qq);
    $copy = array('Office Copy','Student Copy');
    foreach ($copy as $i => $copyName) {
    foreach ($id2 as $value) {
        $q = mysqli_query($dbc,"SELECT students.student_id,students.student_name,students.f_name,students.class_id,students.student_fee,students.student_previous,classes.class_name,classes.class_id, fee.january, fee.february, fee.march, fee.april, fee.may, fee.june, fee.july, fee.august, fee.september, fee.october, fee.november, fee.december, fee.student_id, transaction.student_id, transaction.credit, transaction.debit, transaction.total, transaction.remarks, transaction.transaction_id, transaction.created_by, transaction.submitted_by, transaction.transaction_timestamp FROM students INNER JOIN classes ON students.class_id = classes.class_id INNER JOIN fee ON fee.student_id = students.student_id INNER JOIN transaction ON transaction.student_id = students.student_id WHERE students.student_id = '$value' ORDER BY transaction.transaction_timestamp DESC LIMIT 1");
    while ($r = mysqli_fetch_assoc($q)):
 ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title printClass">
    			<h2>The Beacon Public School</h2> <small> Gulshan Colony Jandanwala, Bhakkar</small><h3 class="pull-right">Invoice # <?=$r['transaction_id']?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
        			<strong>Student Detail:</strong><br>
                        Registration No. : <?=$r['student_id']?><br>
    					Name : <?=ucwords($r['student_name']." ".$r['f_name'])?><br>
    					Class : <?=ucwords(fetchRecord($dbc,"classes","class_id",$r['class_id'])['class_name'])?><br>
    					Registration No. : <?=$r['student_id']?><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    				<strong>Collected By:</strong><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Summary / <span class="urdufont">تفصیل</span></strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Fee Month</strong></td>
                                    <td class="text-center"><strong>Pending Amount / <span class="urdufont">پچھلے واجبات</span></strong></td>
        							<td class="text-center"><strong>Monthly Fee / <span class="urdufont">ماہانہ فیس</span></strong></td>
        							<td class="text-right"><strong>Totals / <span class="urdufont">کل رقم</span></strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td><?=ucwords($month)?></td>
                                    <td class="text-center"><?=$r['student_previous']?></td>
    								<td class="text-center"><?=fetchRecord($dbc,"classes","class_id",$r['class_id'])['class_fee']?></td>
    								<td class="text-right"><?=$r['total']?></td>
    							</tr>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-right"><strong>Total / <span class="urdufont">کل رقم</span></strong></td>
    						  		<td class="thick-line text-right"><?=$r['total']?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-right"><strong>Paid Amount / <span class="urdufont">ادا شدہ رقم</span></strong></td>
    								<td class="no-line text-right"><?=$r['credit']?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-right"><strong>Remaining Dues / <span class="urdufont">باقی واجبات</span></strong></td>
    								<td class="no-line text-right"><?=$r['student_previous']?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
        <center>
            <strong><?=$copyName?></strong>
            <strong class="pull-right">
                Developed By Sheraz & Zain
            </strong>
        </center>
    </div>
</div>
<?php endwhile ?>
<?php 
    } 
}                
?>
<script>
    window.print();
</script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>