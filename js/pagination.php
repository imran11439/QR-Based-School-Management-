<?php

	// Connect database 

	require_once('../connect/db.php');

	$limit = 3;

    if (isset($_POST['page_no'])) {
        $page_no = $_POST['page_no'];
    }else{
        $page_no = 1;
    }

    $offset = ($page_no-1) * $limit;

    $query = "SELECT * FROM teachers LIMIT $offset, $limit";

    $result2 = mysqli_query($dbc, $query);

    $output = "";
    //$result2 = mysqli_query($dbc,"SELECT * FROM teachers");
    $output.="<div class='card-body'><div class='row'>";
    if($result2->num_rows > 0){
        while ($r=mysqli_fetch_assoc($result2)) {
           $output.='<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column" >
              <div class="card bg-light d-flex flex-fill" style="height:270px">
                <div class="card-header text-muted border-bottom-0">
                  '.$r["teacher_role"].'
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead text-left"><b>'.$r["teacher_name"].'</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> '.$r["teacher_qualification"].'</p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: '.$r["teacher_address"].'</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> '.$r["teacher_contact"].'</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="img/'.$r["teacher_pic"].'" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>';
        }
    }
    $output.="</div></div>";
	if (isset($_POST['page_no'])) {
	    $page_no = $_POST['page_no'];
	}else{
	    $page_no = 1;
	}
	$sql = "SELECT * FROM teachers";

	$records = mysqli_query($dbc, $sql);

	$totalRecords = mysqli_num_rows($records);

	$totalPage = ceil($totalRecords/$limit);

	$output.="<div class='card-footer'><ul class='pagination justify-content-center' style='margin-top:20px'>";

	for ($i=1; $i <= $totalPage ; $i++) { 
	   if ($i == $page_no) {
		$active = "active";
	   }else{
		$active = "";
	   }

	    $output.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
	}

	$output.= "</ul></div>";
	//$data = array($output1,$output2,);
	echo $output;


?>



<!-- <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
    <div class="card bg-light d-flex flex-fill">
        <div class="card-header text-muted border-bottom-0">
            Biology
        </div>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-7">
                    <h2 class="lead text-left"><b>M Javed Iqbal</b></h2>
                    <p class="text-muted text-sm"><b>About: </b> BS Biology From University Of Sargodha, Sargodha</p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                    	<li class="small">
                    		<span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: 38 DB Jandanwala Bhakkar
                    	</li>
                        <li class="small">
                        	<span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> 03487654323
                        </li>
                    </ul>
                </div>
                <div class="col-5 text-center">
                	<img src="img/user_default.png" alt="user-avatar" class="img-circle img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
    <div class="card bg-light d-flex flex-fill">
        <div class="card-header text-muted border-bottom-0">
            Mathematics
        </div>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-7">
                    <h2 class="lead text-left"><b>Masoom Iqbal</b></h2>
                    <p class="text-muted text-sm"><b>About: </b> Msc Mathematics From Gomal University, DI Khan</p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small">
                        	<span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: House #32 B DI Khan
                        </li>
                        <li class="small">
                        	<span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> 03456789987
                        </li>
                    </ul>
                </div>
               <div class="col-5 text-center">
                    <img src="img/user_default.png" alt="user-avatar" class="img-circle img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
	<div class='card-footer'>
		<ul class='pagination justify-content-center' style='margin:20px 0'>
			<li class='page-item active'>
				<a class='page-link' id='1' href=''>1</a>
			</li>
			<li class='page-item '>
				<a class='page-link' id='2' href=''>2</a>
			</li>
		</ul>
	</div> -->