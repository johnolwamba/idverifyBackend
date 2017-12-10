@extends('layouts.app')

@section('title', 'Home')

@section('content')
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
                                        <td class="center">{{ Carbon\Carbon::parse($blocked_user->created_at)->toDayDateTimeString() }}</td>
                                        <td class="center">{{ $blocked_user->description }}</td>
                                        <td class="center">
                                            <a href="{{ route('blocking', $blocked_user->student->user->id) }}" class="btn btn-primary btn-sm btn-block">View</a>
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
@endsection
@section('scripts')


 @endsection