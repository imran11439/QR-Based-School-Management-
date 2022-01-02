<div class="card">
	<div class="card-header">
		<h2 class="card-title text-center">
			<label class="label label-info btn-block p-3">Administrators</label>
		</h2>
		<br>
		<button type="button" style="border-radius:7px" class="btn btn-grd-info" data-toggle="modal" data-target="#dataModal">
			<i class="fas fa-plus"></i> Add User
		</button>
	</div><!-- card header -->
	<div class="card-block">
		<?php $q=get($dbc,"users");
		while ($r=mysqli_fetch_assoc($q)):?>
        <div class="row">
        	<div class="col-12 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0"></div>
                <div class="card-body pt-0">
                  <div class="row">
	                <div class="col-7" style="padding-left: 100px;">
	                	<h2>
	                		<b><?=$r['user_name']?></b>
	                	</h2>
	                	<ul class="ml-4 mb-0 fa-ul text-muted" style="padding-top: 15px">
	                  	   <li class="md" style="padding-top: 10px">
	                   		<span class="fa-li">
	                    		<i class="fas fa-lg fa-building"></i>
	                   		</span> Address: <?=$r['user_address']?> 
	                  	   </li>
	                  	   <li class="md" style="padding-top: 10px">
	                   		<span class="fa-li">
	                    		<i class="fas fa-lg fa-phone"></i>
	                   		</span> Phone #: <?=$r['user_phone']?>
	                  	   </li>
	                  	   <li class="md" style="padding-top: 10px">
	                   		<span class="fa-li">
	                    		<i class="fas fa-lg fa-envelope"></i>
	                   		</span> Email : <?=$r['user_email']?>
	                  	   </li>
	                	</ul>
	                </div>
	                <div class="col-5 text-center">
	                      <img src="img/<?=$r['user_pic']?>" height="160px" alt="user-avatar" class="img-circle">
	                </div>
	           	  </div><!-- row -->
                </div><!-- card body -->
                <div class="card-footer">
                  <div class="text-right">
                  		<i id="<?=$r['user_id']?>" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="<?=$r['user_id']?>" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="users"><input type="hidden" id="col_name" value="user_id">
                  </div>
                  <div class="modal fade" id="dataModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h4 class="modal-title">Manage User <i class="fas fa-user-cog"></i></h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
								<form action="<?=htmlspecialchars('inc/code.php');?>" method="POST" role="form" id="formData">
									<div class="msg"></div>
									<div class="form-group">
										<label for="user_name">Name</label>
										<input type="text" class="form-control" id="user_name" name="user_name">
										<input type="hidden" class="form-control" id="user_id" name="user_id">
									</div>
									<div class="form-group">
										<label for="user_address">Address</label>
										<input type="text" class="form-control" id="user_address" name="user_address">
									</div>
									<div class="form-group">
										<label for="user_phone">Phone</label>
										<input type="text" class="form-control" id="user_phone" name="user_phone">
									</div>
									<div class="form-group">
										<label for="user_email">email</label>
										<input type="text" class="form-control" id="user_email" name="user_email">
									</div>
									<div class="form-group">
										<label for="user_pass">Password</label>
										<input type="text" class="form-control" id="user_pass" name="user_pass">
									</div>
									<div class="form-group">
										<label for="uploadPic">Picture</label>
											<br><br>
						                	<input type='file' name="uploadPic" id="uploadPic" onchange="readURL(this);" style="display: none;">
						                	<img id="blah" class="img-thumbnail" style="height:25%;width:20%" src="img/place.png" alt="Invalid Image Type Click To Change">
									</div>
									<div class="form-group">
										<label for="user_sts">Status</label>
										<select name="user_sts" id="user_sts" class="form-control">
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
				</div><!-- modal -->
                </div><!-- card footer -->
              </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->
    	<?php endwhile; ?>

	</div><!-- card block -->
</div><!-- card -->