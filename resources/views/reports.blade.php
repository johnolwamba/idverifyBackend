@extends('layouts.app')

@section('title', 'Reports')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Reports</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>


            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Traffic per Date
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div style="height: 400px;"  id="chart-div"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Gates Traffic
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div style="height: 400px;"  id="poll_div"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->

        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
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
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($blocked_users as $blocked_user)
                            @if($blocked_user->student->user->status == '0')
                                <tr class="odd gradeX">
                                    <td class="center">{{ $blocked_user->student->user->name }}</td>
                                    <td class="center">{{ $blocked_user->staff->user->name }}</td>
                                    <td class="center">{{ Carbon\Carbon::parse($blocked_user->created_at)->toDayDateTimeString() }}</td>
                                    <td class="center">{{ $blocked_user->description }}</td>
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

        <div class="row">
            {!! $lava->render('BarChart', 'Votes', 'poll_div') !!}
            {!! $lava->render('DonutChart', 'IMDB', 'chart-div') !!}
        </div>

    </div>
    <!-- /#page-wrapper -->

</div>

@endsection
@section('scripts')


@endsection
