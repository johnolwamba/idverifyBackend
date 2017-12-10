<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin::Blocking</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{  asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{  asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{  asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{  asset('vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{  asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js') }} IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js') }}/1.4.2/respond.min.js') }}"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    @include('includes/side-bar')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Blocking</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!--start-->
        @foreach($blockings as $blocking)
            @if($blocking->student->user_id == $id)
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12 pull-right">
                                <div class="col-md-8"></div>
                                <div class="col-md-2">
                                    @can('unblock-student')
                                    <form class="form" action="{{route('student.unblock',$blocking->student->user_id)}}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-success btn-sm pull-right add-btn"><i class="fa fa-arrow-right"></i> Unblock</button>
                                        </form>
                                        @endcan
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Blocking Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                @include('layouts.messages')
                                <form class="form" action="" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Name</label>
                                                <input readonly="" class="form-control" type="text" name="name" value="{{$blocking->student->user->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Blocked by:</label>
                                                <input readonly="" class="form-control" type="email" name="email"  value="{{$blocking->staff->user->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Reason:</label>
                                                <input readonly="" class="form-control" type="email" name="email"  value="{{$blocking->description}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Gate:</label>
                                                <input readonly="" class="form-control" type="email" name="email"  value="{{$blocking->staff->gate->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>When:</label>
                                                <input readonly="" class="form-control" type="email" name="email" value="{{ Carbon\Carbon::parse($blocking->created_at)->toDayDateTimeString() }}">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
        </div>
            @endif
        @endforeach
        <!--end-->

    </div>

</div>

<!-- /#wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{  asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{  asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{  asset('vendor/raphael/raphael.min.js') }}"></script>
<script src="{{  asset('vendor/morrisjs/morris.min.js') }}"></script>
<script src="{{  asset('data/morris-data.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{  asset('js/sb-admin-2.js') }}"></script>
<!-- DataTables JavaScript -->
<script src="{{  asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{  asset('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{  asset('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.jquery.min.js"></script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
//                $('select').chosen();
    });
</script>
</body>

</html>
