@extends('layouts.app')

@section('title', 'Students')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Students</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                @include('includes.message-block')
                <div class="row">
                    <div class="col-lg-12">
                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<a href="" class="btn btn-primary btn-sm pull-right add-btn"><i class="fa fa-plus"></i> Add New</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Students
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Registration Number</th>
                                        <th>Email</th>
                                        {{--<th>Course</th>--}}
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>



                                    @foreach($students as $student)
                                        <tr class="odd gradeX">
                                            <td class="center"> {{ $student->name }}</td>
                                            <td class="center">{{ $student->id_number }}</td>
                                            <td class="center">{{ $student->email }}</td>
                                            {{--<td class="center">{{ $student->name }}</td>--}}
                                            <td class="center">
                                                <a href="{{ route('student', $student->id) }}"><button type="button" class="btn btn-primary col-xs-12">View</button></a>
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
    </div>

@endsection
@section('scripts')
@endsection
