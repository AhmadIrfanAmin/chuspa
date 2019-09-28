@extends('admin-layout.content')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Driver Order Route Map</h4>
				<div id="routesmap" class="gmaps"></div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script-dashboard')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoliAneRffQDyA7Ul9cDk3tLe7vaU4yP8"></script>
<script src="{{ URL::asset('public/assets/node_modules/gmaps/gmaps.min.js')}}"></script>
<script src="{{ URL::asset('public/assets/node_modules/gmaps/jquery.gmaps.js')}}"></script>
@stop