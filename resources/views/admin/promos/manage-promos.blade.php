@extends('admin-layout.content')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Promos & Discounts Table</h4>
				<h6 class="card-subtitle">Manage Promos & Discounts</h6>
				<h6 class="card-subtitle"></h6>
				<a href="{{url('admin/promo/add')}}" class="btn btn-info btn-rounded m-t-10 float-right" ><i class="fa fa-plus-circle"></i> Add New Promo/Discount</a>

				<div class="table-responsive m-t-40">

					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Code</th>
								<th>Customer Type</th>
								<th>Discount Percentage</th>
								<th>Status</th>
								<th>Created Date</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td>653122</td>
								<td>System Architect</td>
								<td>23</td>
								<td>Active</td>
								<td>2019/09/28</td>
								<td>
										<div class="button-group">
										<button type="button" class="btn waves-effect waves-light btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
										<button type="button" class="btn waves-effect waves-light btn-info btn-sm"><i class="far fa-edit"></i></button>

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
