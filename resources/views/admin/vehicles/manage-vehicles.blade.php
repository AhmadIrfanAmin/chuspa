@extends('admin-layout.content')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Vehicle Table</h4>
		<h6 class="card-subtitle">Manage Vehicles</h6>
		<h6 class="card-subtitle"></h6>
		<button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-vehcile"><i class="fa fa-plus-circle"></i> Add New Vehicle</button>
	
					<div class="table-responsive m-t-40">

						<table id="myTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Image</th>
									<th>Price</th>
									<th>Created Date</th>

								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Tiger Nixon</td>
									<td>System Architect</td>
									<td>Edinburgh</td>
									<td>61</td>

								</tr>
								<tr>
									<td>Garrett Winters</td>
									<td>Accountant</td>
									<td>Tokyo</td>
									<td>63</td>

								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			@endsection

