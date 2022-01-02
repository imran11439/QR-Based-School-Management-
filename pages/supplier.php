<div class="card">
	<div class="card-header">
			<h5 class="card-title">Manage Suppliers</h5>
	</div>
	<div class="card-block">
			<!-- <br> -->
		<button type="button" class="btn btn-sm btn-primary waves-effect" data-toggle="modal" data-target="#dataModal">Add Suppliers</button>
		<div class="modal fade" id="dataModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Add Supplier</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form action="inc/code.php" method="POST" role="form" id="formData">
							<div class="msg"></div>
							<div class="form-group">
								<label for="supplier_name">Name</label>
								<input type="text" class="form-control" id="supplier_name" name="supplier_name">
								<input type="hidden" class="form-control" id="supplier_id" name="supplier_id">
							</div>
							<div class="form-group">
								<label for="supplier_phone">Contact #</label>
								<input type="text" class="form-control" id="supplier_phone" name="supplier_phone">
							</div>
							<div class="form-group">
								<label for="supplier_previous">Opening Balance</label>
								<input type="text" class="form-control" id="supplier_previous" name="supplier_previous">
							</div>
							<div class="form-group">
								<label for="supplier_sts">Status</label>
								<select name="supplier_sts" id="supplier_sts" class="form-control">
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
				<table class="table table-striped table-bordered" id="supplier" style="width: 100%">
					<thead>
						<tr>
							<th>Sr.#</th>
							<th>Supplier Name</th>
							<th>Contact #</th>
							<th>Balance</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
