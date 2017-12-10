@extends('layouts.app')

@section('title', 'Gate')

@section('content')
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
                @include('includes.message-block')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form" action="{{ route('gate.delete',$gate->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm pull-right add-btn"><i class="fa fa-remove"></i> Delete</button>
                                </form>

                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Gate Details
                            </div>
                        <!-- /.panel-heading -->
                            <div class="panel-body">

                                @include('layouts.messages')
                                <form class="form" action="{{ route('gate.update',$gate->id) }}" method="POST">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" name="name" placeholder="Gate Name" value="{{ $gate->name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" rows="3" type="text" name="description" placeholder="Gate Description">{{ $gate->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-right" >Save changes</button>
                                    </div>
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
    </div>

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
                            <button type="submit" class="btn btn-primary" >Save changes</button>
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


@endsection