<?php
date_default_timezone_set("Indian/Maldives");
session_start();
$user='root';
$password='';
$db_name='school2';
@$dbc=mysqli_connect('localhost',$user,$password,$db_name);
if (@$dbc) {
  # code...
  // echo "connect";
}else{
  echo mysqli_connect_error();
  exit();
}
 
?>

<?php 
//Debug Function 
function debug_mode($array){
echo "<pre>";
print_r($array);
exit;
}
?>
 <?php function getYesNo($data){
 	return ($data==1)?'Yes':'No';
 } ?>
  
<?php function getEnDis($data){
 	return ($data==1)?'<span class="text-success">Enabled</span>':'<span class="text-danger">Disabled</span>';
} ?>
<?php function isActive($data){
  return ($data==1)?'<span class="label label-success">Activate</span>':'<span class="label label-danger">Deactivated</span>';
} ?>
<?php function getDateFormat($format,$data){
 	return date($format,strtotime($data));
 	} ?>
<?php 
//Get Data from table 
function get($dbc,$table){
return mysqli_query($dbc,"SELECT * FROM $table");
}
?>
<?php 
//Get Data by criteria  
function getWhere($dbc,$table,$fld,$id){
return mysqli_query($dbc,"SELECT * FROM $table WHERE $fld = '$id'");
}
?>
<?php 
//Get Data from table 
function getOrderBy($dbc,$table,$fld){
return mysqli_query($dbc,"SELECT * FROM $table ORDER BY $fld ASC");
}
?>
<?php 
//Get and Fetch Data from table
function getFetch($dbc,$table){
return mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM $table"));
}
 ?>
<?php 
//Count Row
function countIf($dbc,$arr){
 	echo (mysqli_num_rows($arr)==0)?"No Found":'';
}
?>
<?php 
 //Get Message 
 function getMessage($msg,$sts){
 	global $sts;
 	global $msg;
if (!empty($msg)) {
# code...
echo "<div class='alert alert-{$sts}'>{$msg}</div>";
}
}
  ?>
  <?php 
  //Delete Data From Table
  function deleteFromTable($dbc,$table,$fld="",$id){
  global $sts;
 	global $msg;
  // $id = base64_decode($id);
if (mysqli_query($dbc,"DELETE FROM $table WHERE $fld='$id'")) {
# code...
$msg =  "Deleted ....";
$sts="warning";
  // redirect('index.php?nav='.$_REQUEST['nav'],1500);
}else{
$msg= mysqli_error($dbc);
$sts="danger";
}
  }
   ?>
   <?php 
   //Redirect Function
  function redirect($url,$time=0){
  ?>
<script>
setTimeout(function(){
window.location="<?=$url?>";
},<?=$time?>);
</script>

  <?php
  }
    ?>
     <?php 
   //Redirect Function
  function redirectURL($time=0){
  ?>
<script>
setTimeout(function(){
window.location=window.location.href;
},<?=$time?>);
</script>

  <?php
  }
    ?>
    <?php 
    //Validate Function
     function validate_data($dbc,$data)
    {
    # code...
    return mysqli_real_escape_string($dbc,strip_tags($data));
    } ?>
<?php 
// Delete All function
function delete_all($dbc, $table, $array, $fld ){
global $sts;
 	global $msg;
 	if(!empty($array)):
foreach ($array as $data) {
# code...
$q = mysqli_query($dbc,"DELETE FROM $table WHERE $fld='$data'");
}
if ($q) {
# code...
$msg = "Data Deleted";
$sts = "danger";
}else{
$msg = mysqli_error($dbc);
$sts = "danger";
}
endif;
}
?>
<?php 
//count unseen
function countUnseen($dbc,$table,$fld){
return mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM $table WHERE $fld=0"));
}
 ?>
<?php 
  // Fetch by Criteria
function fetchRecord($dbc,$table,$fld,$data){
return  mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM $table WHERE $fld='$data'"));
} ?>
<?php 
  // Count When
function countWhen($dbc,$table,$fld,$data){
return  mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM $table WHERE $fld='$data'"));
} ?>
<?php 
  // Count When
