@extends('layouts.admin')
@section('content')
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Trip Costs</h2>
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
    <!-- end: page -->
@endsection