@extends('admin-layout.content')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Update New Vehicle Type</h4>
				<h6 class="card-subtitle">Manage Vehicle Types</h6>
				<h6 class="card-subtitle"></h6>
				<form class="form-material m-t-40" action="{{route('vehicle-type.update',$vehicle_type->id)}}" method="post">

					{{csrf_field()}}
					<div class="form-group">
						<label> Vehicle Type Name</label>
						<input type="text" class="form-control form-control-line" placeholder="" name="type_name" required="required" value="{{$vehicle_type->type_name}}"> </div>
					
					<div class="form-group">
						<label>Vehicle Type Image</label>
						<input type="file" class="form-control form-control-line" name="image_url"> 
						
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="number" class="form-control form-control-line" name="price" min="0" required="required" value="{{$vehicle_type->price}}"> </div>
						<button type="submit" class="btn btn-primary d-inlick">Update</button>
					</div>

				</form>
				</div>
			</div>
		</div>
		@endsection