<div class="card">
	<div class="card-header">
		<h5 class="card-title" id="mian_collect_fee">Create Purchase</h5>
	</div>
	<div class="card-block">
		<div class="msg"></div>
		<form action="inc/code2.php" method="POST" role="form" id="collectFee">
			<input type="hidden" name="page_pointer" id="page_pointer" value="print_receipt_for_purchase">
			<input type="hidden" name="saleORpuchase" id="saleORpuchase" value="purchase">
			<br>
			<?php 
				@$purchase_id = $_GET['purchase_id'];
				@$purchase = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM purchase WHERE purchase_id = '$purchase_id'"));
			?>
			<input type="hidden" class="editModule" name="insertORedit" value="<?=$purchase_id?>">
			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="collect_purchase_date">Date</label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control datepicker" value="<?=date('m/d/Y')?>" id="collect_purchase_date" name="collect_purchase_date">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<label for="supplier_id">Supplier Name</label>
					</div>
					<div class="col-sm-9">
						<div class="input-group input-group-primary">
						<input list="lst" id="supplier_id" value="<?=$purchase['supplier_id']?>" autocomplete="off" name="supplier_id" class="form-control">
							<datalist id="lst">	
							<?php $q = mysqli_query($dbc,"SELECT * FROM supplier");
								while($r=mysqli_fetch_assoc($q)):?>
								<option value="<?=$r['supplier_id']?>"><?=$r['supplier_name']?></option>
							<?php endwhile; ?>
							</datalist>
							<span class="input-group-append"><label class="input-group-text">Balance :<span id="supplier_previous"></span></label></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-responsive" id="productTable">
						<thead>
							<tr>
								<th style="width: 400px">Product Name</th>
								<th>Purchase Price</th>
								<th>Qty</th>
								<th>Total Amount</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
			   				<?php 
			   				$arrayNumber = 0;
			   				$x = 1;
			   				@$q2 = mysqli_query($dbc,"SELECT purchase.purchase_id, purchase.purchase_date, purchase.purchase_grand_total, purchase.purchase_paid, purchase.purchase_note, purchase_item.purchase_id, purchase_item.purchase_item_name, purchase_item.purchase_item_price, purchase_item.purchase_item_previous, purchase_item.purchase_item_qty FROM purchase INNER JOIN purchase_item ON purchase.purchase_id = purchase_item.purchase_id WHERE purchase.purchase_id = '$purchase_id'");
			   				while ($items = mysqli_fetch_assoc($q2)) {
					  			$fetchProductData = fetchRecord($dbc,"products",'product_id',$items['purchase_item_name']);
			   					// for ($x=1; $x < 2; $x++) { ?>
							<tr id="row<?=$x?>">
								<td>
									<input value="<?=$items['purchase_item_name']?>" onchange="getProductData(<?=$x?>);" list="lst1" id="product_id<?=$x?>" autocomplete="off" name="product_id[]" class="form-control">
									<datalist id="lst1">	
										<?php $q = mysqli_query($dbc,"SELECT products.product_id, products.product_name, categories.category_id, categories.category_name, sub_categories.sub_category_id, sub_categories.sub_category_name FROM products INNER JOIN categories ON products.category_id = categories.category_id INNER JOIN sub_categories ON products.sub_category_id = sub_categories.sub_category_id");
										while($r=mysqli_fetch_assoc($q)):?>
										<option value="<?=$r['product_id']?>"><?=$r['product_name']?> <?=$r['category_name']?> <?=$r['sub_category_name']?></option>
									<?php endwhile; ?>
									</datalist>
									<input type="text" id="product_name<?=$x?>" name="product_name[]" class="form-control" readonly>
								</td>
								<td>
									<input type="number" onkeyup="subTotalQty(<?=$x?>);" id="sale_price<?=$x?>" name="sale_price[]" class="form-control">
									<div class="input-group input-group-primary">
										<span class="input-group-prepend"><label class="input-group-text">Previous Price :</label></span>
										<input class="form-control" readonly="" id="previous_price<?=$x?>" name="previous_price[]">
									<!-- </div>	 -->
									<div class="input-group input-group-primary">
										<span class="input-group-prepend"><label class="input-group-text">Stock :</label></span>
										<input class="form-control" readonly="" id="stock<?=$x?>" name="stock[]">
									<!-- </div> -->
								</td>
								<td>
									<input type="number" value="<?=$items['purchase_item_qty']?>" onkeyup="subTotalQty(<?=$x?>);" id="product_qty<?=$x?>" name="product_qty[]" class="form-control">
								</td>
								<td>
									<input type="number" id="product_total<?=$x?>" name="product_total[]" class="form-control">
								</td>
								<td>
									<button type="button" onclick="removeRow(<?=$x?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
							<?php 
			   					// }//for
							$x++;
			   				}//while
			   				?>
						</tbody>
					</table>
					<td>
						<button type="button" class="btn btn-primary float-right btn-sm" onclick="addPurchaseRow();" id="addRowBtn">Add More Product</button>
					</td>
					<br><br>
					<?php
			   			$arrayNumber++;	
			   		?>
				</div><!-- col -->
			</div><!-- row -->
					<br>
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<span class="text-danger ml-lg-5">Previous + Grand Total = <span id="ggTotal"></span></span>
						</div><!-- col -->
					</div><!-- row -->
			<div class="row">
				<div class="col-sm-12">				
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="purchase_grand_total">Grand Total</label>
							</div>
							<div class="col-sm-9">
								<input type="text" name="purchase_grand_total" id="purchase_grand_total" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="purchase_paid">Paid Amount</label>
							</div>
							<div class="col-sm-9">
								<input type="text" name="purchase_paid" onkeyup="getPaidDue();" value="<?=$purchase['purchase_paid']?>" id="purchase_paid" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="purchase_due">Remaining Due</label>
							</div>
							<div class="col-sm-9">
								<input type="text" name="purchase_due" id="purchase_due" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="purchase_naration">Note:-</label>
							</div>
							<div class="col-sm-9">
								<textarea name="purchase_naration" id="purchase_naration" class="form-control" rows="3"><?=$purchase['purchase_note']?></textarea>
							</div>
						</div>
					</div>
				</div><!-- col -->
			</div><!-- row -->	
			<button type="submit" class="btn btn-primary" id="saveFee">Get Receipt</button>
		</form>
	</div>
</div>