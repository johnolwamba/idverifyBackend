@extends('layouts.app')

@section('title', 'View Staff')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View Staff</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                @include('includes.message-block')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                @can('delete-student')
                                <form class="form" action="{{ route('staff.delete',$staff->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm pull-right add-btn"><i class="fa fa-remove"></i> Delete</button>
                                </form>
                                @endcan
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Staff Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form class="form" action="{{ route('staff.update',$staff->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Name:</label>
                                                <input required class="form-control" type="text" name="name" placeholder="Staff Name" value="{{ $staff->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Email:</label>
                                                <input class="form-control" required type="email" name="email" placeholder="Email" value="{{ $staff->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>ID Number:</label>
                                                <input class="form-control" required type="number" name="id_number" placeholder="ID Number" value="{{ $staff->id_number }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Station:</label>
                                                <select class="form-control" id="station" name="station">
                                                    @foreach($gates as $gate)
                                                        @if(($gate->id == $staff->staff->gate->id))
                                                            <option value="{{ $gate->id }}" selected="selected">{{ $gate->name }}</option>
                                                        @else
                                                            <option value="{{ $gate->id }}">{{ $gate->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @can('update-user')
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-right" >Save changes</button>
                                    </div>
                                     @endcan
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
        <!-- /#wrapper -->


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Add Staff</h4>
                    </div>
                    @include('layouts.messages')
                    <form class="form" action="{{ route('staff.create') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="name" placeholder="Staff Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="3" type="text" name="description" placeholder="Staff Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

</div>

 @endsection
@section('scripts')
    <script>
        $('select').chosen();
    </script>
@endsection
