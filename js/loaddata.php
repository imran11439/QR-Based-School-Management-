<?php   

require_once '../connect/db.php';

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'loadUsers' :
            loadUsers($dbc);
            break;
        case 'loadclasses' :
            loadclasses($dbc);
            break;
        case 'loadsections' :
            loadsections($dbc);
            break;
        case 'loadstudents' :
            loadstudents($dbc);
            break;
        case 'loadteacher' :
            loadteacher($dbc);
            break;
        case 'loadSchool' :
            loadSchool($dbc);
            break;
        case 'loadcategories' :
            loadcategories($dbc);
            break;
        case 'loadsub_categories' :
            loadsub_categories($dbc);
            break;
        case 'loadproducts' :
            loadproducts($dbc);
            break;
        case 'loadsupplier' :
            loadsupplier($dbc);
            break;
        case 'loadAttendance' :
            loadAttendance($dbc);
            break;
        // ...etc...
    }
}

function loadSchool($dbc){
    $result = mysqli_query($dbc,"SELECT * FROM school");
    $output = array('data' => array());
    if($result->num_rows > 0) { 
     // $row = $result->fetch_array();
     $activeUsers = ""; 
        while($row = $result->fetch_array()) {
        $school_id = $row[0];

            $button = '<!-- Single button -->
            <form><i id="'.$school_id.'" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="'.$school_id.'" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="school"><input type="hidden" id="col_name" value="school_id"></form>';

            $output['data'][] = array(      
                $row[0],        
                $row[1],        
                $row[2],        
                $row[3],        
                $button         
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output);
}

function loadUsers($dbc){
    $result = mysqli_query($dbc,"SELECT * FROM users");
    $output = array('data' => array());
    if($result->num_rows > 0) { 
     // $row = $result->fetch_array();
     $activeUsers = ""; 
        while($row = $result->fetch_array()) {
        $user_id = $row[0];
            // active 
            if($row[6] == 1) {
                // activate member
                $activeUsers = "<label class='label label-success label-lg'>Active</label>";
            } else {
                // deactivate member
                $activeUsers = "<label class='label label-danger label-lg'>Deactive</label>";
            }

            $button = '<!-- Single button -->
            <form><i id="'.$user_id.'" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="'.$user_id.'" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="users"><input type="hidden" id="col_name" value="user_id"></form>';

            $output['data'][] = array(      
                $row[1],        
                $row[2],        
                $row[3],        
                $activeUsers,
                $button         
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output);
}

function loadclasses($dbc){
    $result0 = mysqli_query($dbc,"SELECT * FROM classes");
    $output0 = array('data' => array());
    if($result0->num_rows > 0) { 
     // $row = $result0->fetch_array();
     $activeClasses = ""; 
        while($row = $result0->fetch_array()) {
        $class_id = $row[0];

            $button = '<!-- Single button -->
            <form><i id="'.$class_id.'" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="'.$class_id.'" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="classes"><input type="hidden" id="col_name" value="class_id"></form>';

            $output0['data'][] = array(      
                $row[0],               
                $row[1],
                $row[3],
                $button         
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output0);
}

function loadsections($dbc){
    $result1 = mysqli_query($dbc,"SELECT * FROM sections");
    $output1 = array('data' => array());
    if($result1->num_rows > 0) { 
     // $row = $result1->fetch_array();
     $activeSections = ""; 
        while($row = $result1->fetch_array()) {
        $section_id = $row[0];
            // active 
            if($row[2] == 1) {
                // activate member
                $activeSections = "<label class='label label-success label-lg'>Active</label>";
            } else {
                // deactivate member
                $activeSections = "<label class='label label-danger label-lg'>Deactive</label>";
            }

            $button = '<!-- Single button -->
            <form><i id="'.$section_id.'" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="'.$section_id.'" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="sections"><input type="hidden" id="col_name" value="section_id"></form>';

            $output1['data'][] = array(      
                $row[0],               
                $row[1],               
                $activeSections,
                $button         
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output1);
}

function loadstudents($dbc){
    $result2 = mysqli_query($dbc,"SELECT * FROM students");
    $output2 = array('data' => array());
    if($result2->num_rows > 0) { 
     // $row = $result2->fetch_array();
     $activeStudent = ""; 
     $gender = ""; 
     $class = ""; 
     $std_img = "";
        while($row = $result2->fetch_array()) {
        $student_id = $row[0];
            // active 
            if($row[6] == 1) {
                // activate member
                $activeStudent = "<label class='label label-success label-lg'>Active</label>";
            } else {
                // deactivate member
                $activeStudent = "<label class='label label-danger label-lg'>Deactive</label>";
            }
 
            if($row[12] == 1) {
                // activate member
                $gender = "Male";
            } else {
                // deactivate member
                $gender = "Female";
            }

            $std_img = "<img class='img-round' src='img/".$row[17]."' style='height:40px; width:40px;'  />";
            $class = fetchRecord($dbc, "classes", "class_id", $row[4])['class_name'];

            $button = '<!-- Single button -->
            <form><i id="'.$student_id.'" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="'.$student_id.'" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="students"><input type="hidden" id="col_name" value="student_id"></form>';

            $output2['data'][] = array(      
                $row[0],               
                $std_img,               
                $row[2],               
                $row[3],               
                $class,               
                $row[7],               
                $row[8],               
                $row[9],               
                $row[10],               
                $gender,               
                $activeStudent,
                $button         
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output2);
}

function loadteacher($dbc){
    $result2 = mysqli_query($dbc,"SELECT * FROM teachers");
    $output2 = array('data' => array());
    if($result2->num_rows > 0) { 
     // $row = $result2->fetch_array();
     $activeTeachers = ""; 
        while($row = $result2->fetch_array()) {
        $teacher_id = $row[0];
            // active 
            if($row[14] == 1) {
                // activate member
                $activeTeachers = "<label class='label label-success label-lg'>Active</label>";
            } else {
                // deactivate member
                $activeTeachers = "<label class='label label-danger label-lg'>Deactive</label>";
            }
            
            $std_img = "<img class='img-circle' src='img/".$row[18]."' style='height:40px; margin-left:19px; width:40px;'  />";
            $class = fetchRecord($dbc, "classes", "class_id", $row[9])['class_name'];
            
            $button = '<!-- Single button -->
            <form><i id="'.$teacher_id.'" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="'.$teacher_id.'" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="teachers"><input type="hidden" id="col_name" value="teacher_id"></form>';

            $output2['data'][] = array(      
                $row[0],               
                $std_img,               
                $row[1],               
                $row[2],               
                $row[3],               
                $row[4],               
                $row[8],               
                $row[6],               
                $row[7],               
                $class,                                                           
                $activeTeachers,
                $button         
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output2);
}

function loadcategories($dbc){
    $result = mysqli_query($dbc,"SELECT * FROM categories");
    $output = array('data' => array());
    if($result->num_rows > 0) { 
     // $row = $result->fetch_array();
     $categories = ""; 
        while($row = $result->fetch_array()) {
        $category_id = $row[0];
            // active 
            if($row[2] == 1) {
                // activate member
                $categories = "<label class='label label-success label-lg'>Active</label>";
            } else {
                // deactivate member
                $categories = "<label class='label label-danger label-lg'>Deactive</label>";
            }

            $button = '<!-- Single button -->
            <form><i id="'.$category_id.'" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="'.$category_id.'" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="categories"><input type="hidden" id="col_name" value="category_id"></form>';

            $output['data'][] = array(      
                $row[0],        
                $row[1],                        
                $categories,
                $button         
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output);
}

function loadsub_categories($dbc){
    $result = mysqli_query($dbc,"SELECT * FROM sub_categories");
    $output = array('data' => array());
    if($result->num_rows > 0) { 
     // $row = $result->fetch_array();
     $sub_categories = ""; 
        while($row = $result->fetch_array()) {
        $sub_category_id = $row[0];
            // active 
            if($row[2] == 1) {
                // activate member
                $sub_categories = "<label class='label label-success label-lg'>Active</label>";
            } else {
                // deactivate member
                $sub_categories = "<label class='label label-danger label-lg'>Deactive</label>";
            }

            $button = '<!-- Single button -->
            <form><i id="'.$sub_category_id.'" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="'.$sub_category_id.'" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="sub_categories"><input type="hidden" id="col_name" value="sub_category_id"></form>';

            $output['data'][] = array(      
                $row[0],        
                $row[1],                        
                $sub_categories,
                $button         
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output);
}

function loadproducts($dbc){
    $result = mysqli_query($dbc,"SELECT * FROM products");
    $output = array('data' => array());
    if($result->num_rows > 0) { 
     // $row = $result->fetch_array();
     $product_id = ""; 
        while($row = $result->fetch_array()) {
        $product_id = $row[0];
            // active 
            if($row[7] == 1) {
                // activate member
                $product_sts = "<label class='label label-success label-lg'>Active</label>";
            } else {
                // deactivate member
                $product_sts = "<label class='label label-danger label-lg'>Deactive</label>";
            }

            $button = '<!-- Single button -->
            <form><i id="'.$product_id.'" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="'.$product_id.'" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="products"><input type="hidden" id="col_name" value="product_id"></form>';

            $output['data'][] = array(      
                $row[0],        
                $row[1],                        
                $row[4],                        
                $row[5],                        
                $row[6],                        
                $product_sts,
                $button         
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output);
}

function loadsupplier($dbc){
    $result = mysqli_query($dbc,"SELECT * FROM supplier");
    $output = array('data' => array());
    if($result->num_rows > 0) { 
     // $row = $result->fetch_array();
     $activesupplier = ""; 
        while($row = $result->fetch_array()) {
        $supplier_id = $row[0];
            // active 
            if($row[4] == 1) {
                // activate member
                $activesupplier = "<label class='label label-success label-lg'>Active</label>";
            } else {
                // deactivate member
                $activesupplier = "<label class='label label-danger label-lg'>Deactive</label>";
            }

            $button = '<!-- Single button -->
            <form><i id="'.$supplier_id.'" class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green update" style="cursor: pointer;"></i><i id="'.$supplier_id.'" class="feather icon-trash-2 f-w-600 f-16 text-c-red delete" style="cursor: pointer;"></i><input type="hidden" id="table_name" value="supplier"><input type="hidden" id="col_name" value="supplier_id"></form>';

            $output['data'][] = array(      
                $row[0],        
                $row[1],        
                $row[2],        
                $row[3],        
                $activesupplier,
                $button         
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output);
}

function loadAttendance($dbc){
    $result = mysqli_query($dbc,"SELECT * FROM attendance");
    $output = array('data' => array());
    if($result->num_rows > 0) { 
     // $row = $result->fetch_array();
     $activeUsers = ""; 
        while($row = $result->fetch_array()) {
            $students = fetchRecord($dbc, "students", "student_id", $row['student_id']);

            $output['data'][] = array(         
                $row['attendance_id'],
                date("l, d-m-y", strtotime($row['attendance_date'])),
                fetchRecord($dbc, "classes", "class_id", $students['class_id'])['class_name'],
                fetchRecord($dbc, "sections", "section_id", $students['section_id'])['section_name'],
                $students['student_name'],
                $row['attendance_sts'] == 1 ? "<label class='btn btn-sm btn-success'>Present</label>" : "<label class='btn btn-sm btn-danger'>Absent</label>",
            );  
        } // /while 
    }// if num_rows
    $dbc->close();
    echo json_encode($output);
}

//Getting Data from STudents id 
if (isset($_POST['getData']) == "options") {
    $q = mysqli_query($dbc,"SELECT * FROM students");
        while($r = mysqli_fetch_assoc($q)){
            $response[] = $r;
    }
    echo json_encode(array('data' => $response));    
    exit();
}

//Getting Data from STudents id 
if (isset($_POST['getTeachers']) == "teachers") {
    $q = mysqli_query($dbc,"SELECT * FROM teachers");
        while($r = mysqli_fetch_assoc($q)){
            $response[] = $r;
        }
    echo json_encode(array('data' => $response));    
    exit();
}



?>