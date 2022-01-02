<div class="card">
	<div class="card-header">
		<h5 class="card-title">Manage Students</h5>
	</div>
	<div class="card-block">		
		<form action="inc/code.php" method="POST" role="form" id="formData">
				<div class="msg"></div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="student_name">Student Name</label>
						<input type="text" class="form-control" id="student_name" name="student_name">
						<input type="hidden" class="form-control" id="student_id" name="student_id">
					</div>
					<div class="form-group">
						<label for="f_name">Father Name</label>
						<input type="text" class="form-control" id="f_name" name="f_name">
					</div>
					<div class="form-group">
						<label for="student_cnic">Student CNIC</label>
						<input type="number" class="form-control" id="student_cnic" name="student_cnic">
					</div>
					<div class="form-group">
						<label for="student_dob">Date of Birth</label>
						<input type="text" class="form-control datepicker" id="student_dob" name="student_dob">
					</div>
				</div><!-- col -->
				<div class="col-sm-4">
					<div class="form-group">
						<label for="student_phone">Phone #</label>
						<input type="number" class="form-control" id="student_phone" name="student_phone">
					</div>
					<div class="form-group">
						<label for="student_gender">Gender</label>
						<select name="student_gender" id="student_gender" class="form-control">
							<option value="">~~SELECT~~</option>
							<option value="1">Male</option>
							<option value="0">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="student_address">Address</label>
						<textarea name="student_address" id="student_address" class="form-control" rows="3" placeholder="Detail Address Home,office,Building"></textarea>
					</div>
					
				</div><!-- col -->
				<div class="col-sm-4">
					<div class="form-group">
						<label for="class_id">Class</label>
						<select name="class_id" id="class_id" class="form-control">
							<option value="">~~SELECT~~</option>
							<?php 
								$q = get($dbc,"classes WHERE class_sts = '1'");
								while ($r = mysqli_fetch_assoc($q)):?>
								<option value="<?=$r['class_id']?>"><?=$r["class_name"]?></option>
							<?php endwhile ?>
						</select>
					</div>
					<div class="form-group">
						<label for="student_sts">Status</label>
						<select name="student_sts" id="student_sts" class="form-control">
							<option value="">~~SELECT~~</option>
							<option value="1">Active</option>
							<option value="0">Deactive</option>
						</select>
					</div>
					<div class="form-group">
						<label for="uploadPic">Picture</label>
							<br><br>
		                	<input type='file' name="uploadPic" id="uploadPic" onchange="readURL(this);" style="display: none;">
		                	<img id="blah" class="img-thumbnail blah" src="img/place.png" alt="Invalid Image Type Click To Change">
					</div>
				</div><!-- col -->
			</div><!-- row -->
			<div class="row">
				<div class="col-sm-3">
					<label for="">Paid Fee Month</label>	
				</div>
				<div class="col-sm-9">
					<label for="jan">Jan</label>
					<input style="margin-right: 10px;" type="checkbox" name="jan" id="jan" value="1">

					<label for="february">February</label>
					<input style="margin-right: 10px;" type="checkbox" name="february" id="february" value="1">

					<label for="march">March</label>
					<input style="margin-right: 10px;" type="checkbox" name="march" id="march" value="1">

					<label for="april">April</label>
					<input style="margin-right: 10px;" type="checkbox" name="april" id="april" value="1">

					<label for="may">May</label>
					<input style="margin-right: 10px;" type="checkbox" name="may" id="may" value="1">

					<label for="june">June</label>
					<input style="margin-right: 10px;" type="checkbox" name="june" id="june" value="1">

					<label for="july">July</label>
					<input style="margin-right: 10px;" type="checkbox" name="july" id="july" value="1">

					<label for="august">August</label>
					<input style="margin-right: 10px;" type="checkbox" name="august" id="august" value="1">

					<label for="september">September</label>
					<input style="margin-right: 10px;" type="checkbox" name="september" id="september" value="1">

					<label for="october">October</label>
					<input style="margin-right: 10px;" type="checkbox" name="october" id="october" value="1">

					<label for="november">November</label>
					<input style="margin-right: 10px;" type="checkbox" name="november" id="november" value="1">

					<label for="december">December</label>
					<input style="margin-right: 10px;" type="checkbox" name="december" id="december" value="1">
				</div>
			</div>
				<button type="submit" class="btn btn-primary btn-block">Save <i class="fas fa-check-circle"></i></button>
		</form>
		<br><br>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-striped table-bordered" id="students" style="width: 100%">
					<thead>
						<tr>
							<th>Sr.#</th>
							<th>Student Pic</th>
							<th>Student Name</th>
							<th>Father Name</th>
							<th>Class</th>
							<th>CNIC</th>
							<th>Date of Birth</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Gender</th>
							<th>Student Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div><!-- row -->	
	</div><!-- card body -->
</div><!-- card -->


