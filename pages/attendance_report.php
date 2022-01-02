<div class="card">
	<div class="card-header">
		<h5 class="card-title">Attendance Report</h5>
	</div><!-- card-header -->
	<div class="card-body">

		<?php if (empty($_REQUEST['class_id'])) {?>
			<h3 class="text-center">SELECT CLASS</h3>
			<ul class="menu cf">
			  <li>
			    <a href="#">Classes</a>
			    <ul class="submenu">
			    <?php $q=mysqli_query($dbc,"SELECT * FROM classes");
			    while ($r=mysqli_fetch_assoc($q)):?>
			      <li>
			      	<a href="index.php?nav=attendance_report&class_id=<?=$r['class_id']?>">Class <?=$r['class_name']?></a></li>
			  <?php endwhile; ?>
			    </ul>			
			  </li>
			</ul><!-- DROPDOWN -->
			<br><br>

		<?php } elseif (!empty($_REQUEST['class_id']) AND empty($_REQUEST['student_id'])) {
			$x=1;
			?>
			<div class="text-center" style="width: 800px; padding-left: 300px;">
				<label><h4>Search Student</h4></label>
				<input onchange="getStudentID(<?=$x?>);" list="lst" id="student_id<?=$x?>" autocomplete="off" name="student_id[]" class="form-control" placeholder="Ali e.g">
				<datalist id="lst">	
				<?php
					$class_id=$_REQUEST['class_id'];
				 $q = mysqli_query($dbc,"SELECT students.student_id,students.student_name,students.f_name,students.class_id FROM students WHERE class_id='$class_id'");
					while($r=mysqli_fetch_assoc($q)):?>
						<option value="<?=$r['student_id']?>">
							<?=$r['student_name']?> S/O <?=$r['f_name']?>	
						</option>
					<?php endwhile; ?>
				</datalist>
				<input type="text" id="student_name<?=$x?>" name="student_name[]" class="form-control bg-info" readonly>
				<span id="searChBtn"></span>
			</div>
		<?php } elseif (!empty($_REQUEST['class_id']) AND !empty($_REQUEST['student_id'])) {?>
				<?php $r=mysqli_fetch_assoc(getWhere($dbc,'students','student_id',$_REQUEST['student_id'])); ?>
				<div class="row">
					<div class="col-12 d-flex align-items-stretch flex-column" >
		              <div class="card bg-light d-flex flex-fill" style="height:270px">
		                <div class="card-header border-bottom-0" style="background-color:#D6D6D6">
		                  <h5>Student Profile</h5>
		                </div>
		                <div class="card-body pt-0">
		                  <div class="row">
		                    <div class="col-7">
		                      <div class="mrgnL">
		                      	<br>
		                      	<h2 class="text-left"><b><?=$r['student_name']?></b></h2>
		                     	<h5 class="float-left text-info">Father: </h5> &emsp;<?=$r['f_name']?> <br>
								<h5 class="float-left text-info">ID# </h5> &emsp;<?=$r['student_id']?><br>
								<h5 class="float-left text-info">Class: </h5>  &emsp;<?=ucwords(fetchRecord($dbc,'classes','class_id',$r['class_id'])['class_name'])?><br>
								<h5 class="float-left text-info">Phone: </h5> &emsp;<?=$r['student_phone']?>
		                      </div>
		                    </div><!-- col -->
		                    <div class="col-5">
		                    	<br>
		                      <img src="img/<?=$r['student_pic']?>" height="160" class="img-circle text-info">
		                    </div><!-- col -->
		                  </div><!-- row -->
		                </div><!-- card-body -->
		              </div><!-- card -->
		            </div><!-- col -->
		        </div><!-- row -->
				<br>
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Sr.#</th>
									<th>Student Name</th>
									<th>Class</th>
									<th>Status</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$x = 1;
								$q = getWhere($dbc, "attendance","student_id",$_REQUEST['student_id']);
								while ($r = mysqli_fetch_assoc($q)):?>
									<tr>
										<td><?=$x?></td>
										<td>&emsp;<?=fetchRecord($dbc,"students", "student_id", $r['student_id'])['student_name']?></td>
										<td>&emsp;<?=fetchRecord($dbc,"classes", "class_id", $_REQUEST['class_id'])['class_name']?></td>
										<td>&emsp;<?php if ($r['attendance_sts']==1) {
											echo "Present";}else{
												echo "Absent";
											}
											?></td>
										<td><?=date('D, d/M/Y', strtotime($r['attendance_date']))?></td>
									</tr>
								<?php 
									$x++;
									endwhile; 
								?>
							</tbody>
						</table>
					</div>
				</div><!-- row -->	

		<?php } ?>
	</div><!-- card-body -->
	<div class="card-footer">
		
	</div>
</div><!-- card -->

<style>

	table tbody {display: block; height: 600px; max-height: 600px; overflow-y: scroll; } table thead, table tbody tr {display: table; width: 100%; table-layout: fixed; } .mrgnL{margin-left: 180px; }.menu, .submenu {margin: 0; padding: 0; list-style: none; } /* Main level */ .menu {margin: auto; width: 800px; /* http://www.red-team-design.com/horizontal-centering-using-css-fit-content-value */ width: -moz-fit-content; width: -webkit-fit-content; width: fit-content; } .menu > li {background: #34495e; float: left; position: relative; transform: skewX(25deg); } .menu a {display: block; color: #fff; text-transform: uppercase; text-decoration: none; font-family: Arial, Helvetica; font-size: 12px; } .menu li:hover {background: #0191A4; } .menu > li > a {transform: skewX(-25deg); padding: 1em 2em; } /* Dropdown */ .submenu {position: absolute; width: 200px; left: 50%; margin-left: -100px; transform: skewX(-25deg); transform-origin: left top; } .submenu li {background-color: #34495e; position: relative; overflow: hidden; } .submenu > li > a {padding: 1em 2em; } .submenu > li::after {content: ''; position: absolute; top: -125%; height: 100%; width: 100%; box-shadow: 0 0 50px rgba(0, 0, 0, .9); } /* Odd stuff */ .submenu > li:nth-child(odd){transform: skewX(-25deg) translateX(0); } .submenu > li:nth-child(odd) > a {transform: skewX(25deg); } .submenu > li:nth-child(odd)::after {right: -50%; transform: skewX(-25deg) rotate(3deg); } /* Even stuff */ .submenu > li:nth-child(even){transform: skewX(25deg) translateX(0); } .submenu > li:nth-child(even) > a {transform: skewX(-25deg); } .submenu > li:nth-child(even)::after {left: -50%; transform: skewX(25deg) rotate(3deg); } /* Show dropdown */ .submenu, .submenu li {opacity: 0; visibility: hidden; } .submenu li {transition: .2s ease transform; } .menu > li:hover .submenu, .menu > li:hover .submenu li {opacity: 1; visibility: visible; } .menu > li:hover .submenu li:nth-child(even){transform: skewX(25deg) translateX(15px); } .menu > li:hover .submenu li:nth-child(odd){transform: skewX(-25deg) translateX(-15px); } </style>