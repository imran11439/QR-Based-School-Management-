<div class="card">
	<div class="card-header">
		<h5 class="card-title">Manage Salaries</h5>
	</div>
	<div class="card-block">
		<form action="inc/code2.php" method="POST" role="form" id="formData">
		<div class="msg"></div>
		<div class="row">
			<div class="col-sm-2">	
				<label for="">Month</label>
			</div>
			<div class="col-sm-5">	
				<div class="form-group">
					<select name="teacher_salary_month" id="teacher_salary_month" class="form-control">
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
				</div><!-- form group -->
			</div><!-- <col> -->	
			<div class="col-sm-5">
				<select id="collect_salary_year" name="collect_salary_year" class="form-control collect_fee_year">
				<?php 
					for ($i = 2021; $i < 2030; $i++) {?>
				<option value="<?=$i?>"><?=$i?></option>
				<?php
					}
				?>
				</select>
			</div>
		</div>		<!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<table class="table" id="salaryTable">
						<thead>
							<tr>
								<th>Teacher Name</th>
								<th class="hideSalary">Teacher Salary</th>
								<th>Amount Paid</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
			   					$arrayNumber = 0;
			   					for ($x=1; $x < 2; $x++) { ?>
							<tr id="row<?=$x?>">
								<td>
									<input list="lst" onchange="getTeachersData(<?=$x?>)" id="teacher_id<?=$x?>" placeholder="Search By Name" autocomplete="off" name="teacher_id[]" class="form-control">
									<datalist id="lst">	
										<?php $q = mysqli_query($dbc,"SELECT * FROM teachers");
											while($r=mysqli_fetch_assoc($q)):?>
										<option value="<?=$r['teacher_id']?>"><?=$r['teacher_name']?> S/O <?=$r['f_name']?></option>
										<?php endwhile; ?>
									</datalist>
									<input type="text" id="teacher_name<?=$x?>" name="teacher_name[]" class="form-control" readonly>
									<input type="hidden" id="teacher_previous<?=$x?>" name="teacher_previous[]" class="form-control">
								</td>
								<td class="hideSalary">
									<input type="number" class="form-control" name="teacher_salary[]" id="teacher_salary<?=$x?>">
								</td>
								<td>
									<input type="number" class="form-control" onkeyup="subTotalForSalary(<?=$x?>);" name="teacher_paid[]" id="teacher_paid<?=$x?>">
									<span class="text-danger">Remaining Dues = <span id="balance<?=$x?>"></span></span>
								</td>
								<td>
									<button type="button" class="btn btn-danger btn-sm" onclick="removeRow(<?=$x?>);"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
							<?php 
			   					}//for
			   				?>
						</tbody>
					</table>
				</div><!-- form group -->
			</div><!-- col -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-2">
				<label for="">Narration / Note</label>
			</div>
			<div class="col-sm-7">
				<textarea name="note" id="note" class="form-control" rows="3" placeholder="Note Narration"></textarea>
			</div>
			<div class="col-sm-3">
				<div class="row">
					<button type="button" class="btn btn-sm btn-grd-info" style="border-radius:7px" onclick="addTeacherRow();" id="addRowBtnTeacher"><i class="fas fa-plus"></i> Add Row</button>
				</div>
				<br>
			</div>
		</div><!-- row -->
		<br>
			<?php
			   			$arrayNumber++;	
			   		?>
			<button type="submit" style="border-radius:7px" class="btn btn-grd-success"><i class="fas fa-check"></i> Save</button>
		</form>	
	</div><!-- card body -->
</div><!-- card -->