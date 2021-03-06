@extends('layouts.admin')

@section('title','Trip List')

@section('content')
    <section role="main" class="content-body">

        <header class="page-header no-print">
            <h2>Daily Program Rotation Report</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a>
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Dashboard</span></li>
                </ol>
                <a class="sidebar-right-toggle" ><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- Search Panel -->
        {{--<div class="panel panel-body no-print">--}}
            {{--{!! Form::open(['action'=>'ProgramController@dailyReport','method'=>'get','class'=>'form-inline']) !!}--}}
            {{--<div class="form-group {{$errors->has('date')?'has-error':''}}">--}}
                {{--<label class="control-label">Program Date: </label>--}}
                {{--<div class="input-group">--}}
                {{--<span class="input-group-addon">--}}
                    {{--<i class="fa fa-calendar"></i>--}}
                {{--</span>--}}
                    {{--{{ Form::text('date', null, array('class' => 'form-control','data-plugin-datepicker data-date-format="yyyy-mm-dd"','placeholder'=>'YYYY-MM-DD' )) }}--}}
                {{--</div>--}}
                {{--@if($errors->has('date'))--}}
                    {{--<span class="help-block"><strong>{{$errors->first('date')}}</strong></span>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--{!! Form::submit('GO',['class'=>'btn btn-success']) !!}--}}
            {{--<a href="javascript:window.print()" class="btn btn-success" role="button"><i class="fa fa-print"></i></a>--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}
        <!-- /Search Panel -->

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="javascript:window.print()"><i class="fa fa-print"></i></a>
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                </div>
                <h2 class="panel-title">Program Trip Report</h2>
            </header>
            <div class="panel-body">
                <div><h4 class="text-right">Date : {{$date->format('d-M-Y')}}</h4></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed mb-none">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Vehicle</th>
                            <th>Driver</th>
                            <th>Driver Advance</th>
                            <th>Driver Advance (Fixed)</th>
                            <th>Extra Advance</th>
                            <th>Loading Point</th>
                            <th>Unloading Point</th>
                            <th>Product Details</th>
                            <th>Empty Container</th>
                            <th>Comments</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trips as $trip)
                            <tr>
                                <td>{{ $trip->id or '' }}</td>
                                <td>{{ $trip->vehicle->vehicleNo or '' }}</td>
                                <td>{{ $trip->driver->name or '' }}</td>
                                <td>{{ $trip->driver_adv or '' }}</td>
                                <td>{{ $trip->d_a_fix or '' }}</td>
                                <td>{{ $trip->extra_adv or '' }}</td>
                                <td>{{ $trip->loading or '' }}</td>
                                <td>{{ $trip->unloading or '' }}</td>
                                <td>{{ $trip->product or '' }}</td>
                                <td>{{ $trip->emp_container or '' }}</td>
                                <td>{{ $trip->trip_cancel or '' }}</td>
                                {{--<td>Total Trip</td>--}}
                                {{--<td class="text-center">{{ $program->weight or '-' }}</td>--}}
                                {{--<td class="text-center">{{ $program->rate or '-' }}</td>--}}
                                {{--<td class="text-right">{{ number_format($program->rent) }}/-</td>--}}
                                {{--<td class="text-right">Old Collection</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><br>
            </div>
        </section>
    </section>
@endsection

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this record?');
            return !!x;
        }
    </script>
@stop