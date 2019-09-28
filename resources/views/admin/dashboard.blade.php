@extends('admin-layout.content')

@section('content')
<div class="card-group">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-12">
<div class="d-flex no-block align-items-center">
<div>
<h3><i class="icon-screen-desktop"></i></h3>
<p class="text-muted">MYNEW CLIENTS</p>
</div>
<div class="ml-auto">
<h2 class="counter text-primary">23</h2>
</div>
</div>
</div>
<div class="col-12">
<div class="progress">
<div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>
</div>
<!-- Column -->
<!-- Column -->
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-12">
<div class="d-flex no-block align-items-center">
<div>
<h3><i class="icon-note"></i></h3>
<p class="text-muted">NEW PROJECTS</p>
</div>
<div class="ml-auto">
<h2 class="counter text-cyan">169</h2>
</div>
</div>
</div>
<div class="col-12">
<div class="progress">
<div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>
</div>
<!-- Column -->
<!-- Column -->
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-12">
<div class="d-flex no-block align-items-center">
<div>
<h3><i class="icon-doc"></i></h3>
<p class="text-muted">NEW INVOICES</p>
</div>
<div class="ml-auto">
<h2 class="counter text-purple">157</h2>
</div>
</div>
</div>
<div class="col-12">
<div class="progress">
<div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>
</div>
<!-- Column -->
<!-- Column -->
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-12">
<div class="d-flex no-block align-items-center">
<div>
<h3><i class="icon-bag"></i></h3>
<p class="text-muted">All PROJECTS</p>
</div>
<div class="ml-auto">
<h2 class="counter text-success">431</h2>
</div>
</div>
</div>
<div class="col-12">
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Customers Request Table</h4>
			
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
										<div class="button-group">
											<button type="button" class="btn waves-effect waves-light btn-danger btn-sm"><i class="fas fa-ban"></i></button>
											<button type="button" class="btn waves-effect waves-light btn-sm btn-info"><i class="fas fa-eye"></i></button>
											

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