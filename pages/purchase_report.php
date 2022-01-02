<div class="card">
	<div class="card-header">
		<h5 class="card-title">Sale Purchase Report</h5>
	</div>
	<div class="card-block">
		<form action="" method="POST" role="form">		
		</form>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered table-responsive table-sm operationalReport" style="width: 100%">
					<thead>
						<tr>
							<th>Invoice#</th>
							<th>Student / Supplier Name</th>
							<th>Product Name</th>
							<th>Product Price</th>
							<th>Product Qty</th>
							<th>Total</th>
							<th>Date/Time</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$ttal = 0;
							$receive = 0;
							$previous = 0;
							$q = mysqli_query($dbc,"SELECT purchase.purchase_id, purchase.purchase_date, purchase.purchase_grand_total, purchase.purchase_paid,purchase.purchase_note, purchase.purchase_time, purchase_item.purchase_id, purchase_item.purchase_item_name, purchase_item.purchase_item_price, purchase_item.purchase_item_previous, purchase_item.purchase_item_qty, transaction.sale_purchase_id, transaction.transaction_type, transaction.debit, transaction.credit, transaction.total, transaction.remarks, transaction.fee_month, transaction.submitted_by, transaction.created_by, transaction.transaction_timestamp, transaction.student_id, transaction.supplier_id, transaction.teacher_id FROM purchase INNER JOIN purchase_item ON purchase.purchase_id = purchase_item.purchase_id INNER JOIN transaction ON transaction.sale_purchase_id = purchase.purchase_id");
						while ($r = mysqli_fetch_assoc($q)):
						?>
						<tr>
							<td><?=$r['purchase_id']?></td>
							<td>
								<?php 
								if ($r['supplier_id'] != '0') {
									echo fetchRecord($dbc, "supplier", "supplier_id", $r['supplier_id'])['supplier_name'];
									
								}else{
									echo fetchRecord($dbc, "students", "student_id", $r['student_id'])['student_name'];
								}
								?>
							</td>
							<td><?=fetchRecord($dbc,"products","product_id",$r['purchase_item_name'])['product_name'];	?></td>
							<td><?=$r['purchase_item_price']?></td>
							<td><?=$r['purchase_item_qty']?></td>
							<td><?=$total = $r['purchase_item_qty']*$r['purchase_item_price'];$ttal += $r['purchase_item_qty']*$r['purchase_item_price'];?></td>
							<td><?=$r['transaction_timestamp']?></td>
							<td>
								<?php if ($r['transaction_type'] == 'sale'): ?>
									<a target="_new" href="index.php?nav=edit_sale&purchase_id=<?=$r['purchase_id']?>"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
								<?php else: ?>
									<a target="_new" href="index.php?nav=edit_purchase&purchase_id=<?=$r['purchase_id']?>"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
								<?php endif ?>	
							</td>
						</tr>
						<?php
							   
							endwhile;
						?>
						<tr class="btn-grd-info">
							<td>Cal.</td>
							<!-- <td></td> -->
							<td></td>
							<td></td>
							<td></td>
							<td>Total</td>
							<td><?=$ttal?></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
