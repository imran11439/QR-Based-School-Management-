<div class="card">
	<div class="card-header">
		<br>
		<div class="row">
          <div class="col-4">
            <div class="info-box"> <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
              <div class="info-box-content">
                <b class="info-box-text">ONE</b>
                <span class="info-box-number">
					<?php $r=mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM students WHERE class_id='1'"));
					echo $r; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>

              <div class="info-box-content">
                <b class="info-box-text">TWO</b>
                <span class="info-box-number"><?php $r=mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM students WHERE class_id='2'"));
					echo $r; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-user"></i></span>

              <div class="info-box-content">
                <b class="info-box-text">THREE</b>
                <span class="info-box-number"><?php $r=mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM students WHERE class_id='3'"));
					echo $r; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div><!-- row -->
        <div class="row">
        	<div class="col-4">
	            <div class="info-box"> <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
	              <div class="info-box-content">
	                <b class="info-box-text">FOUR</b>
	                <span class="info-box-number"><?php $r=mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM students WHERE class_id='4'"));
					echo $r; ?></span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	        </div>
	        <!-- /.col -->
	          <div class="col-4">
	            <div class="info-box">
	              <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>
	              <div class="info-box-content">
	                <b class="info-box-text">FIVE</b>
	                <span class="info-box-number"><?php $r=mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM students WHERE class_id='5'"));
					echo $r; ?></span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->
	          <div class="col-4">
	            <div class="info-box">
	              <span class="info-box-icon bg-danger"><i class="far fa-user"></i></span>

	              <div class="info-box-content">
	                <b class="info-box-text">SIX</b>
	                <span class="info-box-number"><?php $r=mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM students WHERE class_id='6'"));
					echo $r; ?></span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->
        </div><!-- row -->
        <div class="row">
        	<div class="col-4">
	            <div class="info-box"> <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
	              <div class="info-box-content">
	                <b class="info-box-text">SEVEN</b>
	                <span class="info-box-number"><?php $r=mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM students WHERE class_id='7'"));
					echo $r; ?></span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->
	          <div class="col-4">
	            <div class="info-box">
	              <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>

	              <div class="info-box-content">
	                <b class="info-box-text">EIGHT</b>
	                <span class="info-box-number"><?php $r=mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM students WHERE class_id='8'"));
					echo $r; ?></span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->
	          <div class="col-4">
	            <div class="info-box">
	              <span class="info-box-icon bg-danger"><i class="far fa-user"></i></span>
	              <div class="info-box-content">
	                <b class="info-box-text">NINE</b>
	                <span class="info-box-number"><?php $r=mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM students WHERE class_id='9'"));
					echo $r; ?></span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->
        </div><!-- row -->
        <div class="row">
        	<div class="col-3"></div>
        	<div class="col-6">
	            <div class="info-box"> <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
	              <div class="info-box-content">
	                <b class="info-box-text">TEN</b>
	                <span class="info-box-number"><?php $r=mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM students WHERE class_id='10'"));
					echo $r; ?></span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->
        </div><!-- row -->
        <br>

		<h5 class="card-title">Manage Classes</h5>
	</div>
	<div class="card-block">
		<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#dataModal">Add Class</button>
		<div class="modal fade" id="dataModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Add Classes</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form action="inc/code.php" method="POST" role="form" id="formData">
								<div class="msg"></div>
								<div class="form-group">
									<label for="class_name">Class Name</label>
									<input type="text" class="form-control" id="class_name" name="class_name">
									<input type="hidden" class="form-control" id="class_id" name="class_id">
								</div>
								<div class="form-group">
									<label for="class_fee">Class Fee</label>
									<input type="text" class="form-control" id="class_fee" name="class_fee">
								</div>
								<div class="form-group">
									<label for="class_sts">Class Sts</label>
									<select class="form-control" id="class_sts" name="class_sts">
										<option value="">~~SELECT~~</option>
										<option value="1">Active</option>
										<option value="0">Deactive</option>
									</select>
								</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary waves-effect waves-light" id="saveData">Save</button>
						</form>		
						<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped table-bordered" id="classes" style="width: 100%">
				<thead>
					<tr>
						<th>Sr.#</th>
						<th>Class Name</th>
						<th>Class Fee</th>
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
<style>
.info-box {
  box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
  border-radius: 0.25rem;
  background-color: #fff;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  margin-bottom: 1rem;
  min-height: 80px;
  padding: .5rem;
  position: relative;
  width: 100%;
}
.info-box .info-box-icon {
  border-radius: 0.25rem;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  font-size: 1.875rem;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  text-align: center;
  width: 70px;
}
.info-box .info-box-content {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  line-height: 1.8;
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  padding: 0 10px;
}

.info-box .info-box-number {
  display: block;
  margin-top: .25rem;
  font-weight: 700;
}
.info-box .progress-description,
.info-box .info-box-text {
  display: block;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

@media (min-width: 1200px) {
  .col-md-2 .info-box .progress-description {
    font-size: 1rem;
    display: block;
  }
  .col-md-3 .info-box .progress-description {
    font-size: 1rem;
    display: block;
  }
}
.info-box .far {
  color: #ced4da;
  font-size:36px;
  padding:10px;	 

}
</style>

