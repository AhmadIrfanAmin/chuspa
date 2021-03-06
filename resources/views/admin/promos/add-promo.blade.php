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
				<h4 class="card-title">Add Promo & Discount</h4>
				<h6 class="card-subtitle">Manage Promos & Discounts</h6>
				<h6 class="card-subtitle"></h6>
				<form class="form-material m-t-40" action="{{route('promo.store')}}" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<label> Promo Code</label>
						<input type="text" class="form-control form-control-line" placeholder="" name="promo_code" required="required"> </div>

						<div class="form-group">
							<label>Customer Type</label>
							<select class="form-control" name="fk_user_type">
								<option value="">Select</option>
								@foreach ($user_types as $user_type)
								<option value="{{$user_type->id}}">{{$user_type->type_name}}</option>
								@endforeach
							</select>

						</div>
						<div class="form-group">
						<label> Consume Count</label>
						<input type="number" class="form-control form-control-line" placeholder="" name="consume_count" required="required" min="0"> </div>

						<div class="form-group">
							<label>Discount Percentage</label>
							<input type="number" class="form-control form-control-line" name="discount_percentage" min="0" required="required"> </div>
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status">
									<option value="">Select</option>
									<option value="Not Consumed Once">Not Consumed Once</option>
									<option value="Consuming">Consuming</option>
									<option value="Expired">Expired</option>
								</select>

							</div>
							<button type="submit" class="btn btn-primary d-inlick">Add</button>
						</div>

					</form>
				</div>
			</div>
		</div>
		@endsection