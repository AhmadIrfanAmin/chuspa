@extends('admin-layout.content')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Customer</h4>
				<h6 class="card-subtitle">Detail Customer Info</h6>
				<h6 class="card-subtitle"></h6>

                        
                           
                                <center class="m-t-30"> <img src="{{ URL::asset('public/assets/images/users/user.png')}}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">Hanna Gover</h4>
                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fas fa-gift"></i> <font class="font-medium">254</font></a></div>
                                        
                                    </div>
                                </center>
                            
                            <div>
                                <hr> </div>
                           <small class="text-muted">Email address </small>
                                <h6>hannagover@gmail.com</h6> <small class="text-muted p-t-30 db">Contact</small>
                                <h6>+91 654 784 547</h6> <small class="text-muted p-t-30 db">Home Address</small>
                                <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
                                <div class="map-box">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div> 
                               
                       
                  

			</div>
		</div>
	</div>
</div>
@endsection