function countWhens($dbc,$table,$fld1,$data1,$fld2,$data2){
return  mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM $table WHERE $fld1='$data1' AND $fld2='$data2'"));
} ?>
<?php 
//Insert Data Function
function insert_data($dbc,$table,$data){
  global $msg;
  global $sts;
  $fld=$values="";
  $i=0;
  $comma=",";
  $count = count($data);
  foreach ($data as $index => $value) {
  # code...
  if(($count-1)==$i){
  $comma="";
  }
  $fld=$fld.$index.$comma;
  if ($index!="post_body") {
  # code...
  $val =strtolower(validate_data($dbc,$value));
  }else{
  $val =strtolower($value);
  }
  $values = $values."'".$val."'".$comma;
  $i++;
  }
  return mysqli_query($dbc,"INSERT INTO $table($fld) VALUES($values)");
}

?>
<?php 
//Update Data Function
function update_data($dbc,$table,$data,$col,$val){
$set_data="";
$i=0;
$comma=",";
$count = count($data);
//debug_mode($data);
foreach ($data as $index => $value) {
# code...
if(($count-1)==$i){
$comma="";
}
$set_data=$set_data.$index."='".validate_data($dbc,$value)."'".$comma;
$i++;
}
return mysqli_query($dbc,"UPDATE $table SET $set_data WHERE $col='$val'");
}

?>
<?php
//Count Rows  
function countAll($dbc,$table){
return mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM $table"));
}
?>
<?php 
// get User IP Address 
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
   $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
   $ip = $_SERVER['REMOTE_ADDR'];
}
?>
<?php 
function url(){
    $pu = parse_url($_SERVER['REQUEST_URI']);
    return $pu["scheme"] . "://" . $pu["host"];
}
 ?>
 <?php 
function url_origin( $s, $use_forwarded_host = false )
{
    $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
    $sp       = strtolower( $s['SERVER_PROTOCOL'] );
    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
    $port     = $s['SERVER_PORT'];
    $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
    $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
    $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

function full_url( $s, $use_forwarded_host = false )
{
    return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
}

 ?>
<?php
// Pic upload
 function upload_pic($file,$url){
global $sts;
global $msg;
global $size;
global $pic;
// @$file= $_FILES['f'];
$file_name = $file['name'];
$temp_name = $file['tmp_name'];
$size = $file['size'];
// $type = $file['type'];
$errors = $file['error'];
$type = explode('.', $file_name);
$type = $type[count($type)-1];
$pic = uniqid(rand()).'.'.$type;
$_SESSION['pic_name'] = $pic;
$url = $url.$pic;
if (!$temp_name) {
# code...
$sts="info";
$msg= "Please Choose a File Before Clicking";
}elseif($size>500000){
$sts="info";
$msg= "Not Allowed more than 5 MB file size";
unlink($temp_name);
// exit();
}
elseif(!preg_match("/\.(gif|jpg|png|jpeg)$/i", $file_name)){
$sts="info";
$msg= "Only .jpg , .png and .gif file types are allowed";
unlink($temp_name);
// exit();
}elseif($errors==1){
$sts="info";
$msg= "Error while uploading....";
unlink($temp_name);
// exit();
}
if(move_uploaded_file($temp_name, $url)){
return true;
}
else{
$sts="info";
$msg= "Not Uploaded...";
@unlink($temp_name);
//exit();
}
} ?>

<?php
// file upload
 function upload_files($file,$url){
global $sts;
global $msg;
global $size;
global $pic;
// @$file= $_FILES['f'];
$file_name = $file['name'];
$temp_name = $file['tmp_name'];
$size = $file['size'];
// $type = $file['type'];
$errors = $file['error'];
$type = explode('.', $file_name);
$type = $type[count($type)-1];
$pic = uniqid(rand()).'.'.$type;
$_SESSION['pic_name'] = $pic;
$url = $url.$pic;
if (!$temp_name) {
# code...
$sts="info";
$msg[]= "Please Choose a File Before Clicking";
}elseif($size>1000000){
$sts="info";
$msg[]= "Not Allowed more than 10 MB file size";
unlink($temp_name);
// exit();
}
elseif($errors==1){
$sts="info";
$msg[]= "Error while uploading....";
unlink($temp_name);
// exit();
}
if(move_uploaded_file($temp_name, $url)){
return true;
}
else{
$sts="info";
$msg[]= "Not Uploaded...";
@unlink($temp_name);
//exit();
}
 /* $txt="";
  foreach ($msg as $value) {
    # code...
    $txt.=$value."<br>";
  }
  echo "<script>alert('".$txt."')</script>";*/
} ?>

<?php 
  function getSelectTag($data,$text){
    if (isset($data)) {
      # code...
      echo "<option value='".$data."'>".$data."</option>";
    }else{
      echo "<option value=''>".$text."</option>";

    }
  }
 ?>

<?php 
  function getSelectTagEnDis($data,$text){
    if (isset($data)) {
      # code...
      echo "<option value='".$data."'>".getStatus($data)."</option>";
    }else{
      echo "<option value=''>".$text."</option>";

    }
  }
 ?>
<?php 
//Send Email
function send_email($email_address,$email_body){
global $sts;
 	global $msg;
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "moixx.ansari43@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "3593ab59";

//Set who the message is to be sent from
$mail->setFrom('moixx.ansari43@email.com', 'Moixxweb Education Alert');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($email_address, 'Moixxweb Education Alert');

//Set the subject line
$mail->Subject = 'Moixxweb Education Alert';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
 
$body =$email_body;
$mail->Body =$body ;

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
   $msg= "Mailer Error: " . $mail->ErrorInfo;
   $sts="danger";
} else{
$msg="Email Sent Successfully...";
$sts="success";
}

} ?>

 <?php  
  //student promoton
   function studentPromotion($dbc,$student_id){
    $q = mysqli_query($dbc,"SELECT * FROM student_promotion WHERE student_id='$student_id' ORDER BY promotion_date DESC");
    while($r=mysqli_fetch_assoc($q)){
      echo "<li> <mark>Promoted to <i>".$r['student_class']." ".$r['student_section']." at ".date('D, d-M-Y',strtotime($r['promotion_date']))."</i></mark> <hr></li>";
    }
   }
  ?>

