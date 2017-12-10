@extends('layouts.app')

@section('title', 'Gates')

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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                @can('delete-staff')
                                <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm pull-right add-btn"><i class="fa fa-plus"></i> Add New</a>
                                @endcan
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


@endsection