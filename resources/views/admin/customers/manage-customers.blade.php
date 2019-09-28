@extends('admin-layout.content')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Customers Table</h4>
				<h6 class="card-subtitle">Manage Customers</h6>
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
									<div class="btn-group">
										<button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										...
										</button>
										<div class="dropdown-menu">
										<a class="dropdown-item" href="javascript:void(0)">Block</a>
										
										<a class="dropdown-item" href="{{url('admin/customer-detail')}}">View Detail</a>


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

