<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SPKT</title>



  <!-- Google Fonts -->

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/vendor/css/style.css')}}" rel="stylesheet">

<!-- tron -->
<link href="{{asset('admin/css/jumbotron-narrow.css')}}" rel="stylesheet">
<script src="{{asset('admin/js/jquery.min.js')}}"></script>


<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
<link rel="stylesheet" href="{{asset('admin/assets/scss/style.css')}}">

  <!-- ======= Clock ======= -->
  <link rel="stylesheet" href="{{asset('assets/css/clock.css')}}">




<script src="http://localhost:3002/socket.io/socket.io.js"></script>


</head>

<body onLoad="initClock()">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">

        <div class="container d-flex align-items-center">
      <div class="logo mr-auto">
         <h1 class="text-light"><span>Antrian SPKT</span></a></h1>

      </div>
    </div>

    <div id="timedate" >
        <a id="mon">January</a>
        <a id="d">1</a>,
        <a id="y">0</a><br />
        <a id="h">12</a> :
        <a id="m">00</a>:
        <a id="s">00</a>
      </div>
  </header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <audio id="audioPlayer"></audio>



    <div class="row loket">
        <div class="col-md-5">
                <div class="col-md-6">
                    <div class="1 jumbotrontable" style="padding-top:20px;padding-bottom:20px;"><h1>A</h1><h1 id="skck"> 0</h1><br/><button class="btn btn-success" type="button">
                    <span class="glyphicon glyphicon-credit-card" >&nbsp;</span>SKCK</button></div></div>
                <div class="col-md-6">
                        <div class="2 jumbotrontable" style="padding-top:20px;padding-bottom:20px;"><h1>B</h1><h1 id="sktlk"> 0</h1><br/><button class="btn btn-success" type="button">
                    <span class="glyphicon glyphicon-credit-card">&nbsp;</span>SKTLK</button></div></div>
                <div class="col-md-6">
                        <div class="3 jumbotrontable" style="padding-top:20px;padding-bottom:20px;"><h1>C</h1><h1 id="lp"> 0</h1><br/><button class="btn btn-success" type="button">
                    <span class="glyphicon glyphicon-credit-card">&nbsp;</span>LP</button></div></div>
                <div class="col-md-6">
                        <div class="4 jumbotrontable" style="padding-top:20px;padding-bottom:20px;"><h1>D</h1><h1 id="ijin"> 0</h1><br/><button class="btn btn-success" type="button">
                    <span class="glyphicon glyphicon-credit-card">&nbsp;</span>Surat Ijin Keramaian</button></div></div>
                <div class="col-md-6">


        </div>
        <div class="col-md-7">
            <div class="title m-b-md">
                <video id="video" preload="auto" autoplay muted loop>
                    <source src="{{URL::asset('video/upload.mp4')}}" type="video/mp4">
                </video>

            </div>
        </div>

    </div>

    <svg class="hero-waves"  viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->








  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/monitor.js')}}"></script>

  <!-- clock -->
  <script src="{{asset('assets/js/clock.js')}}"></script>


  <script>

var io = io('http://localhost:3002/')


var queue = [];
var playing = false

    // $(document).ready(() => {
        io.on('data', function(payload) {
            console.log(payload)

            switch (payload.jenis){
                case 'skck':
                 $('#skck').html(payload.no)
                jenis = "nomor_antrian_A"
                no = (payload.no)
                    break;
                case 'sktlk':
                    $('#sktlk').html(payload.no)
                jenis = "nomor_antrian_B"
                    break;
                case 'lp':
                    $('#lp').html(payload.no)
                    jenis = "nomor_antrian_C"
                    break;
                case 'ijin':
                     $('#ijin').html(payload.no)
                     jenis = "nomor_antrian_D"
                     break;
            }


	var audio = document.getElementById('audioPlayer')

  // Tambahkan file audio dari socket disini
    queue.push('audio/'+jenis+'.ogg')
    queue.push('audio/'+payload.no+'.ogg')

    playQueueAudio()

        })

        $(document).ready(() => {
        $.ajax({
            type : 'GET',
            url: '{{ url("monitor/layar") }}',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: (data) => {
                console.log(data)
                $('#skck').html(data.skck.no_antrean)
                $('#sktlk').html(data.sktlk.no_antrian)
                $('#lp').html(data.lp.no_antrian)
                $('#ijin').html(data.ijin.no_antrian)

            }
        })
 })


function playQueueAudio(){
  var audioPlayer = document.getElementById('audioPlayer')
  console.log(queue)
  console.log(playing)
  audioPlayer.onended = () => {
      console.log('ended')
  	if (queue.length > 0){
      var src = queue[0]
      audioPlayer.src = src
      queue.shift()
      audioPlayer.play()
    } else {
    	playing = false
    }
  }

  if (!playing){
        playing = true
        audioPlayer.src = queue[0]
        queue.shift()
        audioPlayer.play()
    }
}


</script>







</body>

</html>
