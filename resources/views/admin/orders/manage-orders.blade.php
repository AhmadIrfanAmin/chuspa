@extends('admin-layout.content')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Orders Table</h4>
				<h6 class="card-subtitle">Manage Orders</h6>
				<h6 class="card-subtitle"></h6>
				

				<div class="table-responsive m-t-40">

					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Order No</th>
								<th>Customer Name</th>
								<th>Driver Name</th>
								<th>Pickup</th>
								<th>Dropoff</th>
								<th>Trip Distance</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>61</td>
								<td><span class="badge badge-success">Delivered</span></td>
								<td>
									<div class="button-group">
										<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn waves-effect waves-light btn-sm btn-info"><i class="fas fa-eye" data-toggle="modal" data-target="#myModal"></i></a>
										<a href="" class="btn waves-effect waves-light btn-sm btn-success"><i class="fas fa-map-marker-alt"></i> </a>
										

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

