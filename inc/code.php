<?php 
include_once '../connect/db.php';
include_once 'login_code.php';

//User Module
if (isset($_POST['saveSchool'])) {
		//My Banks
	$school_id = validate_data($dbc,$_POST['school_id']);
   	$school_name = validate_data($dbc,$_POST['school_name']);
   	$school_about = validate_data($dbc,$_POST['school_about']);
   	$school_est = validate_data($dbc,$_POST['school_est']);
	$school_address = validate_data($dbc,$_POST['school_address']);
	$school_phone = validate_data($dbc,$_POST['school_phone']);
	$school_dir = validate_data($dbc,$_POST['school_dir']);

	if ($school_id > 0) {
		$q = mysqli_query($dbc,"UPDATE school SET school_name = '$school_name', school_about='$school_about', school_est='$school_est', school_address = '$school_address', school_dir = '$school_dir', school_phone = '$school_phone' WHERE school_id = '$school_id'");
		header("refresh:0;url=../index.php");
	}
		
}

//User Module
if (isset($_POST['user_name'])) {
		//My Banks
	$user_id = validate_data($dbc,$_POST['user_id']);
	$user_name = validate_data($dbc,$_POST['user_name']);
	$user_address = validate_data($dbc,$_POST['user_address']);
	$user_phone = validate_data($dbc,$_POST['user_phone']);
	$user_email = validate_data($dbc,$_POST['user_email']);
	$user_pass = validate_data($dbc,$_POST['user_pass']);
	$user_sts = validate_data($dbc,$_POST['user_sts']);
	$add_by = validate_data($dbc, $fetchUserlogin['user_id']);
	if ($_FILES["uploadPic"]["name"] != '') {
		//With Image
		$ext = explode(".", $_FILES["uploadPic"]["name"]);
		$extension = end($ext);
		$name = uniqid().".".$extension;
		$location = "../img/".$name;
		move_uploaded_file($_FILES["uploadPic"]["tmp_name"], $location);

		if ($user_id > 0) {
			$q = mysqli_query($dbc,"UPDATE users SET user_name = '$user_name', user_address = '$user_address',user_phone = '$user_phone',user_email = '$user_email', user_pass = '$user_pass',user_pic = '$name', user_sts = '$user_sts' WHERE user_id = '$user_id'");
				echo 'User Update Successfully';
				exit();
		}else{
			$q = mysqli_query($dbc,"INSERT INTO users (user_name, user_address, user_phone,user_email, user_pass, user_pic, user_sts) VALUES ('$user_name','$user_address','$user_phone','$user_email','$user_pass','$name','$user_sts')");
				echo 'User Saved Successfully';
				exit();
		}
		exit();
	}else{
		//WITHOUT Image
		$name="user_default.png";
		if ($user_id > 0) {
			$q = mysqli_query($dbc,"UPDATE users SET user_name = '$user_name', user_address = '$user_address',user_phone = '$user_phone',user_email = '$user_email', user_pass = '$user_pass', user_sts = '$user_sts' WHERE user_id = '$user_id'");
				echo 'User Update Successfully';
				exit();
		}else{
			$q = mysqli_query($dbc,"INSERT INTO users (user_name, user_address, user_phone,user_email, user_pass, user_sts) VALUES ('$user_name','$user_address','$user_phone','$user_email','$user_pass','$user_sts')");
				echo 'User Saved Successfully';
				exit();
		}
		exit();
	}
	exit();
}

//Class Module
if (isset($_POST['class_name'])) {
		//My Banks
	$class_id = validate_data($dbc,$_POST['class_id']);
	$class_name = validate_data($dbc,$_POST['class_name']);
	$class_fee = validate_data($dbc,$_POST['class_fee']);
	$class_sts = validate_data($dbc,$_POST['class_sts']);

	if ($class_id > 0) {
		$q = mysqli_query($dbc,"UPDATE classes SET class_name = '$class_name',class_fee = '$class_fee', class_sts = '$class_sts' WHERE class_id = '$class_id'");
				echo 'Class Update Successfully';
	}else{
		$q = mysqli_query($dbc,"INSERT INTO classes (class_name,class_fee, class_sts) VALUES ('$class_name','$class_fee', '$class_sts')");
			echo 'Class Saved Successfully';
	}
	exit();	
}

