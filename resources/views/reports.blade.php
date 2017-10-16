<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin::Reports</title>

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
                <h3 class="page-header">Reports</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Area Chart Example
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="morris-area-chart"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bar Chart Example
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="morris-bar-chart"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Line Chart Example
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="morris-line-chart"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Donut Chart Example
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="morris-donut-chart"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

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
<script src="{{  asset('data/morris-data.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{  asset('js/sb-admin-2.js"></script>
</body>

</html>
