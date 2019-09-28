@extends('admin-layout.content')

@section('content')
<div class="card-group">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex no-block align-items-center">
						<div>
							<h3><i class="icon-screen-desktop"></i></h3>
							<p class="text-muted">MYNEW CLIENTS</p>
						</div>
						<div class="ml-auto">
							<h2 class="counter text-primary">23</h2>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="progress">
						<div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Column -->
	<!-- Column -->
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex no-block align-items-center">
						<div>
							<h3><i class="icon-note"></i></h3>
							<p class="text-muted">NEW PROJECTS</p>
						</div>
						<div class="ml-auto">
							<h2 class="counter text-cyan">169</h2>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="progress">
						<div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Column -->
	<!-- Column -->
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex no-block align-items-center">
						<div>
							<h3><i class="icon-doc"></i></h3>
							<p class="text-muted">NEW INVOICES</p>
						</div>
						<div class="ml-auto">
							<h2 class="counter text-purple">157</h2>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="progress">
						<div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Column -->
	<!-- Column -->
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex no-block align-items-center">
						<div>
							<h3><i class="icon-bag"></i></h3>
							<p class="text-muted">All PROJECTS</p>
						</div>
						<div class="ml-auto">
							<h2 class="counter text-success">431</h2>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="progress">
						<div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Customer Requests</h4>

				<h6 class="card-subtitle"></h6>

				<div class="table-responsive m-t-40">

					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Order No</th>
								<th>Customer Name</th>

								<th>Pickup</th>
								<th>Dropoff</th>
								<th>Trip Distance</th>
								<th>Status</th>
								<th>Assign Order</th>
								<th>Action</th>


							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>61</td>
								<td><span class="badge badge-success">Delivered</span></td>
								<td><a href="javascript:void(0)" data-toggle="modal" data-target="#drivers" class="btn waves-effect waves-light btn-sm btn-info">Drivers</a></td>
								<td>
									<div class="button-group">
										<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn waves-effect waves-light btn-sm btn-info"><i class="fas fa-eye"></i></a>
										<a href="javascript:void(0)" data-toggle="modal" data-target="#drivers" class="btn waves-effect waves-light btn-sm btn-success"><i class="fas fa-check"></i></a>

										
										

									</div> 
									<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">Order Detail</h4>

													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

												</div>
												<div class="modal-body p-0">
													<div class="table-responsive">
														<table class="table">
															<tbody>
																<tr>
																	<th>Unload Time</th>
																	<td>1</td>
																	
																</tr>
																<tr>
																	<th>Total Estimation</th>
																	<td>John</td>

																</tr>
																<tr>
																	<th>Payment Modet</th>
																	<td>Carter</td>
																	
																</tr>
																<tr>
																	<th>Tip</th>
																	<td>johncarter@mail.com</td>
																</tr>
																<tr>
																	<th>City</th>
																	<td>John</td>
																	
																</tr>
																<tr>
																	<th>State</th>
																	<td>Carter</td>
																</tr>
																<tr>
																	<th>Country</th>
																	<td>johncarter@mail.com</td>
																	
																</tr>
																<tr>
																	<th>Time</th>
																	<td>johncarter@mail.com</td>
																	
																</tr>
															</tbody>
														</table>
													</div>



												</div>
												<div class="modal-footer">
													
													<button type="button" class="btn waves-effect waves-light btn-primary" data-dismiss="modal">Close</button>
												</div>
											</div>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>

									<div id="drivers" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">All Drivers</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												</div>
												<div class="modal-body">
													<from class="form-horizontal">

														<div class="form-group">
															<label class="col-md-12">Drivers</label>
															<div class="col-md-12">
																<select class="form-control">
																	<option>Select</option>
																	<option>Driver 6</option>
																	<option>Driver 3</option>
																	<option>Driver 4</option>
																</select>
															</div>
														</div>
													</from>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Assigned</button>
													<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
												</div>
											</div>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
								</td>

							</tr>


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection