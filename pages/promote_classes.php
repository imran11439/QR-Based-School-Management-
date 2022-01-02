<div class="card">
	<div class="card-header">
		<h5 class="card-title">Promote Students</h5>
	</div><!-- card header -->
	<div class="card-body">
	<div class="msg"></div>
	<?php if (empty($_REQUEST['class_id'])) {?>
		<h3 class="text-center">SELECT CLASS</h3>
		<ul class="menu cf">
		  <li>
		    <a href="#">Classes</a>
		    <ul class="submenu">
		    <?php $q=mysqli_query($dbc,"SELECT * FROM classes");
		    while ($r=mysqli_fetch_assoc($q)):?>
		      <li>
		      	<a href="index.php?nav=promote_classes&class_id=<?=$r['class_id']?>" id="promoteTable">Class <?=$r['class_name']?></a></li>
		  <?php endwhile; ?>
		    </ul>			
		  </li>
		</ul><!-- DROPDOWN -->
		<br><br>
	<?php };?>

	<?php if (!empty($_REQUEST['class_id'])) {?>
		<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
	              <div class="box-tools">
	              </div><!-- box-tools -->
				<br>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-responsive table-hover table-striped bg-light">
                <thead style="background-color:#263544; color: #fff;border-radius: 7px;">
                	<tr>
                	  <th> &emsp; Select</th>
                	  <th>Student ID#</th>
	                  <th>Student Name</th>
	                  <th>Father Name</th>
	                  <th>Class</th>
	                </tr>
                </thead>
                <tbody>
                <?php 
                	$q=mysqli_query($dbc,"SELECT * FROM students WHERE class_id = '$_REQUEST[class_id]' AND student_sts='1'");
                	while ($r = mysqli_fetch_assoc($q)):?>
                	<tr id="<?=$r['student_id']?>">
	                  <td>
	                  	<div class="pdl-5"><input type="checkbox" name="foo[]" id="student_id<?=$r['student_id']?>" value="<?=$r['student_id']?>"></div>
	                  </td>
	                  <td> &emsp; <?=$r['student_id']?></td>
	                  <td>&emsp;<?=$r['student_name']?></td>
	                  <td>&emsp;<?=$r['f_name']?></td>
	                  <td class="text-uppercase">&emsp;<?=fetchRecord($dbc,'classes','class_id',$r['class_id'])['class_name'];?></td>
	                </tr>
                <?php endwhile;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box-footer">
          		<span class="pdl-5">
          			<span class="fas fa-arrow-up"></span>&nbsp; <input type="checkbox" id="checkAll" onclick="toggle(this)"> <label for="checkAll"> Select All</label>
          		</span>
          		<label class="pdl-5"> Select Class</label>
          		<?php $class_id = $_REQUEST['class_id'];
          			$preClass = $class_id-1;
          			$postClass = $class_id+1;?>
          		<select name="" id="whichClass" onchange="showProBtn()" style="border-radius: 6px;">
          			<optgroup label="PREVIOUS">
						<option value="<?=$preClass?>"><?=ucwords((fetchRecord($dbc,'classes','class_id',$preClass)['class_name']));?></option>
					</optgroup>
					<optgroup label="NEXT">
						<?php $next="";
							$next = ($class_id>=10)?"Passed":fetchRecord($dbc,'classes','class_id',$postClass)['class_name'];?>
						<option value="<?=$postClass?>"><?=ucwords($next)?></option>
					</optgroup>
				</select>
          	<br><br><span id="showProm"></span>
          </div><!-- box-footer -->
        </div><!-- col -->
      </div><!-- row -->
	<?php };?>
	</div><!-- card body -->
	<div class="card-footer">
		
	</div>
</div><!-- card -->


<script>
	function showProBtn(){
		$("#showProm").html('<button class="btn btn-grd-success btn-block" type="submit" name="promoteBTN" id="promoteBTN" style="border-radius: 15px;"><span class="fas fa-graduation-cap"></span> Promote</button>');
	}

    function toggle(source) {
	  checkboxes = document.getElementsByName('foo[]');
	  for(var i=0, n=checkboxes.length;i<n;i++) {
	    checkboxes[i].checked = source.checked;
	  }
	}
</script>


<style>
.pdl-5{padding-left: 30px;}table tbody tr {background-color: #D2D6DE} table tbody tr:hover td, .table-hover tbody tr:hover th {background-color: #BBC0C4; }.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {background-color: #E7E7E7; }.table-striped > tbody > tr:nth-child(2n+1):hover > td, .table-striped > tbody > tr:nth-child(2n+1):hover > th {background-color: #BBC0C4; } table tbody {display: block; height: 450px; max-height: 444px; overflow-y: scroll; } table thead, table tbody tr {display: table; width: 100%; table-layout: fixed; } .menu {margin: auto; width: 800px; /* http://www.red-team-design.com/horizontal-centering-using-css-fit-content-value */ width: -moz-fit-content; width: -webkit-fit-content; width: fit-content; } .menu > li {background: #34495e; float: left; position: relative; transform: skewX(25deg); } .menu a {display: block; color: #fff; text-transform: uppercase; text-decoration: none; font-family: Arial, Helvetica; font-size: 12px; } .menu li:hover {background: #0191A4; } .menu > li > a {transform: skewX(-25deg); padding: 1em 2em; } /* Dropdown */ .submenu {position: absolute; width: 200px; left: 50%; margin-left: -100px; transform: skewX(-25deg); transform-origin: left top; } .submenu li {background-color: #34495e; position: relative; overflow: hidden; } .submenu > li > a {padding: 1em 2em; } .submenu > li::after {content: ''; position: absolute; top: -125%; height: 100%; width: 100%; box-shadow: 0 0 50px rgba(0, 0, 0, .9); } /* Odd stuff */ .submenu > li:nth-child(odd){transform: skewX(-25deg) translateX(0); } .submenu > li:nth-child(odd) > a {transform: skewX(25deg); } .submenu > li:nth-child(odd)::after {right: -50%; transform: skewX(-25deg) rotate(3deg); } /* Even stuff */ .submenu > li:nth-child(even){transform: skewX(25deg) translateX(0); } .submenu > li:nth-child(even) > a {transform: skewX(-25deg); } .submenu > li:nth-child(even)::after {left: -50%; transform: skewX(25deg) rotate(3deg); } /* Show dropdown */ .submenu, .submenu li {opacity: 0; visibility: hidden; } .submenu li {transition: .2s ease transform; } .menu > li:hover .submenu, .menu > li:hover .submenu li {opacity: 1; visibility: visible; } .menu > li:hover .submenu li:nth-child(even){transform: skewX(25deg) translateX(15px); } .menu > li:hover .submenu li:nth-child(odd){transform: skewX(-25deg) translateX(-15px); }</style>