//Section Module
if (isset($_POST['section_name'])) {
		//My Banks
	$section_id = validate_data($dbc,$_POST['section_id']);
	$section_name = validate_data($dbc,$_POST['section_name']);
	$section_sts = validate_data($dbc,$_POST['section_sts']);

	if ($section_id > 0) {
		$q = mysqli_query($dbc,"UPDATE sections SET section_name = '$section_name', section_sts = '$section_sts' WHERE section_id = '$section_id'");
				echo 'Section Update Successfully';
	}else{
		$q = mysqli_query($dbc,"INSERT INTO sections (section_name, section_sts) VALUES ('$section_name', '$section_sts')");
			echo 'Section Saved Successfully';
	}
	exit();	
}

// Add Students
if (isset($_POST['student_name'])) {
	//students
	$student_id = validate_data($dbc,$_POST['student_id']);
	$student_name = validate_data($dbc, $_POST['student_name']);
	$f_name = validate_data($dbc, $_POST['f_name']);
	$student_cnic = validate_data($dbc, $_POST['student_cnic']);
	$student_dob = validate_data($dbc, $_POST['student_dob']);
//	$student_fee = validate_data($dbc, $_POST['student_fee']);
	$class_id = validate_data($dbc, $_POST['class_id']);
//	$section_id = validate_data($dbc, $_POST['section_id']);
	$student_gender = validate_data($dbc, $_POST['student_gender']);
	$parent_occuption = "";
	$student_phone = validate_data($dbc, $_POST['student_phone']);
	$student_sts = validate_data($dbc, $_POST['student_sts']);
	$student_address = validate_data($dbc, $_POST['student_address']);
	@$january = validate_data($dbc, $_POST['jan']);
	@$february = validate_data($dbc, $_POST['february']);
	@$march = validate_data($dbc, $_POST['march']);
	@$april = validate_data($dbc, $_POST['april']);
	@$may = validate_data($dbc, $_POST['may']);
	@$june = validate_data($dbc, $_POST['june']);
	@$july = validate_data($dbc, $_POST['july']);
	@$august = validate_data($dbc, $_POST['august']);
	@$september = validate_data($dbc, $_POST['september']);
	@$october = validate_data($dbc, $_POST['october']);
	@$november = validate_data($dbc, $_POST['november']);
	@$december = validate_data($dbc, $_POST['december']);
	@$year = date('Y');
	$add_by = validate_data($dbc, $fetchUserlogin['user_id']);

	if ($_FILES["uploadPic"]["name"] != '') {
		//With Image
		$ext = explode(".", $_FILES["uploadPic"]["name"]);
		$extension = end($ext);
		$name = uniqid().".".$extension;
		$location = "../img/".$name;
		move_uploaded_file($_FILES["uploadPic"]["tmp_name"], $location);

		if ($student_id > 0) {
			$q = mysqli_query($dbc,"UPDATE students SET student_name = '$student_name', f_name = '$f_name', student_cnic = '$student_cnic', student_dob = '$student_dob', class_id = '$class_id',  student_gender = '$student_gender',student_phone = '$student_phone', student_sts = '$student_sts', student_address = '$student_address', student_pic = '$name', student_added_by = '$add_by' WHERE student_id = '$student_id'");
			$last_student_id = mysqli_insert_id($dbc);
			if ($q) {
				$q1 = mysqli_query($dbc,"UPDATE fee SET january = '$january', february = '$february',  march = '$march',  april = '$april',  may = '$may',  june = '$june',  july = '$july',  august = '$august',  september = '$september',  october = '$october',  november = '$november',  december = '$december' WHERE student_id = '$student_id'");
				/*if ($q1) {
					$q2 = mysqli_query($dbc,"UPDATE transaction SET total = '$parent_occuption', created_by = '$add_by' WHERE student_id = '$student_id'");
				}*/
			}
			echo 'Students Data Updated Successfully';
		exit();	
		}else{
			$q = mysqli_query($dbc,"INSERT INTO students (student_name, f_name, student_cnic, student_dob,  class_id, student_gender, student_phone, student_sts, student_address, student_pic,student_added_by) VALUES ('$student_name', '$f_name', '$student_cnic', '$student_dob', '$class_id', '$student_gender', '$student_phone', '$student_sts', '$student_address', '$name','$add_by')");
				$last_student_id = mysqli_insert_id($dbc);
				if ($q) {
					$q1 = mysqli_query($dbc,"INSERT INTO fee (student_id,january,february, march, april, may, june, july, august, september, october, november, december, year) VALUES ('$last_student_id','$january','$february', '$march', '$april', '$may', '$june', '$july', '$august', '$september', '$october', '$november', '$december', '$year')");
					/*if ($q1) {
						$q2 = mysqli_query($dbc,"INSERT INTO transaction (student_id,total,remarks, created_by) VALUES ('$last_student_id','$parent_occuption','Opening Balance', '$add_by')");
					}*/
				}
		echo 'Students Data Saved With Image Successfully';
		exit();
		}	
	exit();
	}else{
		//Without Image
		$name = "user_default.png";
		if ($student_id > 0) {
			$q = mysqli_query($dbc,"UPDATE students SET student_name = '$student_name', f_name = '$f_name', student_cnic = '$student_cnic', student_dob = '$student_dob', class_id = '$class_id',  student_gender = '$student_gender', student_phone = '$student_phone', student_sts = '$student_sts', student_address = '$student_address', student_pic = '$name',student_added_by = '$add_by' WHERE student_id = '$student_id'");
			if ($q) {
				$q1 = mysqli_query($dbc,"UPDATE fee SET january = '$january', february = '$february',  march = '$march',  april = '$april',  may = '$may',  june = '$june',  july = '$july',  august = '$august',  september = '$september',  october = '$october',  november = '$november', december = '$december' WHERE student_id = '$student_id'");
				/*if ($q1) {
					$q2 = mysqli_query($dbc,"UPDATE transaction SET total = '$parent_occuption', created_by = '$add_by' WHERE student_id = '$student_id'");
				}*/
			}
			echo 'Students Data Updated Successfully';
		exit();
		}else{
			$q = mysqli_query($dbc,"INSERT INTO students (student_name, f_name, student_cnic, student_dob,  class_id, student_gender, student_phone, student_sts, student_address, student_added_by) VALUES ('$student_name', '$f_name', '$student_cnic', '$student_dob', '$class_id', '$student_gender', '$student_phone', '$student_sts', '$student_address', '$add_by')");
			$last_student_id = mysqli_insert_id($dbc);
			if ($q) {
				$q1 = mysqli_query($dbc,"INSERT INTO fee (student_id,january,february, march, april, may, june, july, august, september, october, november, december, year) VALUES ('$last_student_id','$january','$february', '$march', '$april', '$may', '$june', '$july', '$august', '$september', '$october', '$november', '$december', '$year')");
				/*if ($q1) {
					$q2 = mysqli_query($dbc,"INSERT INTO transaction (student_id,total,remarks, created_by) VALUES ('$last_student_id','$parent_occuption','Opening Balance', '$add_by')");
				}*/
			}
			echo 'Students Data Saved Without Image Successfully';
		exit();
		}	
	exit();
	}
exit();
}

