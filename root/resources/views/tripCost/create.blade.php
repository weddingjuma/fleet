@extends('layouts.admin')
@section('content')
        <section role="main" class="content-body">
            <!-- start: page -->
            <div class="row">
                <div class="col-xs-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                            </div>
                            <h2 class="panel-title">Trip Cost Information Form</h2>
                        </header>

                        <div class="panel-body">
                            {{ Form::open(['action' => 'TripCostController@store','method'=>'post','class'=>'form-horizontal']) }}
                            @include('tripCost.form',['submitButtonText'=>'Save'])

                            {{ Form::close() }}
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
    <!-- end: page -->
@endsection