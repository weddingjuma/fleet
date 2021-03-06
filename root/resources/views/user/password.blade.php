@extends('layouts.admin')

@section('title','Change Password')

@section('content')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Users</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a>
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Users</span></li>
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
                        <h2 class="panel-title">Change Password</h2>
                    </header>

                    <div class="panel-body">
                        {{ Form::open(['action' => 'UserController@newPassword','method'=>'patch','class'=>'form-horizontal']) }}
                        <div class="form-group {{$errors->has('email')?'has-error':''}}">
                            <label class="col-md-3 control-label">Email:</label>
                            <div class="col-md-6">
                                {{ Form::text('email',null,['class' => 'form-control','placeholder'=>'user@domain.com','required']) }}
                                @if($errors->has('email'))
                                    <span class="help-block"><strong>{{$errors->first('email')}}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('current_password')?'has-error':''}}">
                            <label class="col-md-3 control-label">Old Password:</label>
                            <div class="col-md-6">
                                {{ Form::password('current_password',['class' => 'form-control','placeholder'=>'Current Password','required']) }}
                                @if($errors->has('current_password'))
                                    <span class="help-block"><strong>{{$errors->first('current_password')}}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('password')?'has-error':''}}">
                            <label class="col-md-3 control-label">New Password:</label>
                            <div class="col-md-6">
                                {{ Form::password('password',['class' => 'form-control','placeholder'=>'Password','required']) }}
                                @if($errors->has('password'))
                                    <span class="help-block"><strong>{{$errors->first('password')}}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('password_confirmation')?'has-error':''}}">
                            <label class="col-md-3 control-label">Confirm New Password:</label>
                            <div class="col-md-6">
                                {{ Form::password('password_confirmation',['class' => 'form-control','placeholder'=>'Confirm Password','required']) }}
                                @if($errors->has('password_confirmation'))
                                    <span class="help-block"><strong>{{$errors->first('password_confirmation')}}</strong></span>
                                @endif
                            </div>
                        </div>
                        <!--Submit button -->
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-3">
                                {{ Form::submit('ADD',['class'=>'form-control btn btn-success']) }}
                            </div>
                            <div class="col-md-2">
                                {{ Form::reset('Reset',['class'=>'form-control btn btn-warning']) }}
                            </div>
                            <div class="col-md-2">
                                <a href="{{ URL::previous() }}" role="button" class="form-control btn btn-danger">Back</a>
                            </div>
                        </div>
                        <!-- ends-->
                        {{ Form::close() }}
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- end: page -->

@stop
