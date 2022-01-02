<style>
	.scard{
		border: 2px solid darkblue;
		padding: 20px;
		width: 400px;
	}
</style>
<script>
	window.print()
</script>
<?php include '../connect/db.php'; ?>
<div class="scard">
	<?php 
	$text = $_GET['student_id'];
	$file = $_GET['file_name'];
	$students = fetchRecord($dbc, "students", "student_id", $text);
	?>
	<i>Student Card</i><hr>
	Name : <strong><?=$students['student_name']?></strong><br>
	Roll No : <strong>BPS-<?=$students['student_id']?></strong><br>
	Class : <strong><?=fetchRecord($dbc, "classes", "class_id", $students['class_id'])['class_name']?></strong><br>
	Monthly Fee : <strong><?=@fetchRecord($dbc, "classes", "class_id", $students['class_id'])['class_fee']?></strong><br>
	Gender : <strong><?=$students['student_gender']==1? "Male" : "Female"?></strong><br>
	Phone : <strong><?=$students['student_phone']?></strong><br>
	Address : <strong><?=$students['student_address']?></strong><br>
	<img src="../<?=$file?>" style="float: right; margin-top: -150px;">
</div>