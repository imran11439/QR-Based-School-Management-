<div class="card">
	<div class="card-header">
		<h5 class="card-title">Manage Products</h5>
	</div>
	<div class="card-block">
		<button type="button" class="btn btn-sm btn-primary waves-effect" data-toggle="modal" data-target="#dataModal">Add Products</button>
		<div class="modal fade" id="dataModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Add Products</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form action="inc/code.php" method="POST" role="form" id="formData">
								<div class="msg"></div>
						<div class="row">
							<div class="col-sm-6">
							<div class="form-group">
								<label for="product_name">Product Name</label>
								<input type="text" class="form-control" id="product_name" name="product_name">
								<input type="hidden" class="form-control" id="product_id" name="product_id">
							</div>
							<div class="form-group">
								<label for="category_id">Category Name</label>
								<select class="form-control" id="category_id" name="category_id">
									<option value="">~~SELECT~~</option>
									<?php 
										$q = mysqli_query($dbc,"SELECT * FROM categories WHERE category_sts = '1'");
										while ($r = mysqli_fetch_assoc($q)):?>
									<option value="<?=$r['category_id']?>"><?=$r['category_name']?></option>
									<?php endwhile ?>
								</select>
							</div>
							<div class="form-group">
								<label for="sub_category_id">Sub Category Name</label>
								<select class="form-control" id="sub_category_id" name="sub_category_id">
									<option value="">~~SELECT~~</option>
									<?php 
										$q = mysqli_query($dbc,"SELECT * FROM sub_categories WHERE sub_category_sts = '1'");
										while ($r = mysqli_fetch_assoc($q)):?>
									<option value="<?=$r['sub_category_id']?>"><?=$r['sub_category_name']?></option>
									<?php endwhile ?>
								</select>
							</div>
							<div class="form-group">
								<label for="purchase_price">Purchase Price</label>
								<input type="number" class="form-control" id="purchase_price" name="purchase_price">
							</div>
							</div><!-- col -->
							<div class="col-sm-6">
								
							<div class="form-group">
								<label for="sale_price">Sale Price</label>
								<input type="number" class="form-control" id="sale_price" name="sale_price">
							</div>
							<div class="form-group">
								<label for="product_qty">Available Quantity</label>
								<input type="number" class="form-control" id="product_qty" name="product_qty">
							</div>
							<div class="form-group">
								<label for="product_sts">Product Sts</label>
								<select class="form-control" id="product_sts" name="product_sts">
									<option value="">~~SELECT~~</option>
									<option value="1">Active</option>
									<option value="0">Deactive</option>
								</select>
							</div>
							</div>
						</div><!-- rwo. -->
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
			<table class="table table-striped table-bordered" id="products" style="width: 100%">
				<thead>
					<tr>
						<th>Sr.#</th>
						<th>Product Name</th>
						<th>Purchase Price</th>
						<th>Sale Price</th>
						<th>Qty</th>
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

