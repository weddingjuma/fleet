@extends('layouts.admin')

@section('title','Program List')

@section('style')
<style>
    .eye{
        height: 33px;
    }

</style>
@stop

@section('content')
    <section role="main" class="content-body">

        <header class="page-header">
            <h2>Programs</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a>
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Programs</span></li>
                </ol>
                <a class="sidebar-right-toggle" ><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                </div>

                <h2 class="panel-title">Program Information</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <a href="{{ action('ProgramController@create') }}" role="button" class="btn btn-success">Add Program</a><br /><br />
                    <table class="table table-bordered table-striped table-condensed mb-none">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Serial Number</th>
                            <th>Party Name</th>
                            <th>SR Name</th>
                            <th>Advance Rent</th>
                            <th>Due Rent</th>
                            <th>Total Rent</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $program->date->format('Y-m-d') }}</td>
                                <td>{{ $program->serial }}</td>
                                <td>{{ $program->party->name or '' }}</td>
                                <td>{{ $program->employee->name or '' }}</td>
                                <td class="text-right">{{ number_format($program->adv_rent,2) }}/-</td>
                                <td class="text-right">{{ number_format($program->due_rent,2) }}/-</td>
                                <td class="text-right">{{ number_format($program->rent,2) }}/-</td>
                                <td>
                                    {{ Form::open(['action'=>['ProgramController@destroy',$program->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                    <a href="{{ action('ProgramController@edit',$program->id) }}" role="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    {{ Form::submit('X',['class'=>'btn btn-danger']) }}
                                    {{--<a href="{{ action('ProgramController@edit',$program->id) }}" role="button" class="btn btn-success"><i class="fa fa-power-off" id="tripCancel"></i></a>--}}

                                    {{--Bootstrap modal start--}}
                                    {{ Form::button('', ['class' => 'btn btn-primary fa fa-eye eye', 'data-toggle'=>'modal', 'data-target'=>'#exampleModal','id'=>'showTrip'.$program->id,'onclick'=>'showTrip('.$program->id.')']) }}
                                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            @include('program.showTrip')
                                        </div>
                                    </div>
                                    {{ Form::close() }}

                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-right"><b>Total</b></td>
                            <td class="text-right"><b>{{ number_format($paid)}}/-</b></td>
                            <td class="text-right"><b>{{number_format($due)}}/-</b></td>
                            <td class="text-right"><b>{{number_format($total)}}/-</b></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
@stop

@push('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this record?');
            return !!x;
        }
    </script>
    <script>
        function showTrip(id){
            var csrf = '{{csrf_token()}}';
            $.ajax({
                url: "showTrips",
                data: {id:id, _token:csrf},
                type : "get"
            }).done(function(e){
                $('.modal-dialog').html(e).hide().fadeIn(500);
            })
        }
    </script>
@endpush