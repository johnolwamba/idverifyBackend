<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin::Gates</title>

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
                <h3 class="page-header">Gates</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm pull-right add-btn"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               All Gates
                            </div>
                        @include('layouts.messages')
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($gates as $gate)
                                    <tr class="odd gradeX">
                                        <td class="center">{{ $gate->name }}</td>
                                        <td class="center">{{ $gate->description }}</td>
                                        <td class="center">
                                            <a href="{{ route('gate', $gate->id) }}"><button type="button" class="btn btn-primary btn-sm btn-block">View</button></a>
                                        </td>
                                    </tr>
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


                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Add Gate</h4>
                            </div>
                            @include('layouts.messages')
                            <form class="form" action="{{ route('gate.create') }}" method="POST">
                                {{ csrf_field() }}
                            <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="name" placeholder="Gate Name">
                                    </div>
                                </div>
                            </div>
                             <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="3" type="text" name="description" placeholder="Gate Description"></textarea>
                                        </div>
                                    </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" >Save</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->






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
