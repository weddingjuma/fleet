@extends('layouts.admin')

@section('title','Edit Product')

@section('content')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Edit Product</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a>
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Edit Product</span></li>
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
                        <h2 class="panel-title">Product Information Form</h2>
                    </header>

                    <div class="panel-body">
                        {{ Form::model($product,['action'=>['ProductController@update',$product->id],'method'=>'patch','class'=>'form-horizontal'])}}
                        @include('product.form',['submitButtonText'=>'Update'])
                        {{ Form::close() }}
                    </div>
                </section>
            </div>
        </div>
    </section>
    </div>
    <!-- end: page -->
@endsection