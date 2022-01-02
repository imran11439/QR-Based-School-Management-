<?php 	
	include_once '../connect/db.php';
	include_once 'login_code.php';
	
	if (isset($_POST['collect_fee_year'])) {
	$student_id = $_POST['student_id'];
	$collect_fee_name = $_POST['collect_fee_name'];
	$collect_fee_month = $_POST['collect_fee_month'];
	$collect_fee_year = $_POST['collect_fee_year'];
	$student_fee = $_POST['student_fee'];
	$student_previous = $_POST['student_previous'];
	$student_total = $_POST['student_total'];
	$student_received = $_POST['student_received'];
	$student_grand_total = $_POST['student_grand_total'];
	$student_naration = $_POST['student_naration'];
	$add_by = validate_data($dbc, $fetchUserlogin['user_id']);

	foreach ($student_id as $x => $value) {
		$q = mysqli_query($dbc,"UPDATE fee SET $collect_fee_month = '1' WHERE student_id = '$value' AND year = '$collect_fee_year'");
		if ($q) {
			$balance = $student_total[$x] - $student_received[$x];
			$q1 = mysqli_query($dbc,"UPDATE students SET student_previous = '$balance' WHERE student_id = '$value'");
			if ($q1) {
				$q2 = mysqli_query($dbc,"INSERT INTO transaction (debit,credit,total,remarks,student_id,submitted_by,fee_month,created_by) VALUES ('$balance','$student_received[$x]','$student_total[$x]','$student_naration','$value','$collect_fee_name','$collect_fee_month','$add_by')");	
			}
		}
	}
	$msg = "Saved Successfully Generating_Receipt...";
	$respone = array($student_id,$collect_fee_month,$msg);
	echo json_encode($respone);
    exit();
}

if (isset($_POST['collect_salary_year'])) {
	$teacher_salary_month = $_POST['teacher_salary_month'];
	$collect_salary_year = $_POST['collect_salary_year'];
	$note = $_POST['note'];	
	$add_by = validate_data($dbc, $fetchUserlogin['user_id']);
	//Arrays
	$teacher_id = $_POST['teacher_id'];
	$teacher_salary = $_POST['teacher_salary'];
	$teacher_paid = $_POST['teacher_paid'];
	$teacher_previous = $_POST['teacher_previous'];

	foreach ($teacher_id as $x => $value) {
		$q = mysqli_query($dbc,"UPDATE fee SET $teacher_salary_month = '1' WHERE teacher_id = '$value' AND year = '$collect_salary_year'");		
		$balance = ($teacher_salary[$x] + $teacher_previous[$x]) - $teacher_paid[$x];
		//$balance2 = $teacher_salary[$x] - $teacher_paid[$x];
		if ($q) {
			$q1 = mysqli_query($dbc,"UPDATE teachers SET teacher_balance = '$balance' WHERE teacher_id = '$value'");
			if ($q1) {
				$q2 = mysqli_query($dbc,"INSERT INTO transaction (total,debit,credit,teacher_id,fee_month,remarks,created_by) VALUES ('$teacher_salary[$x]','$teacher_paid[$x]','$balance','$teacher_id[$x]','$teacher_salary_month','$note','$add_by')");	
				if ($q2) {
					echo "Saved Successfully";
				}else{
					echo mysqli_error($dbc);				
				}
			}else{
				echo mysqli_error($dbc);
			}
		}else{
			echo mysqli_error($dbc);
		}
	}
    exit();
}

