@extends('layouts.admin')
@section('content')
		<section class="body">
			<!-- start: header -->

			<!-- end: header -->

			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>User Profile</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a>
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Pages</span></li>
								<li><span>User Profile</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<div class="row">
						<div class="col-md-4 col-lg-3">

							<section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
										<img src="assets/images/!logged-user.jpg" class="rounded img-responsive" alt="John Doe">
										<div class="thumb-info-title">
											<span class="thumb-info-inner">John Doe</span>
											<span class="thumb-info-type">CEO</span>
										</div>
									</div>

									<div class="widget-toggle-expand mb-md">
										<div class="widget-header">
											<h6>Vehicle Profile</h6>
											<div class="widget-toggle">+</div>
										</div>
										<div class="widget-content-collapsed">

										</div>
										<div class="widget-content-expanded">
											<ul class="simple-todo-list">
												<li class="completed">Update Profile Picture</li>
												<li class="completed">Change Personal Information</li>
												<li class="complete>Update Social Media</li>
												<li class="complete>Follow Someone</li>
											</ul>
										</div>
									</div>
								</div>
							</section>
						</div>
						<div class="col-md-8 col-lg-6">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Overview</a>
									</li>
									<li>
										<a href="#edit" data-toggle="tab">Statements</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-condensed mb-none">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Program No</th>
                                                    <th>Total Income</th>
                                                    <th>Total Expense</th>
                                                    <th>Nit Profit/Loss</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($programs as $program)
                                                    <tr>
                                                        <td>{{$program->vehicle_id}}</td>
                                                        <td>{{$program->serial}}</td>
                                                        <td>{{$program->rent}}</td>
                                                        <td>{{$totalCost =
                                                        $program->tripCost->driver_salary+
                                                        $program->tripCost->helper_salary+
                                                        $program->tripCost->fuel_cost+
                                                        $program->tripCost->driver_allow+
                                                        $program->tripCost->helper_allow+
                                                        $program->tripCost->labour+
                                                        $program->tripCost->toll+
                                                        $program->tripCost->bridge+
                                                        $program->tripCost->scale+
                                                        $program->tripCost->wheel+
                                                        $program->tripCost->donation+
                                                        $program->tripCost->container+
                                                        $program->tripCost->port_gate+
                                                        $program->tripCost->driver_cost+
                                                        $program->tripCost->other}}</td>
                                                        <td>{{$program->rent-$totalCost}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
									</div>
									<div id="edit" class="tab-pane">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-condensed mb-none">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Program No</th>
                                                    <th>Total Income</th>
                                                    <th>Total Expense</th>
                                                    <th>Nit Profit/Loss</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($programs as $program)
                                                <tr>
                                                    <td>1</td>
                                                    <td>1325</td>
                                                    <td>$1.38</td>
                                                    <td>0.01</td>
                                                    <td>0.36%</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-3">

							<h4 class="mb-md">Stats</h4>
							<ul class="simple-card-list mb-xlg">
								<li class="primary">
									<h3>Income</h3>
									<h4>12233445 Taka</h4>
								</li>
                                <li class="primary">
                                    <h3>Expense</h3>
                                    <h4>12233445 Taka</h4>
                                </li>
                                <li class="primary">
                                    <h3>Total Profit</h3>
                                    <h4>12233445 Taka</h4>
                                </li>

							</ul>

						</div>

					</div>
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>

						<div class="sidebar-right-wrapper">

							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>

								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</aside>
		</section>

@stop