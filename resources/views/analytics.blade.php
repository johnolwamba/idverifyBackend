@extends('layouts.app')

@section('title', 'Analytics')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Analytics</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <form role="form" method="post" action="{{ route('analytics.process') }}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Report Type:</label>
                            <select name="report_type" id="report_type" class="report_type form-control" data-placeholder="Select Report...">
                                <option value=""></option>
                                <option>Scans</option>
                                <option>Blockages</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="end_time">From:</label>
                        <div class='input-group date' id='datetimepicker'>
                            <input type='text' class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="end_time">To:</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Search</label>
                        <button class="form-control btn btn-primary" type="submit"> <i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Analytics: Total -
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Served By</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($analytica as $analytics)--}}
                                {{--<tr class="odd gradeX">--}}
                                    {{--<td class="center">{{ $analytics->students->user->name }}</td>--}}
                                    {{--<td class="center">{{ $analytics->staff->user->name }}</td>--}}
                                    {{--<td class="center">{{ $analytics->staff->gate->name }}</td>--}}
                                    {{--<td class="center">{{ Carbon\Carbon::parse($analytics->created_at)->toDayDateTimeString() }}</td>--}}
                                {{--</tr>--}}
                        {{--@endforeach--}}
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

@endsection
@section('scripts')
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>

    $(document).ready(function () {
        $('select').chosen();

    $('#datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY',
             defaultDate: moment()
        }).on("dp.change", function (e) {
            var date = moment($('#date').val(),'DD-MM-YYYY');
            if(moment().startOf('day').diff(date.startOf('day'), 'days') === 0){
                $('#datetimepicker1').data("DateTimePicker").minDate(moment());
            }
            else{
                $('#datetimepicker1').data("DateTimePicker").minDate(false);
            }
        });

        $('#datetimepicker1').datetimepicker({
            format: 'DD-MM-YYYY',
            defaultDate: moment()

        });

        $('#date, #start_time,#end_time').click(function () {
            $(this).next().click();
        });


    });
</script>

@endsection
