<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin::Home</title>

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
                <h3 class="page-header">Dashboard</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user-times fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php $a = 0; ?>
                                    @foreach($blocked_users as $blocked_user)
                                            @if ($blocked_user->student->user->status == '0')
                                                <?php $a++; ?>
                                            @endif
                                    @endforeach

                                    {{$a}}
                                   </div>
                                <div>Block Cases!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-pie-chart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ count($user_traffic) }}</div>
                                <div>User Passages!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ count($students) }}</div>
                                <div>Students!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user-secret fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ count($staff) }}</div>
                                <div>Guards!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                @include('includes.message-block')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Blocked Users
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Blocked By</th>
                                        <th>Blocked Date</th>
                                        <th>Reason</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blocked_users as $blocked_user)
                                        @if($blocked_user->student->user->status == '0')
                                    <tr class="odd gradeX">
                                        <td class="center">{{ $blocked_user->student->user->name }}</td>
                                        <td class="center">{{ $blocked_user->staff->user->name }}</td>
                                        <td class="center">{{ $blocked_user->created_at }}</td>
                                        <td class="center">{{ $blocked_user->description }}</td>
                                        <td class="center">
                                            <button class="btn btn-primary btn-sm btn-block">View</button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
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
<!-- /#wrapper -->
    </div>

    </div>

<!-- jQuery -->
<script src="{{  asset('vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{  asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{  asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{  asset('vendor/raphael/raphael.min.js') }}"></script>
<script src="{{  asset('vendor/morrisjs/morris.min.js') }}"></script>
<script src="data/morris-data.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js') }}"></script>
<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</body>

</html>
