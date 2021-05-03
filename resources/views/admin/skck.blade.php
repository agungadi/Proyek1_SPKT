
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
        <title>Admin Call</title>
        <link href="{{asset('admin/css/jumbotron-narrow.css')}}" rel="stylesheet">
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>


<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
<link rel="stylesheet" href="{{asset('admin/assets/scss/style.css')}}">


<script src="http://localhost:3002/socket.io/socket.io.js"></script>



    </head>
  	<body>
    <div class="container">
        <button onclick="recallskck();" class="btn btn-small btn-primary"  style="float:right;padding-top:10px;padding-bottom:10px;">
            Ulangi Panggilan &nbsp;<span class="glyphicon glyphicon-volume-up"></span>
        </button>

        <div class="jumbotron" >
        <h1 id="skck" style="text-align: center;">0</h1>

        <p onclick="nextskck();" style="text-align: center;">
            <button class="btn btn-small btn-success" type="button"  >

            Next

        </button>



        </p>

     </div>


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">

                    @if($message =  Session::get('success'))
                    <div class='alert alert-success'>

                    {{ $message }}

                    </div>
                    @endif
                    {{-- <form> --}}
                        {{-- <label><b>Enter a Message</b></label>
                        <input type="text" name="message" id="user_input">
                      </form>
                      <input type="submit" onclick="showInput();"><br/>
                      <label>Your input: </label>
                      <p><span id='display'></span></p> --}}

                        <div class="card-header">
                            <strong class="card-title">Daftar Antrian</strong>
                            {{-- <a href="{{ url('/back/permission/create') }}" class="btn btn-primary pull-right">Create</a> --}}
                        </div>


                        <div class="card-body">




                   <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No Antrian</th>
                        <th>Keperluan</th>
                       <th>Created At</th>
                      </tr>
                      <tbody>

                    @foreach ($antrian as $i=>$row)
                        <tr>
                            <td>{{ $row->no_antrean }}</td>
                            <td>{{ $row->keperluan }}</td>
                            <td>{{ $row->created_at }}</td>

                        </tr>
                    @endforeach
                      </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->




        <!--search-->
        <script src="{{asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/assets//js/plugins.js')}}"></script>
        <script src="{{asset('admin/assets/js/main.js')}}"></script>

        <!--search-->
        <script src="{{asset('admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
        <script src="{{asset('admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/lib/data-table/datatables-init.js')}}"></script>



@include('admin.layout.ajax')
        <script>

                $.ajax({
                    type : 'GET',
                    url: '{{ url("monitor/layar") }}',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: (data) => {
                        console.log(data)
                        $('#skck').html(data.skck.no_antrian)

                    }
                })
        </script>

    </body>

</html>