//Purchase Module
if (isset($_POST['collect_purchase_date'])) {
	$collect_purchase_date = $_POST['collect_purchase_date'];
	$supplier_id = $_POST['supplier_id'];
	$product_total = $_POST['product_total'];
	$purchase_grand_total = $_POST['purchase_grand_total'];
	$purchase_paid = $_POST['purchase_paid'];
	$purchase_naration = $_POST['purchase_naration'];
	$insertORedit = $_POST['insertORedit'];
	$saleORpuchase = $_POST['saleORpuchase'];
	//Arrays
	$product_id = $_POST['product_id'];
	$stock = $_POST['stock'];
	$sale_price = $_POST['sale_price'];
	$product_qty = $_POST['product_qty'];
	$previous_price = $_POST['previous_price'];
	$purchase_due = $_POST['purchase_due'];
	$due = $purchase_grand_total - $purchase_paid;
	$add_by = validate_data($dbc, $fetchUserlogin['user_id']);

	if ($insertORedit == "") {
		$q = mysqli_query($dbc,"INSERT INTO purchase (purchase_date, supplier_id, purchase_grand_total, purchase_paid, purchase_note) VALUES ('$collect_purchase_date', '$supplier_id', '$purchase_grand_total', '$purchase_paid', '$purchase_naration')");	
		if ($q) {
			$last_id = mysqli_insert_id($dbc);
			foreach ($product_id as $x => $value) {
				$q1 = mysqli_query($dbc,"INSERT INTO purchase_item (purchase_id, purchase_item_name, purchase_item_price, purchase_item_previous, purchase_item_qty) VALUES ('$last_id', '$value', '$sale_price[$x]', '$previous_price[$x]', '$product_qty[$x]')");	
				if ($q1) {
					$new_qty = $stock[$x] + $product_qty[$x];
					$q2 = mysqli_query($dbc,"UPDATE products SET product_qty = '$new_qty', purchase_price = '$sale_price[$x]' WHERE product_id = '$product_id[$x]'");
				}
			}//foreach
			if ($q2) {
				$q3 = mysqli_query($dbc,"INSERT INTO transaction (transaction_type,total,debit,credit,supplier_id,remarks,sale_purchase_id,created_by) VALUES ('$saleORpuchase','$purchase_due','$purchase_paid','$purchase_grand_total','$supplier_id','$purchase_naration','$last_id','$add_by')");
				if ($q3) {
					$q4 = mysqli_query($dbc,"UPDATE supplier SET supplier_previous = '$purchase_due' WHERE supplier_id = '$supplier_id'");
					$msg = "Saved Successfully...";
					$respone = array($supplier_id,"abc",$msg);
					echo json_encode($respone);
				}
			}
		}else{
			$msg = mysqli_error($dbc);
			$respone = array($supplier_id,"abc",$msg);
			echo json_encode($respone);
		}
	}else{
		$purchase = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM purchase WHERE purchase_id = '$insertORedit'"));

		$supplier_previous_balance = fetchRecord($dbc, "supplier", "supplier_id", $supplier_id)['supplier_previous'];
		
		// $due2 = $purchase_grand_total - $purchase_paid;
		// if ($due2 < 0) {
			// $due = $supplier_previous_balance - $due2;
		// }else{
		// }
			$due3 = $supplier_previous_balance + $purchase['purchase_paid'];
			$due = $due3 - $purchase['purchase_grand_total'];
		$q = mysqli_query($dbc,"UPDATE supplier SET supplier_previous = '$due' WHERE supplier_id = '$supplier_id'");

		if ($q) {
			$q1 = mysqli_query($dbc,"SELECT purchase.purchase_id, purchase.purchase_date, purchase.purchase_grand_total, purchase.purchase_paid, purchase.purchase_note, purchase_item.purchase_id, purchase_item.purchase_item_name, purchase_item.purchase_item_price, purchase_item.purchase_item_previous, purchase_item.purchase_item_qty FROM purchase INNER JOIN purchase_item ON purchase.purchase_id = purchase_item.purchase_id WHERE purchase.purchase_id = '$insertORedit'");
			while ($items = mysqli_fetch_assoc($q1)) {
				$fetchProductData = fetchRecord($dbc,"products",'product_id',$items['purchase_item_name']);
				$new_qty = $fetchProductData["product_qty"] - $items['purchase_item_qty'];
				$q2 = mysqli_query($dbc,"UPDATE products SET product_qty = '$new_qty', purchase_price = '".$items['purchase_item_previous']."' WHERE product_id = '".$items['purchase_item_name']."'");
			}
		
			if ($q1) {
				$qs3 = mysqli_query($dbc,"DELETE purchase, purchase_item,transaction FROM purchase INNER JOIN purchase_item ON purchase.purchase_id = purchase_item.purchase_id INNER JOIN transaction ON transaction.sale_purchase_id = purchase.purchase_id WHERE purchase.purchase_id = '$insertORedit'");
				if ($qs3) {
					$qs = mysqli_query($dbc,"INSERT INTO purchase (purchase_date, supplier_id, purchase_grand_total, purchase_paid, purchase_note) VALUES ('$collect_purchase_date', '$supplier_id', '$purchase_grand_total', '$purchase_paid', '$purchase_naration')");	
				if ($qs) {
					$last_id = mysqli_insert_id($dbc);
					foreach ($product_id as $x => $value) {
						$qs1 = mysqli_query($dbc,"INSERT INTO purchase_item (purchase_id, purchase_item_name, purchase_item_price, purchase_item_previous, purchase_item_qty) VALUES ('$last_id', '$value', '$sale_price[$x]', '$previous_price[$x]', '$product_qty[$x]')");	
						if ($qs1) {
							$fetchProductData2 = fetchRecord($dbc,"products",'product_id',$value);
							$new_qty = $fetchProductData2['product_qty'] + $product_qty[$x];
							$qs2 = mysqli_query($dbc,"UPDATE products SET product_qty = '$new_qty', purchase_price = '$sale_price[$x]' WHERE product_id = '$product_id[$x]'");
						}
					}//foreach
					if ($qs2) {
						$qs3 = mysqli_query($dbc,"INSERT INTO transaction (transaction_type,total,debit,credit,supplier_id,remarks,sale_purchase_id,created_by) VALUES ('$saleORpuchase','$purchase_due','$purchase_paid','0','$supplier_id','$purchase_naration','$last_id','$add_by')");
						if ($qs3) {
							$supplier_previous_balance1 = fetchRecord($dbc, "supplier", "supplier_id", $supplier_id)['supplier_previous'];
							$due2 = $purchase_grand_total - $purchase_paid;
							$due = $due2 + $supplier_previous_balance1;
							$qs4 = mysqli_query($dbc,"UPDATE supplier SET supplier_previous = '$due' WHERE supplier_id = '$supplier_id'");
							$msg = "Data Updated Successfully Generating_Receipt...";
							$respone = array($supplier_id,"abc",$msg);
							echo json_encode($respone);
						}
					}
				}else{
					$msg = mysqli_error($dbc);
					$respone = array($supplier_id,"abc",$msg);
					echo json_encode($respone);
				}
				}
			}
			
		}

	}//edit
	exit();
}

