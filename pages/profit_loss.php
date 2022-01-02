<div class="card">
	<div class="card-header bg-dark">
		<h5 class="card-title text-white">Profit / Loss Summary</h5>
	</div>	
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4">
				<div class="alert text-info alert-info">
					Total Students <span class="badge">
					<?php 
						$q = mysqli_query($dbc,"SELECT count(student_id) as students FROM fee");
						$r = mysqli_fetch_assoc($q);
						echo $r['students'];
					?>	
					</span>
				</div>
			</div>
		</div>
		<div class="row">
		<?php 
			$months = array('january','february','march','april','may','june','july','august','september','october','november','december');
			foreach ($months as $key => $value) {?>
		<div class="col-sm-4">
			<div class="d-flex bg-<?=getColor($key)?>">
				<div class="p-5">
					<h1 class="text-capitalize"><?=$value?></h1>
					<hr>
					<?php 
						$q = mysqli_query($dbc,"SELECT SUM($value) as fee_total FROM fee");
						$r = mysqli_fetch_assoc($q);
						echo $r['fee_total'];
					?>
				</div>
			</div>
		</div>
		<?php
			getSet($key);	
		}
		?>
		</div>
	</div>
	<div class="card-footer">
		Developed By Marsad Akbar
	</div>
</div>

<?php 
function getSet($key=''){
	switch ($key) {
		case 2:
			echo '</div><br><div class="row">';
		break;
		case 5;
			echo '</div><br><div class="row">';
		break;
		case 8;
			echo '</div><br><div class="row">';
		break;
		case 11;
			echo '</div><div class="row">';
		break;
		default:
		break;
	}
}

function getColor($key=''){
	switch ($key) {
		case 0:
			echo 'success';
		break;
		case 1;
			echo 'primary';
		break;
		case 4;
			echo 'success';
		break;
		case 5;
			echo 'primary';
		break;
		case 6;
			echo 'primary';
		break;
		case 8;
			echo 'success';
		break;
		case 9;
			echo 'success';
		break;
		case 10;
			echo 'primary';
		break;
		default:
		echo 'danger';
		break;
	}
}

?>