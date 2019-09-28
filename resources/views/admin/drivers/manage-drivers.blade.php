@extends('admin-layout.content')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Drivers Table</h4>
				<h6 class="card-subtitle">Manage Drivers</h6>
				<h6 class="card-subtitle"></h6>

				<div class="table-responsive m-t-40">

					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Image</th>
								<th>Email</th>
								<th>Contact</th>
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
								
								<td>
									<div class="button-group">
										<button type="button" class="btn waves-effect waves-light btn-danger btn-sm"><i class="fas fa-ban"></i></button>
										<a href="{{url('admin/driver-detail')}}" class="btn waves-effect waves-light btn-sm btn-info"><i class="fas fa-eye"></i></a>


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

