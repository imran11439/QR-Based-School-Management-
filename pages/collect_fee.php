<div class="card">
	<div class="card-header">
		<h5 class="card-title" id="mian_collect_fee">Collect Fee</h5>
	</div>
	<div class="card-block">
		<div class="msg"></div>
		<form action="inc/code2.php" method="POST" role="form" id="collectFee">
			<input type="hidden" name="page_pointer" id="page_pointer" value="print_receipt">
			<br>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="collect_fee_date">Date</label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" value="<?=date('d - M - Y')?>" id="collect_fee_date" name="collect_fee_date" readonly>
					</div>
				</div>
			</div><!-- form-group -->
			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="collect_fee_name">Submitted By (Name)</label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="collect_fee_name" name="collect_fee_name">
					</div>
				</div>
			</div><!-- form-group -->
			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="collect_fee_month">Fee Month</label>
					</div>
					<div class="col-sm-4">
						<!-- <input type="month" class="form-control" id="collect_fee_month" name="collect_fee_month"> -->
						<select id="collect_fee_month" name="collect_fee_month" class="form-control">
							<option value="">~~SELECT~~</option>
							<option value="january">January</option>
							<option value="february">February</option>
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
					</div>
					<div class="col-sm-5">
						<select id="collect_fee_year" name="collect_fee_year" class="form-control collect_fee_year">
							<?php 
							for ($i = 2021; $i < 2030; $i++) {?>
								<option value="<?=$i?>"><?=$i?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>
			</div><!-- form-group -->
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-responsive" id="feeTable">
						<thead>
							<tr>
								<th style="width: 400px">Student Name</th>
								<th>Monthly Fee</th>
								<th>Previous Balance</th>
								<th>Total Amount</th>
								<th>Received</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
			   			<?php 
			   				$arrayNumber = 0;
			   				for ($x=1; $x < 2; $x++) { ?>
							<tr id="row<?=$x?>">
								<td>
									<input onchange="getStudentData(<?=$x?>);" list="lst" id="student_id<?=$x?>" autocomplete="off" name="student_id[]" class="form-control">
									<datalist id="lst">	
										<?php $q = mysqli_query($dbc,"SELECT students.student_id,students.student_name,students.f_name,students.class_id,classes.class_name,classes.class_id FROM students INNER JOIN classes ON students.class_id = classes.class_id");
										while($r=mysqli_fetch_assoc($q)):?>
										<option value="<?=$r['student_id']?>"><?=$r['student_name']?> (<?=$r['class_name']?>) S/O <?=$r['f_name']?></option>
									<?php endwhile; ?>
									</datalist>
									<input type="text" id="student_name<?=$x?>" name="student_name[]" class="form-control" readonly>
								</td>
								<td>
									<input type="text" onkeyup="subTotal(<?=$x?>);" id="student_fee<?=$x?>" name="student_fee[]" class="form-control">
								</td>
								<td>
									<input type="text" id="student_previous<?=$x?>" name="student_previous[]" readonly class="form-control">
									<span class="text-danger">Remaining Dues = <span id="remain_due<?=$x?>"></span></span>
								</td>
								<td>
									<input type="text" id="student_total<?=$x?>" name="student_total[]" readonly class="form-control">
								</td>
								<td>
									<input type="text" onkeyup="calcRemain(<?=$x?>);" id="student_received<?=$x?>" name="student_received[]" class="form-control">
								</td>
								<td>
									<button type="button" style="border-radius:5px;" onclick="removeRow(<?=$x?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						<?php 
			   				}//for
			   			?>
						</tbody><!-- tbody -->
					</table><!-- table -->
					<td>
						<button type="button" class="btn btn-primary float-right btn-sm" style="border-radius:7px" onclick="addRow();" id="addRowBtn">Add Student</button>
					</td>
					<br><br>
					<?php
			   			$arrayNumber++;	
			   		?>
					<br>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="student_grand_total">Total</label>
							</div>
							<div class="col-sm-9">
								<input type="text" name="student_grand_total" id="student_grand_total" class="form-control">
							</div>
						</div>
					</div><!-- form-group -->
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="student_naration">Note:-</label>
							</div>
							<div class="col-sm-9">
								<textarea name="student_naration" id="student_naration" class="form-control" rows="3"></textarea>
							</div>
						</div>
					</div><!-- form-group -->
				</div><!-- col -->
			</div><!-- row -->	
			<button type="submit" class="btn btn-primary" style="border-radius:7px" id="saveFee">Get Receipt</button>
		</form><!-- form -->
	</div><!-- card-block -->
</div><!-- card -->