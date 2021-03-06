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
				<h4 class="card-title">Add Customer Type</h4>
				<h6 class="card-subtitle">Manage Customer Types</h6>
				<h6 class="card-subtitle"></h6>
				<form class="form-material m-t-40" action="{{route('customer-type.store')}}" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<label> Type Name</label>
						<input type="text" class="form-control form-control-line" placeholder="" name="type_name" required="required"> </div>
			
						<button type="submit" class="btn btn-primary d-inlick">Add</button>
					</div>

				</form>
				</div>
			</div>
		</div>
		@endsection