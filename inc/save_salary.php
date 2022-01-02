<?php 

include_once '../connect/db.php';

if (isset($_POST['teacher_transaction'])) {
	$teacher_transaction = $_POST['teacher_transaction'];
	$teacher_salary_month = $_POST['teacher_salary_month'];
	$teacher_id = $_POST['teacher_id'];
	$teacher_salary = $_POST['teacher_salary'];
	$teacher_paid = $_POST['teacher_paid'];
	$collect_fee_year = $_POST['collect_fee_year'];
	$note = $_POST['note'];
	$teacher_previous = $_POST['teacher_previous'];

	foreach ($teacher_id as $x => $value) {
			$q = mysqli_query($dbc,"UPDATE fee SET $teacher_salary_month = '1' WHERE teacher_id = '$value' AND year = '$collect_fee_year'");		
		// if ($teacher_transaction == 'salary') {
		// }
		// if ($teacher_transaction == 'salary') {
		// 	$balance = 0;
		// }else{
		// 	$balance = $teacher_previous - $teacher_paid[$x];
		// }
		// $q1 = mysqli_query($dbc,"UPDATE teachers SET teacher_balance = '0' WHERE teacher_id = '$value'");
		// if ($q1) {
		// 	$q2 = mysqli_query($dbc,"INSERT INTO transaction (debit,credit,total,remarks,teacher_id,fee_month,remarks) VALUES ('$teacher_paid[$x]','0','$teacher_salary[$x]','$teacher_transaction','$teacher_id[$x]','$teacher_salary_month','$note')");	
		// }
	}

	echo "Saved Successfully";
    exit();
}

?>


