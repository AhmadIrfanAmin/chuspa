@extends('admin-layout.content')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Customer Types Table</h4>
				<h6 class="card-subtitle">Manage Orders</h6>
				<a href="{{url('admin/customer-type/add')}}" class="btn btn-info btn-rounded m-t-10 float-right" ><i class="fa fa-plus-circle"></i> Add Customer New Type</a>
				

				<div class="table-responsive m-t-40">

					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								
								<th>Type Name</th>
								<th>Created Date</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
							@foreach($user_types as $user_type)

							<tr>
								
								<td>{{$user_type->type_name}}</td>
								<td>{{Wehaulhelper::print_date($user_type->created_at)}}</td>
								<td>
									<div class="button-group">
										<form method="POST" action="{{ route('customer-type.destroy', [$user_type->id]) }}" class="d-inline">
    									{{ csrf_field() }}
    									{{ method_field('DELETE') }}
    									<button type="submit" class="btn waves-effect waves-light btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
    									</form>
										
										<a href="{{route('customer-type.edit', ['type' => $user_type->id])}}" class="btn waves-effect waves-light btn-info btn-sm"><i class="far fa-edit"></i></a>

									</div> 
								</td>
								

							</tr>
							@endforeach


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

