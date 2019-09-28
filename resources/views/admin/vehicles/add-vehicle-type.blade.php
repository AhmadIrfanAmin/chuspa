@extends('admin-layout.content')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Add New Vehicle</h4>
				<h6 class="card-subtitle">Manage Vehicles</h6>
				<h6 class="card-subtitle"></h6>
				<form class="form-material m-t-40" action="" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<label> Vehicle Type Name</label>
						<input type="text" class="form-control form-control-line" placeholder="" name="type_name" required="required"> </div>
					
					<div class="form-group">
						<label>Vehicle Type Image</label>
						<input type="file" class="form-control form-control-line" name="image_url" required="required"> 
						
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="number" class="form-control form-control-line" name="price" min="0" required="required"> </div>
						<button type="submit" class="btn btn-primary d-inlick">Add</button>
					</div>

				</form>
				</div>
			</div>
		</div>
		@endsection