// Add Teacher
if (isset($_POST['teacher_name'])) {
	//teachers
	$teacher_name = validate_data($dbc,$_POST['teacher_name']);
	$teacher_id = validate_data($dbc,$_POST['teacher_id']);
	$f_name = validate_data($dbc,$_POST['f_name']);
	$teacher_cnic = validate_data($dbc,$_POST['teacher_cnic']);
	$teacher_email = validate_data($dbc,$_POST['teacher_email']);
	$teacher_dob = validate_data($dbc,$_POST['teacher_dob']);
	$teacher_fee = validate_data($dbc,$_POST['teacher_fee']);
	$teacher_qualification = validate_data($dbc,$_POST['teacher_qualification']);
	$teacher_gender = validate_data($dbc,$_POST['teacher_gender']);
	$teacher_contact = validate_data($dbc,$_POST['teacher_contact']);
	$teacher_role = validate_data($dbc,$_POST['teacher_role']);
	$teacher_sts = validate_data($dbc,$_POST['teacher_sts']);
	$teacher_address = validate_data($dbc,$_POST['teacher_address']);
	$add_by = validate_data($dbc, $fetchUserlogin['user_id']);

	@$year = date('Y');
	if ($_FILES["uploadPic"]["name"] != '') {
		//With Image
		$ext = explode(".", $_FILES["uploadPic"]["name"]);
		$extension = end($ext);
		$name = uniqid().".".$extension;
		$location = "../img/".$name;
		move_uploaded_file($_FILES["uploadPic"]["tmp_name"], $location);

		if ($teacher_id > 0) {
			$q = mysqli_query($dbc,"UPDATE teachers SET teacher_name = '$teacher_name', f_name = '$f_name', teacher_cnic = '$teacher_cnic', teacher_email = '$teacher_email', teacher_dob = '$teacher_dob', teacher_fee = '$teacher_fee', teacher_qualification = '$teacher_qualification', teacher_gender = '$teacher_gender', teacher_contact = '$teacher_contact', teacher_role = '$teacher_role', teacher_sts = '$teacher_sts', teacher_address = '$teacher_address', teacher_pic = '$name', teacher_pass = '$teacher_cnic', teacher_added_by = '$add_by' WHERE teacher_id = '$teacher_id'");
			echo 'Teacher Data Updated Successfully';
		exit();	
		}else{
			$q = mysqli_query($dbc,"INSERT INTO teachers (teacher_name, f_name, teacher_cnic, teacher_email, teacher_dob, teacher_fee, teacher_qualification, teacher_gender, teacher_contact, teacher_role, teacher_sts, teacher_address, teacher_pic, teacher_pass, teacher_added_by) VALUES ('$teacher_name', '$f_name', '$teacher_cnic', '$teacher_email', '$teacher_dob', '$teacher_fee', '$teacher_qualification', '$teacher_gender', '$teacher_contact', '$teacher_role', '$teacher_sts', '$teacher_address','$name', '$teacher_cnic', '$add_by')");
				$last_teacher_id = mysqli_insert_id($dbc);
				if ($q) {
					$q1 = mysqli_query($dbc,"INSERT INTO fee (teacher_id, year) VALUES ('$last_teacher_id', '$year')");
				}
		echo 'Teacher Data Saved With Image Successfully';
		exit();
		}	
	exit();
	}else{
		//Without Image
		$name = "user_default.png";
		if ($teacher_id > 0) {
			$q = mysqli_query($dbc,"UPDATE teachers SET teacher_name = '$teacher_name', f_name = '$f_name', teacher_cnic = '$teacher_cnic', teacher_email = '$teacher_email', teacher_dob = '$teacher_dob', teacher_fee = '$teacher_fee', teacher_qualification = '$teacher_qualification', teacher_gender = '$teacher_gender', teacher_contact = '$teacher_contact', teacher_role = '$teacher_role', teacher_sts = '$teacher_sts', teacher_address = '$teacher_address', teacher_pass = '$teacher_cnic', teacher_added_by = '$add_by' WHERE teacher_id = '$teacher_id'");
			$last_teacher_id = mysqli_insert_id($dbc);
			echo 'Teacher Data Updated Successfully';
		exit();
		}else{
			$q = mysqli_query($dbc,"INSERT INTO teachers (teacher_name, f_name, teacher_cnic, teacher_email, teacher_dob, teacher_fee, teacher_qualification, teacher_gender, teacher_contact, teacher_role, teacher_sts, teacher_address, teacher_pass, teacher_added_by) VALUES ('$teacher_name', '$f_name', '$teacher_cnic', '$teacher_email', '$teacher_dob', '$teacher_fee', '$teacher_qualification', '$teacher_gender', '$teacher_contact', '$teacher_role', '$teacher_sts', '$teacher_address', '$teacher_cnic', '$add_by')");
			$last_teacher_id = mysqli_insert_id($dbc);
			if ($q) {
				$q1 = mysqli_query($dbc,"INSERT INTO fee (teacher_id, year) VALUES ('$last_teacher_id', '$year')");
			}
			echo 'Teacher Data Saved Without Image Successfully';
		exit();
		}	
	exit();
	}
exit();
}