<?php  
  //student Fund History
   function studentFundHistory($dbc,$student_id){
    $q = mysqli_query($dbc,"SELECT * FROM fee_and_fund WHERE student_id='$student_id' GROUP BY fund_add_date ORDER BY fund_id DESC");
    if(mysqli_num_rows($q)>=1){
    while($r=mysqli_fetch_assoc($q)){
      echo '<a target="_new" href="print_student_reciept.php?fund_id='.$r['fund_id'].'" class="btn btn-warning pull-right">
          <span class="glyphicon glyphicon-list"></span> Print Reciept
          </a>';
      echo '<a href="index.php?nav=fee_and_fund&edit_fund_id='.$r['fund_id'].'" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                  </a>';
         echo '<a href="index.php?nav=fee_and_fund&del_fund_id='.$r['fund_id'].'" class="btn btn-danger pull-right">
          <span class="glyphicon glyphicon-trash"></span> Delete
        </a>';
      echo "Dated: <span class='label label-danger'>".date('d-M-Y',strtotime($r['fund_add_date']))."</span><br>";
      echo "Monthly Fee: ".$r['fund_monthly_fee']."<br>";
      echo "Cycle Fund: ".$r['fund_cycle']."<br>";
       echo "Paper Fund: ".$r['fund_paper']."<br>";
        echo "MF Fund: ".$r['fund_mf']."<br>";
         echo "Admission Fee: ".$r['fund_admission_fee']."<br>";
          echo "Minhaj Registration: ".$r['fund_minhaj_registration']."<br>";
          echo "Board Registration: ".$r['fund_board_registration']."<br>";          
          echo "Board Admission Fee: ".$r['fund_board_admission_fee']."<br>";       
          echo "<hr>";   

    }
  }
   }
  ?>

<?php 
  //Level status
  function getLevel($sts){
    switch ($sts) {
      case 'l1':
        # code...
      return '<label class="label label-warning">Level 1</label>';
        break;
      case 'l2':
        # code...
      return '<label class="label label-primary">Level 2</label>';
        break;
      case 'l3':
        # code...
      return '<label class="label label-success">Level 3</label>';
        break;
      default:
        # code... 
      break;
    }
  }

function getTransaction($sts){
  if ($sts == "ware_sale") { 
    return '<label class="label label-warning">Ware House Sale</label>';
  }elseif($sts == "sale"){
    return '<label class="label label-success">Direct Sale</label>';
  }else{
    return '<label class="label label-danger">Purchase</label>';
  }
}  

function getOrderType($sts){
  if ($sts == "0") { 
    return '<label class="label label-danger">Cancelled</label>';
  }elseif($sts == "1"){
    return '<label class="label label-info">Approved</label>';
  }elseif($sts == "2"){
    return '<label class="label label-success">Completed</label>';
  }else{
    return '<label class="label label-warning">Pending</label>';
  }
}  
 ?>
