@extends('layouts.app')

@section('title', 'Blocked Students')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Blocked Students</h3>
            </div>
            <!-- /.col-lg-12 -->
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
    </div>

@endsection
@section('scripts')


@endsection