//Category Module
if (isset($_POST['category_name'])) {
		//My Banks
	$category_name = validate_data($dbc,$_POST['category_name']);
	$category_id = validate_data($dbc,$_POST['category_id']);
	$category_sts = validate_data($dbc,$_POST['category_sts']);

	if ($category_id > 0) {
		$q = mysqli_query($dbc,"UPDATE categories SET category_name = '$category_name', category_sts = '$category_sts' WHERE category_id = '$category_id'");
				echo 'Category Update Successfully';
	}else{
		$q = mysqli_query($dbc,"INSERT INTO categories (category_name,category_sts) VALUES ('$category_name','$category_sts')");
			echo 'Category Saved Successfully';
	}
	exit();	
}

//Sub Category Module
if (isset($_POST['sub_category_name'])) {
		//My Banks
	$sub_category_name = validate_data($dbc,$_POST['sub_category_name']);
	$sub_category_id = validate_data($dbc,$_POST['sub_category_id']);
	$sub_category_sts = validate_data($dbc,$_POST['sub_category_sts']);

	if ($sub_category_id > 0) {
		$q = mysqli_query($dbc,"UPDATE sub_categories SET sub_category_name = '$sub_category_name', sub_category_sts = '$sub_category_sts' WHERE sub_category_id = '$sub_category_id'");
				echo 'Sub Category Update Successfully';
	}else{
		$q = mysqli_query($dbc,"INSERT INTO sub_categories (sub_category_name,sub_category_sts) VALUES ('$sub_category_name','$sub_category_sts')");
			echo 'Sub Category Saved Successfully';
	}
	exit();	
}

