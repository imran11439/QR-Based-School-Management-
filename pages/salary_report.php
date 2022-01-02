<div class="card">
	<div class="card-header">
		<h5 class="card-title">Salary Report</h5>
	</div>
	<div class="card-block">
		<form action="" method="POST" role="form">		
			
			<div class="row">
				<div class="col-sm-5">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="teacher_id">Teacher Name</label>
							</div><!-- col -->
							<div class="col-sm-9">
								<div class="input-group input-group-primary">
									<input list="lst" id="teacher_id" autocomplete="off" name="teacher_id" class="form-control">
									<datalist id="lst">	
										<?php $q = mysqli_query($dbc,"SELECT * FROM teachers");
										while($r=mysqli_fetch_assoc($q)):?>
										<option value="<?=$r['teacher_id']?>"><?=$r['teacher_name']?> S/O <?=$r['f_name']?></option>
									<?php endwhile; ?>
									</datalist>
									<span class="input-group-append"><label class="input-group-text"><i class="fas fa-users"></i></label></span>
								</div>
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- form group -->
				</div><!-- col -->
				<div class="col-sm-5">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="month">Month</label>
							</div><!-- col -->
							<div class="col-sm-9">
								<select name="month" id="month" class="form-control">
									<option value="">~~SELECT~~</option>
									<option value="january">January</option>
									<option value="febuary">Febuary</option>
									<option value="march">March</option>
									<option value="april">April</option>
									<option value="may">May</option>
									<option value="june">June</option>
									<option value="july">July</option>
									<option value="august">August</option>
									<option value="september">September</option>
									<option value="october">October</option>
									<option value="november">November</option>
									<option value="december">December</option>
								</select>
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- form group -->
				</div>
				<div class="col-sm-2">
					<button type="submit" style="border-radius:7px" name="getFee" class="btn btn-outline-primary btn-sm"><i class="fas fa-search"></i> Search</button>
				</div>
			</div><!-- row -->
		</form>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered table-sm table-responsive feeReport" style="width: 100%">
					<thead>
						<tr>
							<th>Sr.</th>
							<th>Invoice#</th>
							<th>Teacher Name</th>
							<th>Fee Month</th>
							<th>Total</th>
							<th>Paid Amount</th>
							<th>Balance</th>
							<th>Paid By</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						$total = 0; 
						$paid = 0; 
						$pending = 0; 
						if (isset($_REQUEST['getFee'])) {	
							$id = $_POST['teacher_id'];
							$month = $_POST['month'];
							if (!empty($id) && empty($month)) {
								$q = mysqli_query($dbc,"SELECT * FROM transaction WHERE teacher_id = '$id' ORDER BY transaction_timestamp ASC");
							}elseif (!empty($id) && !empty($month)) {
								$q = mysqli_query($dbc,"SELECT * FROM transaction WHERE teacher_id = '$id' AND fee_month = '$month' ORDER BY transaction_timestamp ASC");
							}
							else{
							}
						while ($r = mysqli_fetch_assoc($q)):
						?>
						<tr>
							<td><?=$x?></td>
							<td><?=$r['transaction_id']?></td>
							<td><?=fetchRecord($dbc, "teachers", "teacher_id", $r['teacher_id'])['teacher_name']?></td>
							<td><?=$r['fee_month']?></td>
							<td><?=$r['total']?></td>
							<td><?=$r['debit']?></td>
							<td><?=$r['credit']?></td>
							<td><?=fetchRecord($dbc, "users", "user_id", $r['created_by'])['user_name']?></td>
						</tr>
						<?php 
						$x++;
						$total += $r['total'];
						$paid += $r['debit'];
						endwhile;
						$pending = $total - $paid;
						}
						?>
						<tr class="btn-grd-info">
							<td>Cal.</td>
							<td></td>
							<td></td>
							<td></td>
							<td>Total</td>
							<td><?=$paid?></td>
							<td><?=$pending?></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
