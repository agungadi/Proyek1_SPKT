
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
        <title>Client : Queue</title>
        <link href="{{asset('admin/css/jumbotron-narrow.css')}}" rel="stylesheet">
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>


<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
<link rel="stylesheet" href="{{asset('admin/assets/scss/style.css')}}">




    </head>
    <body>
<div class="row loket">
    <div class="col-md-5">
            <div class="col-md-6">
                <div class="1 jumbotrontable" style="padding-top:20px;padding-bottom:20px;"><h1 id="skck"> 0 </h1><button onclick="nextskck()" class="btn btn-danger" type="button">
                <span class="glyphicon glyphicon-credit-card" >&nbsp;</span>SKCK</button></div></div>
            <div class="col-md-6">
                    <div class="2 jumbotrontable" style="padding-top:20px;padding-bottom:20px;"><h1 id="sktl"> 2 </h1><button class="btn btn-danger" type="button">
                <span class="glyphicon glyphicon-credit-card">&nbsp;</span>SKTLK</button></div></div>
            <div class="col-md-6">

                    <div class="4 jumbotrontable" style="padding-top:20px;padding-bottom:20px;"><h1> 4 </h1><button class="btn btn-danger" type="button">
                <span class="glyphicon glyphicon-credit-card">&nbsp;</span>LP</button></div></div>
            <div class="col-md-6">
                    <div class="5 jumbotrontable" style="padding-top:20px;padding-bottom:20px;"><h1> 5 </h1><button class="btn btn-danger" type="button">
                <span class="glyphicon glyphicon-credit-card">&nbsp;</span>Surat Ijin Keramaian</button></div></div>
            <div class="col-md-6">

    <div class="col-md-7">
     <h1> video </h1>
    </div>
</div>

<script>
    $(document).ready(() => {
        $.ajax({
            type : 'GET',
            url: '{{ url("monitor/layar") }}',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: (data) => {
                console.log(data)
                $('#skck').html(data.no_antrian)
                $('#sktl').html(data.sktl)
                $('#lp').html(data.lp)

            }
        })
    })
</script>

@include('admin.layout.ajax')

    </body>
</html>

