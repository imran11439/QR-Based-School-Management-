<!DOCTYPE html>
<html>
<head>
	<title>JQuery HTML5 QR Code Scanner using Instascan JS Example - ItSolutionStuff.com</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
  
    <h1>JQuery HTML5 QR Code Scanner using Instascan JS Example - ItSolutionStuff.com</h1>
    
    <video id="preview"></video>
    <script type="text/javascript">
      $(document).ready(function () {
        $('.check').on('change paste keyup',function () {
          alert($('.check').val());
        });
      })
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        $('.check').val(content);
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
    </script>
    <!-- <img src="img/qr.gif" alt="" id="check"> -->
    <input type="text" class="check" value="" placeholder="">
</body>
</html>