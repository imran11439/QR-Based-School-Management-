<style>
  #preview{
    width: 400px;
    border: 4px solid black;
    box-shadow: 10px 10px grey;
    overflow: auto;
  }
</style>

<!-- QR Reader Scanner API / Library -->
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


<br>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h2>Student Attendance System</h2>
      <h3>Date : <?=date('l, d / M / Y'); ?></h3>
      <h3><a href="index.php?nav=student_cards">Generate QR here :)</a></h3>
      <br>
      <img src="assets/loader.gif" class="d-none" style="width: 150px; height: 150px" id="loader">

    </div>  <!-- col -->
    <div class="col-sm-6">
      <h3>Scan Card to Mark Attendance</h3>
      <video id="preview"></video>
    </div><!-- col -->
  </div><!-- row -->
  <br>
  <div class="row">
    <div class="col-sm-12">
      <table class="table table-striped" id="loadAttendance">
        <thead>
          <tr>
            <th>Sr.</th>
            <th>Date</th>
            <th>Class</th>
            <th>Section</th>
            <th>Student Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mon, 12-09-2020</td>
            <td>PG</td>
            <td>Green</td>
            <td>Marsad Akbar</td>
            <td>Present</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- container -->

<script type="text/javascript">
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
  scanner.addListener('scan', function (content) {
    markAttendance(content);
    alert(content)
  });
  Instascan.Camera.getCameras().then(function (cameras) {
  if (cameras.length > 0) {
    scanner.start(cameras[0]);
  } else {
    console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });

  function markAttendance (unique_id) {
    $.ajax({
      url:'inc/code.php',
      type:"POST",
      data:{attendanceStID : unique_id},
      dataType:"text",
      success:function(msg) {
        $('#loader').removeClass("d-none").fadeIn(1000).fadeOut(1000);
        loadAttendance.ajax.reload(null, false);
      }
    });
  }
</script>