//Products Module
if (isset($_POST['product_name'])) {
	//My Banks
	$product_name = validate_data($dbc,$_POST['product_name']);
	$product_id = validate_data($dbc,$_POST['product_id']);
	$category_id = validate_data($dbc,$_POST['category_id']);
	$sub_category_id = validate_data($dbc,$_POST['sub_category_id']);
	$purchase_price = validate_data($dbc,$_POST['purchase_price']);
	$sale_price = validate_data($dbc,$_POST['sale_price']);
	$product_qty = validate_data($dbc,$_POST['product_qty']);
	$product_sts = validate_data($dbc,$_POST['product_sts']);

	if ($product_id > 0) {
		$q = mysqli_query($dbc,"UPDATE products SET product_name = '$product_name', category_id = '$category_id', sub_category_id = '$sub_category_id', purchase_price = '$purchase_price', sale_price = '$sale_price', product_qty = '$product_qty', product_sts = '$product_sts' WHERE product_id = '$product_id'");
				echo 'Product Update Successfully';
	}else{
		$q = mysqli_query($dbc,"INSERT INTO products (product_name, category_id, sub_category_id, purchase_price, sale_price, product_qty, product_sts) VALUES ('$product_name', '$category_id', '$sub_category_id', '$purchase_price', '$sale_price', '$product_qty', '$product_sts')");
			echo 'Product Saved Successfully';
	}
	exit();	
}

//Supplier Module
if (isset($_POST['supplier_name'])) {
		//My Banks
	$supplier_id = validate_data($dbc,$_POST['supplier_id']);
	$supplier_name = validate_data($dbc,$_POST['supplier_name']);
	$supplier_phone = validate_data($dbc,$_POST['supplier_phone']);
	$supplier_previous = validate_data($dbc,$_POST['supplier_previous']);
	$supplier_sts = validate_data($dbc,$_POST['supplier_sts']);
	$add_by = validate_data($dbc, $fetchUserlogin['user_id']);

	if ($supplier_id > 0) {
		$q = mysqli_query($dbc,"UPDATE supplier SET supplier_name = '$supplier_name', supplier_phone = '$supplier_phone', supplier_previous = '$supplier_previous', supplier_sts = '$supplier_sts' WHERE supplier_id = '$supplier_id'");
		if ($q) {
		$q = mysqli_query($dbc,"UPDATE transaction SET credit = '$supplier_previous', total = '$supplier_previous', created_by = '$add_by' WHERE supplier_id = '$supplier_id'");
		echo 'Supplier Update Successfully';
		}else{
			echo mysqli_error($dbc);
		}		
	}else{
		$q = mysqli_query($dbc,"INSERT INTO supplier (supplier_name, supplier_phone, supplier_previous, supplier_sts) VALUES ('$supplier_name', '$supplier_phone', '$supplier_previous', '$supplier_sts')");
		$last_supplier_id = mysqli_insert_id($dbc);
		if ($q) {
			$q2 = mysqli_query($dbc,"INSERT INTO transaction (supplier_id,credit,total,remarks, created_by) VALUES ('$last_supplier_id','$supplier_previous','$supplier_previous','Opening Balance', '$add_by')");	
			echo 'Supplier Saved Successfully';
		}else{
			echo mysqli_error($dbc);
		}
	}
	exit();	
}

//Getting Data for COllection Fee Module
if (isset($_POST['student_id']) && isset($_POST['student_id']) != "") {
	$id = $_POST['student_id'];
	$q = mysqli_query($dbc,"SELECT students.student_id,students.student_name,students.f_name,students.class_id,students.student_previous,classes.class_name,classes.class_fee,classes.class_id, fee.january, fee.february, fee.march, fee.april, fee.may, fee.june, fee.july, fee.august, fee.september, fee.october, fee.november, fee.december, fee.student_id FROM students INNER JOIN classes ON students.class_id = classes.class_id INNER JOIN fee ON fee.student_id = students.student_id WHERE students.student_id = '$id'");
	$response = array();
	while($r = mysqli_fetch_assoc($q)){
		$response = $r;
	}
	echo json_encode($response);	
	exit();	
}

