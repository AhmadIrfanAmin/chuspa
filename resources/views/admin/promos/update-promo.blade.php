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
				<h4 class="card-title">Update Promo & Discount</h4>
				<h6 class="card-subtitle">Manage Promos & Discounts</h6>
				<h6 class="card-subtitle"></h6>
				<form class="form-material m-t-40" action="{{route('promo.update',$promo_discount->id)}}" method="post">
					{{ csrf_field() }}
					
					<div class="form-group">
						<label> Promo Code</label>
						<input type="text" class="form-control form-control-line" placeholder="" name="promo_code" required="required" value="{{$promo_discount->promo_code}}"> </div>

						<div class="form-group">
							<label>Customer Type</label>
							<select class="form-control" name="fk_user_type">
								<option value="">Select</option>
								 @foreach ($user_types as $user_type)
                        		<option value="{{ $user_type->id }}"
                                	@if ($promo_discount->fk_user_type == $user_type->id)
                                	selected
                                	@endif
                        			>{{ $user_type->type_name }}</option>
                    			@endforeach
							</select>

						</div>
						<div class="form-group">
						<label> Consume Count</label>
						<input type="number" class="form-control form-control-line" placeholder="" name="consume_count" required="required" value="{{$promo_discount->consume_count}}" min="0"> </div>

						<div class="form-group">
							<label>Discount Percentage</label>
							<input type="number" class="form-control form-control-line" name="discount_percentage" min="0" required="required" value="{{$promo_discount->discount_percentage}}"> </div>
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status">
									@php
										if($promo_discount->status=='Not Consumed Once') {
									@endphp
												<option value="">Select</option>
												 <option value="Not Consumed Once" selected>Not Consumed Once</option>
												 <option value="Consuming">Consuming</option>
												 <option value="Expired">Expired</option>

									@php }
										else if($promo_discount->status=='Consuming') {
									@endphp
												<option value="">Select</option>
												 <option value="Not Consumed Once">Not Consumed Once</option>
												 <option value="Consuming" selected>Consuming</option>
												 <option value="Expired">Expired</option>
									@php
										}
										else if($promo_discount->status=='Expired') {
									@endphp
												<option value="">Select</option>
												<option value="Not Consumed Once">Not Consumed Once</option>
												<option value="Consuming">Consuming</option>
												<option value="Expired" selected="selected">Expired</option>
									@php }
										else {
									@endphp
												<option value="">Select</option>
												<option value="Not Consumed Once">Not Consumed Once</option>
												<option value="Consuming">Consuming</option>
												<option value="Expired">Expired</option>
									@php
										}
									@endphp
								</select>

							</div>
							<button type="submit" class="btn btn-primary d-inlick">Update</button>
						</div>

					</form>
				</div>
			</div>
		</div>
		@endsection