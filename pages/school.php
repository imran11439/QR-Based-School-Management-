<div class="card">
	<div class="card-header">
		<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
           	  <div class="small-box bg-info">
              <div class="inner">
                <h3><?php $q=mysqli_query($dbc,"SELECT * FROM students");
              	echo mysqli_num_rows($q)?></h3>

                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class='fas fa-users' style='font-size:48px; color:#fff'></i>
              </div>
              <a href="index.php?nav=students" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php $q=mysqli_query($dbc,"SELECT * FROM teachers");
              	echo mysqli_num_rows($q)?><sup style="font-size: 20px"></h3>

                <p>Total Teachers</p>
              </div>
              <div class="icon">
                <i class='fas fa-user-tie' style='font-size:48px;color:#fff'></i>
              </div>
              <a href="index.php?nav=teachers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php $q=mysqli_query($dbc,"SELECT * FROM users");
              	echo mysqli_num_rows($q)?></h3>

                <p>Administrators</p>
              </div>
              <div class="icon">
                <i class='fas fa-user-cog' style='font-size:48px;color:#fff'></i>
              </div>
              <a href="index.php?nav=users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=date("d-M")?></h3>

                <p>Mark Attendance</p>
              </div>
              <div class="icon">
                <i class='fas fa-address-book' style='font-size:48px;color:#fff'></i>
              </div>
              <a href="index.php?nav=attendance" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <?php $r2=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM school"));?>
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-12 col-lg-12 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header border-bottom-0">
                  	<div class="row">
                  		<div class="col-sm-3">
                  			<img src="img/icon.png" style="float: right;" width="90px;">
                  		</div><!-- col -->
                  		<div class="col-sm-9">
                  			<h1><?=ucwords($r2['school_name'])?></h1>
                  		</div><!-- col -->
                  	</div><!-- row -->
                </div>
                <div class="card-body pt-0">
                	<br>
                <div class="row">
                	<div class="col-sm-7">
                		<h2 class="lead text-muted"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-lg fa-info-circle"></i> About: </b> <?=ucwords($r2['school_about'])?> </h2>
                	</div><!-- col -->
                	<div class="col-sm-4">
                		<h2 class="lead text-muted"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-lg fa-bookmark"></i> Established: </b> <?=ucwords($r2['school_est'])?> </h2> 
                	</div><!-- col -->
                </div><!-- row -->
                <br>
                <div class="row">
                	<div class="col-sm-7">
                		<h2 class="lead text-muted"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-lg fa-building"></i> Address: </b> <?=ucwords($r2['school_address'])?> </h2>
                	</div><!-- col -->
                	<div class="col-sm-4">
                		<h2 class="lead text-muted"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-lg fa-phone"></i> Tel: </b> <?=ucwords($r2['school_phone'])?></h2>
                	</div><!-- col -->
                </div><!-- row -->
                <br>
                <div class="row">
                	<div class="col-7">
                		<h2 class="lead text-muted"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-lg fa-user"></i> Director: </b> <?=ucwords($r2['school_dir'])?> </h2>
                	</div><!-- col -->
                	<div class="col-sm-4">
                		<h2 class="lead text-muted"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-lg fa-phone"></i> Phone: </b> <?=ucwords($r2['school_phone'])?> </h2>
                	</div><!-- col -->
                </div><!-- row -->
                </div><!-- card-body -->
                <div class="card-footer">
                  <div class="text-right">
                      <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-white update" style="cursor: pointer;" data-toggle="modal" data-target="#dataModal"></i>
                    <div class="modal fade" id="dataModal" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header bg-primary">
									<h4 class="modal-title">Add School Details</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body">
									<form action="inc/code.php" method="POST" role="form">
										<div class="msg text-center"></div>
										<div class="form-group text-left">
											<label for="school_name">School Name</label>
											<input type="hidden" value="<?=$r2['school_id']?>" name="school_id">
											<input type="text" class="form-control" value="<?=$r2['school_name']?>" required name="school_name">
										</div>
										<div class="form-group text-left">
											<label for="school_phone">About</label>
											<input type="text" class="form-control" value="<?=$r2['school_about']?>" required name="school_about">
										</div>
										<div class="form-group text-left">
											<label for="school_address">School Established</label>
											<input type="text" class="form-control" value="<?=$r2['school_est']?>" required name="school_est">
										</div>
										<div class="form-group text-left">
											<label for="school_address">School Address</label>
											<input type="text" class="form-control" value="<?=$r2['school_address']?>" required name="school_address">
										</div>
										<div class="form-group text-left">
											<label for="school_address">School Phone</label>
											<input type="text" class="form-control" value="<?=$r2['school_phone']?>" required name="school_phone">
										</div>
										<div class="form-group text-left">
											<label for="school_address">School Director</label>
											<input type="text" class="form-control" value="<?=$r2['school_dir']?>" required name="school_dir">
										</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="saveSchool">Save</button>
									</form>		
									<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div><!-- modal -->
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- row -->
</div><!-- card -->
<style>
	.small-box {
  border-radius: 0.25rem;
  box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
  display: block;
  margin-bottom: 20px;
  position: relative;
}

.small-box > .inner {
  padding: 10px;
}

.small-box > .small-box-footer {
  background-color: rgba(0, 0, 0, 0.1);
  color: rgba(255, 255, 255, 0.8);
  display: block;
  padding: 3px 0;
  position: relative;
  text-align: center;
  text-decoration: none;
  z-index: 10;
}

.small-box > .small-box-footer:hover {
  background-color: rgba(0, 0, 0, 0.15);
  color: #fff;
}

.small-box h3 {
  font-size: 2.2rem;
  font-weight: 700;
  margin: 0 0 10px;
  padding: 0;
  white-space: nowrap;
}
.small-box .icon {
  color: rgba(0, 0, 0, 0.15);
  z-index: 0;
}

.small-box .icon > i {
  font-size: 90px;
  position: absolute;
  right: 15px;
  top: 15px;
  transition: -webkit-transform 0.3s linear;
  transition: transform 0.3s linear;
  transition: transform 0.3s linear, -webkit-transform 0.3s linear;
}

.small-box .icon > i.fa, .small-box .icon > i.fas, .small-box .icon > i.far, .small-box .icon > i.fab, .small-box .icon > i.fal, .small-box .icon > i.fad, .small-box .icon > i.ion {
  font-size: 70px;
  top: 20px;
}

.small-box .icon svg {
  font-size: 70px;
  position: absolute;
  right: 15px;
  top: 15px;
  transition: -webkit-transform 0.3s linear;
  transition: transform 0.3s linear;
  transition: transform 0.3s linear, -webkit-transform 0.3s linear;
}

.small-box:hover {
  text-decoration: none;
}

.small-box:hover .icon > i, .small-box:hover .icon > i.fa, .small-box:hover .icon > i.fas, .small-box:hover .icon > i.far, .small-box:hover .icon > i.fab, .small-box:hover .icon > i.fal, .small-box:hover .icon > i.fad, .small-box:hover .icon > i.ion {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

.small-box:hover .icon > svg {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

@media (max-width: 767.98px) {
  .small-box {
    text-align: center;
  }
  .small-box .icon {
    display: none;
  }
  .small-box p {
    font-size: 12px;
  }
}
</style>