//Sale Module
if (isset($_POST['collect_sale_date'])) {
	$insertORedit = $_POST['insertORedit'];
	$saleORpuchase = $_POST['saleORpuchase'];
	$collect_sale_date = $_POST['collect_sale_date'];
	$student_id = $_POST['student_id'];
	$product_total = $_POST['product_total'];
	$purchase_grand_total = $_POST['purchase_grand_total'];
	$purchase_paid = $_POST['purchase_paid'];
	$purchase_naration = $_POST['purchase_naration'];
	//Arrays
	$product_id = $_POST['product_id'];
	$stock = $_POST['stock'];
	$sale_price = $_POST['sale_price'];
	$product_qty = $_POST['product_qty'];
	$previous_price = $_POST['previous_price'];
	$purchase_due = $_POST['purchase_due'];
	$due = $purchase_grand_total - $purchase_paid;
	$add_by = validate_data($dbc, $fetchUserlogin['user_id']);
	
	if ($insertORedit == "") {
		$q = mysqli_query($dbc,"INSERT INTO purchase (purchase_date, student_id, purchase_grand_total, purchase_paid, purchase_note) VALUES ('$collect_sale_date', '$student_id', '$purchase_grand_total', '$purchase_paid', '$purchase_naration')");	
		if ($q) {
			$last_id = mysqli_insert_id($dbc);
			foreach ($product_id as $x => $value) {
				$q1 = mysqli_query($dbc,"INSERT INTO purchase_item (purchase_id, purchase_item_name, purchase_item_price, purchase_item_previous, purchase_item_qty) VALUES ('$last_id', '$value', '$sale_price[$x]', '$previous_price[$x]', '$product_qty[$x]')");	
				if ($q1) {
					$new_qty = $stock[$x] - $product_qty[$x];
					$q2 = mysqli_query($dbc,"UPDATE products SET product_qty = '$new_qty', purchase_price = '$sale_price[$x]' WHERE product_id = '$product_id[$x]'");
				}
			}//foreach
			$student_previous = fetchRecord($dbc, "students", "student_id", $student_id)['student_previous'];
			$student_total = $student_previous + $purchase_grand_total;
			if ($q2) {
				$q3 = mysqli_query($dbc,"INSERT INTO transaction (transaction_type,total,debit,credit,student_id,remarks,sale_purchase_id,created_by) VALUES ('$saleORpuchase','$student_total','$purchase_due','$purchase_paid','$student_id','$purchase_naration','$last_id','$add_by')");
				if ($q3) {
					$q4 = mysqli_query($dbc,"UPDATE students SET student_previous = '$purchase_due' WHERE student_id = '$student_id'");
					$msg = "Saved Successfully Generating_Receipt...";
					$respone = array($student_id,"Data Saved Successfully",$msg);
					echo json_encode($respone);
				}
			}
		}else{
			$msg = mysqli_error($dbc);
			$respone = array($student_id,"q Not Working",$msg);
			echo json_encode($respone);
		}
	}else{
		$purchase = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM purchase WHERE purchase_id = '$insertORedit'"));

		$student_previous_balance = fetchRecord($dbc, "students", "student_id", $student_id)['student_previous'];
		$due3 = $student_previous_balance + $purchase['purchase_paid'];
		$due = $due3 - $purchase['purchase_grand_total'];

		$q = mysqli_query($dbc,"UPDATE students SET student_previous = '$due' WHERE student_id = '$student_id'");

		if ($q) {
			$q1 = mysqli_query($dbc,"SELECT purchase.purchase_id, purchase.purchase_date, purchase.purchase_grand_total, purchase.purchase_paid, purchase.purchase_note, purchase_item.purchase_id, purchase_item.purchase_item_name, purchase_item.purchase_item_price, purchase_item.purchase_item_previous, purchase_item.purchase_item_qty FROM purchase INNER JOIN purchase_item ON purchase.purchase_id = purchase_item.purchase_id WHERE purchase.purchase_id = '$insertORedit'");
			while ($items = mysqli_fetch_assoc($q1)) {
				$fetchProductData = fetchRecord($dbc,"products",'product_id',$items['purchase_item_name']);
				$new_qty = $fetchProductData["product_qty"] + $items['purchase_item_qty'];
				$q2 = mysqli_query($dbc,"UPDATE products SET product_qty = '$new_qty', purchase_price = '".$items['purchase_item_previous']."' WHERE product_id = '".$items['purchase_item_name']."'");
			}
		
			if ($q1) {
				$qs3 = mysqli_query($dbc,"DELETE purchase, purchase_item,transaction FROM purchase INNER JOIN purchase_item ON purchase.purchase_id = purchase_item.purchase_id INNER JOIN transaction ON transaction.sale_purchase_id = purchase.purchase_id WHERE purchase.purchase_id = '$insertORedit'");
				if ($qs3) {
					$qs = mysqli_query($dbc,"INSERT INTO purchase (purchase_date, student_id, purchase_grand_total, purchase_paid, purchase_note) VALUES ('$collect_sale_date', '$student_id', '$purchase_grand_total', '$purchase_paid', '$purchase_naration')");	
				if ($qs) {
					$last_id = mysqli_insert_id($dbc);
					foreach ($product_id as $x => $value) {
						$qs1 = mysqli_query($dbc,"INSERT INTO purchase_item (purchase_id, purchase_item_name, purchase_item_price, purchase_item_previous, purchase_item_qty) VALUES ('$last_id', '$value', '$sale_price[$x]', '$previous_price[$x]', '$product_qty[$x]')");	
						if ($qs1) {
							$fetchProductData2 = fetchRecord($dbc,"products",'product_id',$value);
							$new_qty = $fetchProductData2['product_qty'] - $product_qty[$x];
							$qs2 = mysqli_query($dbc,"UPDATE products SET product_qty = '$new_qty', purchase_price = '$sale_price[$x]' WHERE product_id = '$product_id[$x]'");
						}
					}//foreach
					if ($qs2) {
						$qs3 = mysqli_query($dbc,"INSERT INTO transaction (transaction_type,total,debit,credit,student_id,remarks,sale_purchase_id,created_by) VALUES ('$transaction_type','$purchase_due','0','$purchase_paid','$student_id','$purchase_naration','$last_id','$add_by')");
						if ($qs3) {
							$student_previous_balance1 = fetchRecord($dbc, "students", "student_id", $student_id)['student_previous'];
							$due2 = $purchase_grand_total - $purchase_paid;
							$due = $due2 + $student_previous_balance1;
							$qs4 = mysqli_query($dbc,"UPDATE students SET student_previous = '$due' WHERE student_id = '$student_id'");
							$msg = "Data Updated Successfully Generating_Receipt...";
							$respone = array($student_id,"qs2 Not Working",$msg);
							echo json_encode($respone);
						}
					}
				}else{
					$msg = mysqli_error($dbc);
					$respone = array($student_id,"q1 Not Working",$msg);
					echo json_encode($respone);
				}
				}
			}
			
		}

	}//edit
	exit();
}

 /*PROMOTE CLASS*/ 

 if (isset($_POST['promote_val'])) {
 	$arr="";
 	$opt="";
 	$opt=$_POST['opt'];
 	$arr=$_POST['promote_val'];
 	if ($opt > 10) {
 		for ($i=0; $i < sizeof($arr); $i++) { 
 			$q = mysqli_query($dbc,"UPDATE students SET student_sts = '0' WHERE student_id = '$arr[$i]'");
 		}//FOR loop
 		
 		if ($q) {
 			$msg="Selected Students Have Been Promoted....";
 			echo json_encode($msg);
 		}else{
 			echo mysqli_error($dbc);
 		}//IF Query
 	}else{
 		for ($i=0; $i < sizeof($arr); $i++) { 
 			$q = mysqli_query($dbc,"UPDATE students SET class_id = '$opt' WHERE student_id = '$arr[$i]'");
 		}//FOR loop

 		if ($q) {
 			$msg="Selected Students Have Been Promoted....";
 			echo json_encode($msg);
 		}else{
 			echo mysqli_error($dbc);
 		}//IF Query

 	}//Opt value
 }//ISSET

?>