//Getting Data for COllection Fee Module
if (isset($_POST['product_id']) && isset($_POST['product_id']) != "") {
	$id = $_POST['product_id'];
	$q = mysqli_query($dbc,"SELECT products.product_id, products.product_name, products.product_qty, products.sale_price, products.purchase_price, categories.category_id, categories.category_name, sub_categories.sub_category_id, sub_categories.sub_category_name FROM products INNER JOIN categories ON products.category_id = categories.category_id INNER JOIN sub_categories ON products.sub_category_id = sub_categories.sub_category_id WHERE products.product_id = '$id' AND products.product_sts = '1'");
	$response = array();
	while($r = mysqli_fetch_assoc($q)){
		$response = $r;
	}
	echo json_encode(array('data' => $response));	
	exit();	
}

//Getting Data for Salary Module
if (isset($_POST['teacher_id']) && isset($_POST['teacher_id']) != "") {
	$id = $_POST['teacher_id'];
	$q = mysqli_query($dbc,"SELECT * FROM teachers WHERE teacher_id = '$id'");
	$response = array();
	while($r = mysqli_fetch_assoc($q)){
		$response = $r;
	}
	echo json_encode($response);	
	exit();	
}

//Getting Data for Salary Module
if (isset($_POST['supplier_id']) && isset($_POST['supplier_id']) != "") {
	$id = $_POST['supplier_id'];
	$q = mysqli_query($dbc,"SELECT * FROM supplier WHERE supplier_id = '$id'");
	$response = array();
	while($r = mysqli_fetch_assoc($q)){
		$response = $r;
	}
	echo json_encode($response);	
	exit();	
}

//Getting Data For Edit Purpose
if (isset($_POST['edit_user_id']) && isset($_POST['edit_user_id']) != "") {
 	$id = $_POST['edit_user_id'];
	$table = $_POST['tbl2'];
	$fld = $_POST['col2'];
	if ($table == 'students') {
	 	$q = mysqli_query($dbc,"SELECT students.student_id,students.student_name,students.f_name,students.student_cnic,students.class_id,students.section_id,students.student_dob,students.student_phone,students.student_address,students.student_gender,students.student_pass,students.student_previous,students.student_fee,students.student_pic,students.student_sts,fee.january,fee.february,fee.march,fee.april,fee.may,fee.june,fee.july,fee.august,fee.september,fee.october,fee.november,fee.december,fee.student_id,transaction.debit,transaction.student_id FROM students INNER JOIN fee ON students.student_id = fee.student_id INNER JOIN transaction ON students.student_id = transaction.student_id WHERE students.student_id = '$id'");	
	}else{
	 	$q = mysqli_query($dbc,"SELECT * FROM $table WHERE $fld = '$id'");
	}
	$response = array();
	while($r = mysqli_fetch_assoc($q)){
		$response = $r;
	}
	echo json_encode($response);	
	exit();
}

//Delete Record
if (isset($_POST['deleteid'])) {
	//Data Delete Module  
	$id = $_POST['deleteid'];
	$table = $_POST['tbl2'];
	$fld = $_POST['col2'];
	if ($table == 'students') {
		$q = mysqli_query($dbc,"DELETE students, transaction FROM students INNER JOIN transaction ON students.student_id = transaction.student_id WHERE students.student_id = '$id'");
	}elseif ($table == 'supplier') {
		$q = mysqli_query($dbc,"DELETE supplier, transaction FROM supplier INNER JOIN transaction ON supplier.supplier_id = transaction.supplier_id WHERE supplier.supplier_id = '$id'");
	}else{
		deleteFromTable($dbc,$table,$fld,$id);
	}
    exit();
}

//Attendance Module
if (isset($_POST['attendanceStID'])) {
	$id = $_POST['attendanceStID'];
	$data = [
		'student_id' => $id,
		'attendance_sts' => 1,
	];
	if (insert_data($dbc, "attendance", $data)) {
		echo 'Attendance Submitted';
	}
    exit();
}

?>
	<!-- if ($table == 'users') {
		$Path = "uploads/".fetchRecord($dbc,$table,$fld,$id)['user_pic'];
		if ($Path == 'default.png') {
			unlink();
		}else{
			unlink($Path);
		}
	} -->