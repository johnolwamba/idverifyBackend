@extends('layouts.app')

@section('title', 'Student')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Student</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12 pull-right">
                                <div class="col-md-6"></div>
                                <div class="col-md-2">
                                    @can('unblock-student')
                                    @if($student->status == '0')
                                            <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm pull-right add-btn"><i class="fa fa-plus"></i> Unblock</a>
                                    @endif
                                    @endcan
                                </div>
                                <div class="col-md-1">
                                    @can('delete-student')
                                    <form class="form" action="{{ route('student.delete',$student->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm pull-right add-btn"><i class="fa fa-remove"></i> Delete</button>
                                    </form>
                                     @endcan
                                </div>

                                <div class="col-md-2">
                                    @can('delete-student')
                                        <form class="form" action="{{ route('student.generatetoken',$student->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-info btn-sm pull-right add-btn"><i class="fa fa-refresh"></i> Generate Token</button>
                                        </form>
                                    @endcan
                                </div>


                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Student Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                @include('layouts.messages')
                                <form class="form" action="{{ route('student.update',$student->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Name</label>
                                                <input class="form-control" type="text" name="name" value="{{ $student->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email"  value="{{ $student->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Course</label>
                                                    <select class="form-control" name="course">
                                                        @foreach($courses as $course)
                                                            @if($course->id == $student->student->course_id)
                                                                <option value="{{ $course->id }}" selected="selected">{{ $course->name }}</option>
                                                            @else
                                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">
                                             <label>QR-Code</label>
                                            </div>
                                            <div class="col-md-2"> <button class="btn btn-primary" onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Print</button></div>
                                        </div>

                                        <div class="col-lg-6" id="printableArea">
                                            {!!QrCode::size(300)->generate($student->student->qr_code)!!}
                                        </div>

                                    </div>
                                    {{--<div class="form-group">--}}
                                        {{--<button type="submit" class="btn btn-primary pull-right" >Save changes</button>--}}
                                    {{--</div>--}}
                                </form>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Student Blocking History
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Blocked By</th>
                                    <th>Reason</th>
                                    <th>Unblocked By</th>
                                    <th>Recommendation</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($student_blockings as $student_blocking)
                                    <tr class="odd gradeX">
                                        <td class="center">{{ $student_blocking->created_at }}</td>
                                        <td class="center">{{ $student_blocking->staff->user->name }}</td>
                                        <td class="center">{{ $student_blocking->description }}</td>
                                        <td class="center">{{ App\User::find($student_blocking->unblocker_id)->name }}</td>
                                        <td class="center">{{ $student_blocking->recommendation }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->


                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>

    </div>

</div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Unblock User</h4>
                </div>
                <form class="form" action="{{ route('student.unblock',['id'=>$student->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="3" type="text" name="recommendation" placeholder="Recommendation"></textarea>
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


@endsection
@section('scripts')
    <script>
        $('select').chosen();

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
