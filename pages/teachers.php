  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<div class="card" id="teachersProfile">
	
</div><!-- card -->

<div class="card">
	<div class="card-header">
		<h5 class="card-title">Manage Teachers</h5>
	</div>
	<div class="card-block">		
		<form action="inc/code.php" method="POST" role="form" id="formData">
				<div class="msg"></div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="teacher_name">Teacher Name</label>
						<input type="text" class="form-control" id="teacher_name" name="teacher_name">
						<input type="hidden" class="form-control" id="teacher_id" name="teacher_id">
					</div>
					<div class="form-group">
						<label for="f_name">Father Name</label>
						<input type="text" class="form-control" id="f_name" name="f_name">
					</div>
					<div class="form-group">
						<label for="teacher_cnic">Teacher CNIC</label>
						<input type="number" class="form-control" id="teacher_cnic" name="teacher_cnic">
					</div>
					<div class="form-group">
						<label for="teacher_email">Email</label>
						<input type="email" class="form-control" id="teacher_email" name="teacher_email">
					</div>
					<div class="form-group">
						<label for="teacher_dob">Date of Birth</label>
						<input type="text" class="form-control datepicker" id="teacher_dob" name="teacher_dob">
					</div>
					<div class="form-group">
						<label for="teacher_fee">Teacher Pay</label>
						<input type="number" class="form-control" id="teacher_fee" name="teacher_fee">
					</div>
				</div><!-- col -->
				<div class="col-sm-4">
					<div class="form-group">
						<label for="teacher_qualification">Qualification</label>
						<input type="text" required class="form-control" id="teacher_qualification" name="teacher_qualification">
					</div>
					<div class="form-group">
						<label for="teacher_gender">Gender</label>
						<select name="teacher_gender" id="teacher_gender" class="form-control">
							<option value="">~~SELECT~~</option>
							<option value="1">Male</option>
							<option value="0">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="teacher_contact">Contact #</label>
						<input type="number" class="form-control" id="teacher_contact" name="teacher_contact">
					</div>
					<div class="form-group">
						<label for="teacher_role">Teacher Role</label>
						<input type="text" class="form-control" id="teacher_role" name="teacher_role">
					</div>
					<div class="form-group">
						<label for="teacher_sts">Status</label>
						<select name="teacher_sts" id="teacher_sts" class="form-control">
							<option value="">~~SELECT~~</option>
							<option value="1">Active</option>
							<option value="0">Deactive</option>
						</select>
					</div>
				</div><!-- col -->
				<div class="col-sm-4">
					<div class="form-group">
						<label for="teacher_address">Address</label>
						<textarea name="teacher_address" id="teacher_address" class="form-control" rows="3" placeholder="Detail Address Home,office,Building"></textarea>
					</div>
					<div class="form-group">
						<label for="uploadPic">Picture</label>
							<br><br>
		                	<input type='file' name="uploadPic" id="uploadPic" onchange="readURL(this);" style="display: none;">
		                	<img id="blah" class="img-thumbnail blah" src="img/place.png" alt="Invalid Image Type Click To Change">
					</div>
				</div><!-- col -->
			</div><!-- row -->
				<button type="submit" class="btn btn-primary btn-block" id="saveData">Save <i class="fas fa-check-circle"></i></button>
		</form>
		<br><br>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-striped table-bordered" id="teachers" style="width: 100%">
					<thead>
						<tr>
							<th>Sr.#</th>
							<th>Teacher Pic</th>
							<th>Teacher Name</th>
							<th>Father Name</th>
							<th>Email</th>
							<th>CNIC</th>
							<th>Address</th>
							<th>Date of Birth</th>
							<th>Contact</th>
							<th>Class</th>
							<th>Status</th>
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
<script>
  $(document).ready(function(){
    function loadData(page){
      $.ajax({
        url  : "js/pagination.php",
        type : "POST",
        data : {page_no:page},
        success:function(data){
        	$("#teachersProfile").html(data);
            //$("#teachersProfileFooter").html(data);
        }
      });
    }
    loadData();
    
    // Pagination code
    $(document).on("click", ".pagination li a", function(e){
      e.preventDefault();
      var pageId = $(this).attr("id");
      loadData(pageId);
    });
  });
</script>