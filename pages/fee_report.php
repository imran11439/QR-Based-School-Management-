<div class="card">
	<div class="card-header">
		<h5 class="card-title">Fee Report</h5>
	</div>
	<div class="card-block">
		<form action="" method="POST" role="form">		
			<div class="row">
				<div class="col-sm-5">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="student_id">Student Name</label>
							</div><!-- col -->
							<div class="col-sm-9">
								<div class="input-group input-group-primary">
									<input list="lst" id="student_id" autocomplete="off" name="student_id" class="form-control">
									<datalist id="lst">	
										<?php $q = mysqli_query($dbc,"SELECT students.student_id,students.student_name,students.f_name,students.class_id,classes.class_name,classes.class_id FROM students INNER JOIN classes ON students.class_id = classes.class_id");
										while($r=mysqli_fetch_assoc($q)):?>
										<option value="<?=$r['student_id']?>"><?=$r['student_name']?> (<?=$r['class_name']?>) S/O <?=$r['f_name']?></option>
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
					<button type="submit" style="border-radius: 7px;" name="getFee" class="btn btn-outline-primary btn-sm"><i class="fas fa-search"></i> Search</button>
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
							<th>Student Name</th>
							<th>Fee Month</th>
							<th>Total</th>
							<th>Paid Amount</th>
							<th>Remaining</th>
							<th>Collect By</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						$total = 0; 
						$debit = 0; 
						$receive = 0; 
						$pending = 0; 
						if (isset($_REQUEST['getFee'])) {	
							$id = $_POST['student_id'];
							$month = $_POST['month'];
							if (!empty($id) && empty($month)) {
								$q = mysqli_query($dbc,"SELECT * FROM transaction WHERE student_id = '$id' ORDER BY transaction_timestamp ASC");
							}elseif (!empty($id) && !empty($month)) {
								$q = mysqli_query($dbc,"SELECT * FROM transaction WHERE student_id = '$id' AND fee_month = '$month' ORDER BY transaction_timestamp ASC");
							}else{
							}
						while ($r = mysqli_fetch_assoc($q)):
						?>
						<tr>
							<td><?=$x?></td>
							<td><?=$r['transaction_id']?></td>
							<td><?=fetchRecord($dbc, "students", "student_id", $r['student_id'])['student_name']?></td>
							<td><?=$r['fee_month']?></td>
							<td><?=$r['total']?></td>
							<td><?=$r['credit']?></td>
							<td><?=$r['debit']?></td>
							<td><?=$r['created_by']?></td>
							<td>
								<a target="_new" href="print_receipt.php?student_id=<?=$r['student_id']?>&paid_month=<?=$r['fee_month']?>"><i class="icon feather icon-printer f-w-600 f-16 m-r-15 text-c-green"></i></a>
							</td>
						</tr>
						<?php 
						$x++;
						$total += $r['total'];
						$debit += $r['debit'];
						$receive += $r['credit'];
						// $pending += $r['debit'];
						@$previous = fetchRecord($dbc,"students","student_id",$r['student_id'])['student_previous'];
						endwhile;
						}
						?>
						<tr class="btn-grd-info">
							<td>Cal</td>
							<td></td>
							<td></td>
							<td></td>
							<td>Total</td>
							<td><?=@$receive?></td>
							<td><?=@$previous?></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
