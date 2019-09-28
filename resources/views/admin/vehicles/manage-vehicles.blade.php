@extends('admin-layout.content')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Vehicle Table</h4>
				<h6 class="card-subtitle">Manage Vehicles</h6>
				<h6 class="card-subtitle"></h6>
				<a href="{{url('admin/vehicle-type/add')}}" class="btn btn-info btn-rounded m-t-10 float-right" ><i class="fa fa-plus-circle"></i> Add New Vehicle</a>

				<div class="table-responsive m-t-40">

					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Image</th>
								<th>Price</th>
								<th>Created Date</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										...
										</button>
										<div class="dropdown-menu">
										<a class="dropdown-item" href="javascript:void(0)">Edit</a>
										<a class="dropdown-item" href="javascript:void(0)">Delete</a>

										</div>
									</div> 
								</td>

							</tr>
							<tr>
								<td>Garrett Winters</td>
								<td>Accountant</td>
								<td>Tokyo</td>
								<td>63</td>
								<td>  
									<div class="btn-group">
										<button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											...
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="javascript:void(0)">Edit</a>
											<a class="dropdown-item" href="javascript:void(0)">Delete</a>
											
										</div>
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
