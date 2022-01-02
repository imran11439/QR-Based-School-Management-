<div class="card">
	<div class="card-header">
		<h5 class="card-title">Supplier Ledger</h5>
	</div>
	<div class="card-block">
		<form action="" method="POST" role="form">		
			<div class="row">
				<div class="col-sm-5">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="supplier_id">Supplier Name</label>
							</div><!-- col -->
							<div class="col-sm-9">
								<div class="input-group input-group-primary">
									<input list="lst" id="supplier_id" autocomplete="off" name="supplier_id" class="form-control">
									<datalist id="lst">	
										<?php $q = mysqli_query($dbc,"SELECT * FROM supplier");
										while($r=mysqli_fetch_assoc($q)):?>
										<option value="<?=$r['supplier_id']?>"><?=$r['supplier_name']?> <?=$r['supplier_phone']?></option>
									<?php endwhile; ?>
									</datalist>
									<span class="input-group-append"><label class="input-group-text"><i class="fas fa-users"></i></label></span>
								</div>
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- form group -->
				</div><!-- col -->
				<div class="col-sm-2">
					<button type="submit" name="getFee" class="btn btn-outline-primary btn-sm"><i class="fas fa-search"></i> Search</button>
				</div>
			</div><!-- row -->
		</form>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered table-responsive table-sm feeReport" style="width: 100%">
					<thead>
						<tr>
							<th>Sr.</th>
							<th>Invoice#</th>
							<th>Supplier Name</th>
							<th>Total</th>
							<th>Received Amount</th>
							<th>Pending Amount</th>
							<th>Collect By</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						$total = 0; 
						$receive = 0; 
						$pending = 0; 
						if (isset($_REQUEST['getFee'])) {	
							$id = $_POST['supplier_id'];
							if (!empty($id) && empty($month)) {
								$q = mysqli_query($dbc,"SELECT * FROM transaction WHERE supplier_id = '$id' ORDER BY transaction_timestamp ASC");
							}else{
							}
						while ($r = mysqli_fetch_assoc($q)):
						?>
						<tr>
							<td><?=$x?></td>
							<td><?=$r['transaction_id']?></td>
							<td><?=fetchRecord($dbc, "supplier", "supplier_id", $r['supplier_id'])['supplier_name']?></td>
							<td><?=$r['credit']?></td>
							<td><?=$r['debit']?></td>
							<td><?=$r['total']?></td>
							<td><?=$r['created_by']?></td>
						</tr>
						<?php 
						$x++;
						$total += $r['credit'];
						$receive += $r['debit'];
						// $pending += $r['debit'];
						@$previous = fetchRecord($dbc,"supplier","supplier_id",$r['supplier_id'])['supplier_previous'];
						endwhile;
						}
						?>
						<tr class="btn-grd-info">
							<td>Cal.</td>
							<td></td>
							<td></td>
							<td>Total</td>
							<td><?=@$receive?></td>
							<td><?=@$previous?></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
