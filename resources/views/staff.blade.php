@extends('layouts.app')

@section('title', 'Staff')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Staff</h3>
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
                                All Guards
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Staff Number</th>
                                        <th>Email</th>
                                        <th>Station</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($staff as $allstaff)
                                    <tr class="odd gradeX">
                                        <td class="center">{{ $allstaff->name }}</td>
                                        <td class="center">{{ $allstaff->id_number }}</td>
                                        <td class="center">{{ $allstaff->email }}</td>
                                        <td class="center">{{ $allstaff->staff->gate->name }}</td>
                                        <td class="center">
                                            <a href="{{ route('viewstaff', $allstaff->id) }}"><button type="button" class="btn btn-primary btn-sm btn-block">View</button></a>
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


@endsection
@section('scripts')
@endsection
