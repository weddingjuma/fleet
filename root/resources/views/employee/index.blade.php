@extends('layouts.admin')

@section('title','Employees')

@section('content')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Employees</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a>
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Employees</span></li>
                </ol>
                <a class="sidebar-right-toggle" ><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>

            <div class="row">
                <div class="col-xs-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                            </div>
                            <h2 class="panel-title">List of Employees</h2>
                        </header>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <a href="{{ action('EmployeeController@create') }}" role="button" class="btn btn-success">Add Employee</a><br />
                                <table class="table table-bordered table-striped table-condensed mb-none">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Father's Name</th>
                                        <th>Mother's Name</th>
                                        <th>Present Address</th>
                                        <th>Permanent Address</th>
                                        <th>National ID No</th>
                                        <th>Designation</th>
                                        <th>Contact No</th>
                                        <th>Joining Date</th>
                                        <th>Appointment Person</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->f_name or ''}}</td>
                                            <td>{{$employee->m_name or ''}}</td>
                                            <td>{{$employee->pre_address or ''}}</td>
                                            <td>{{$employee->perm_address or ''}}</td>
                                            <td>{{$employee->nid or ''}}</td>
                                            <td>{{ $employee->designation->name  or ''}}</td>
                                            <td>{{$employee->mobile or ''}}</td>
                                            <td>{{$employee->join_date or ''}}</td>
                                            <td>{{$employee->app_person or ''}}</td>
                                            <td>
                                                <img src='{{asset("images/employees/") }}/{{ $employee->image != null ? $employee->image : 'dummy.jpg' }}' height="75" >
                                            </td>
                                            <td>
                                                {{ Form::open(['action'=>['EmployeeController@destroy',$employee->id],'method'=>'delete', 'onsubmit'=>'return confirmDelete()']) }}
                                                <a href="{{ action('EmployeeController@edit',$employee->id) }}" role="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                {{ Form::submit('X',['class'=>'btn btn-danger']) }}
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                         </div>
                </section>
            </div>
        </div>
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