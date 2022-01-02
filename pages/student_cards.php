<style>
	.scard{
		border: 2px solid darkblue;
		padding: 10px;
		width: 400px;
	}
</style>
<div class="card">
	<div class="card-header">
		<h5 class="card-title">Generate Student Cards</h5>
	</div>
	<div class="card-block">

	<div class="row">
		<div class="col-sm-4">
			<form action="" method="post">
			<div class="form-group">
				<label for="">Student Name</label>
				<select name="student_id" class="form-control">
					<option value="">~~ SELECT ~~</option>
					<?php $q = get($dbc, "students");
						while ($r = mysqli_fetch_assoc($q)):?>
						<option value="<?=$r['student_id']?>"><?=$r['student_name']?></option>
					<?php endwhile ?>
					<option value="all">All Student (Bulk Card Generation)</option>
				</select>
			</div>
			<button type="submit" class="btn btn-success" name="createCards">Create <i class="fas fa-save"></i></button>
			</form>
		</div><!-- col -->
	    <?php
	        include "phpqrcode-master/qrlib.php";
	        if (isset($_POST['createCards'])) {
		        $text = $_POST['student_id']; 
		        $students = fetchRecord($dbc, "students", "student_id", $text);
		        $path = 'assets/'; 
		        $_SESSION['qrfile'] = $file = $path."test.png"; 
		        $ecc = 'Q'; 
		        $pixel_Size = 5; 
		        $frame_size = 5; 

		        // Generates QR Code and Stores it in directory given 
		        QRcode::png($text, $file, $ecc, $pixel_Size, $frame_size); 
		          
		        // Displaying the stored QR code from directory 
		        // echo "<center><img src='".$file."'></center>"; 
	        }
	    ?>
		<div class="col-sm-8">
			<div class="scard">
				<i>Student Card</i> <a target="_blank" href="pages/print_card.php?student_id=<?=$text?>&file_name=<?=$file?>" class="btn btn-sm btn-success float-right">Print <i class="fas fa-print"></i></a><hr>
				Name : <strong><?=@$students['student_name']?></strong><br>
				Roll No : <strong>BPS-<?=@$students['student_id']?></strong><br>
				Class : <strong><?=@fetchRecord($dbc, "classes", "class_id", $students['class_id'])['class_name']?></strong><br>
				Monthly Fee : <strong><?=@fetchRecord($dbc, "classes", "class_id", $students['class_id'])['class_fee']?></strong><br>
				Gender : <strong><?=@$students['student_gender']==1? "Male" : "Female"?></strong><br>
				Phone : <strong><?=@$students['student_phone']?></strong><br>
				Address : <strong><?=@$students['student_address']?></strong><br>
				<br>
				<img src="<?=$file?>" style="float: right; margin-top: -180px;">
			</div>
		</div><!-- col -->
	</div><!-- row -->	
	</div><!-- card body -->
</div><!-- card -->

