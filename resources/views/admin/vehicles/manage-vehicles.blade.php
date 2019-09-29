@extends('admin-layout.content')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Vehicle Types Table</h4>
				<h6 class="card-subtitle">Manage Vehicle Types</h6>
				<h6 class="card-subtitle"></h6>
				<a href="{{url('admin/vehicle-type/add')}}" class="btn btn-info btn-rounded m-t-10 float-right" ><i class="fa fa-plus-circle"></i> Add New Vehicle Type</a>

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
							@foreach($vehicle_types as $vehicle_type)
							<tr>
								<td>{{$vehicle_type->type_name}}</td>
								<td><img  src="{{url('images/vehicle_types',$vehicle_type->image_url)}}" style="width:50px;height:50px;" class="img-circle"></td>
                                   
								<td>{{$vehicle_type->price}}</td>
								<td>{{Wehaulhelper::print_date($vehicle_type->created_at)}}</td>
								<td>
										<form method="POST" action="{{ route('vehicle-type.destroy', [$vehicle_type->id]) }}" class="d-inline">
    									{{ csrf_field() }}
    									{{ method_field('DELETE') }}
    									<button type="submit" class="btn waves-effect waves-light btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
    									</form>
										
										<a href="{{route('vehicle-type.edit', ['type' => $vehicle_type->id])}}" class="btn waves-effect waves-light btn-info btn-sm"><i class="far fa-edit"></i></a>

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

