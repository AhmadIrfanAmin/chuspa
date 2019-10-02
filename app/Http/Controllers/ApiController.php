<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Vehicle_type;
use App\Vehicle;
use App\App_image;
use App\User_type;
use \Illuminate\Support\Facades\Validator;
use Auth;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Notification;
class ApiController extends Controller
{
    //
    public function register(Request $request)
    {
        $registerResponse = new \stdClass();

        $validatorResponse = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
            'contact' => 'required',
        ]);

        if($validatorResponse->fails())
        {
            $registerResponse->status = 'failed';
            $registerResponse->code = 422;
            $registerResponse->message = 'validation failed';
            $registerResponse->response = $validatorResponse->errors();
            return response()->json($registerResponse);

        }
        else
        {
            $alreadyExist = User::where('email',$request->email)->first();//->where('role','customer')->first();//check if already registered
            if(!$alreadyExist)
            {
                if($request->hasFile('image'))
                {
                    $image = $request->file('image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/customer/images');
                    if(!File::isDirectory($destinationPath)){
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $image->move($destinationPath, $name);
                }
                else{
                    $name = 'default.jpg';
                }

                $user = new User();
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                //$request->user()->fill([
                //    'password' => Hash::make($request->newPassword)
                //])->save();
                $user->password = Hash::make($request->password);
                //$user->password = $request->password;
                $user->image = $name;
                $user->contact = $request->contact;
                $user->customer_type = $request->customer_type;
                $user->home_address = $request->home_address;
                $user->role = 'customer';
                //$request->user()->fill([
                //    'password' => Hash::make($request->newPassword)
                //])->save();

                $user->save();
                $registerResponse->status = 'success';
                $registerResponse->code = 200;
                $registerResponse->message = 'customer added successful';
                $registerResponse->response = $user;
                return response()->json($registerResponse);

            }
            else
            {
                $registerResponse->status = 'failed';
                $registerResponse->code = 422;
                $registerResponse->message = 'email already exist';
                $registerResponse->response = [];
                return response()->json($registerResponse);
            }
        }

    }
    public function login_customer(Request $request)
    {
        
                    
        $response = new \stdClass();
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails()){
            $response->status = 'failed';
            $response->code = 422;
            $response->message = 'validation failed';
            $response->response = $validator->errors();
            return response()->json($response);
        } 
        else {
            
            $user = User::where('email', $request->email)->first();//->where('role', 'customer')->first();
            //$user = User::with("orders.app_images")->where('email', $request->email)->first();//->where('role', 'customer')->first();
            
            if($user){
                if (Hash::check($request->password, $user->password)) {
                    $user->remember_token = md5(time());
                    //dd($user);
                    $user->save();
                    $login_user = new \stdClass();
                    $login_user->id = $user->id;
                    $login_user->first_name = $user->first_name;
                    $login_user->last_name = $user->last_name;
                    $login_user->email = $user->email;
                    $login_user->mobile = $user->contact;
                    $login_user->fcm_token = $request->fcm_token;
                    $login_user->home_address = $user->home_address;
                    $login_user->_token = $user->remember_token;
                    //$login_user->orders = $user->orders;                    

                    $vehicle_types = Vehicle_type::all();
                   
                    $login_user->vehicle_info = $vehicle_types;

                    $response->status = 'success';
                    $response->code = 200;
                    $response->message = 'login successful';
                    $response->response = $login_user;
                    return response()->json($response);

                } else {

                    $response->status = 'failed';
                    $response->code = 422;
                    $response->message = 'password does not match';
                    $response->response = [];
                    return response()->json($response);
                }
            }else{
                $response->status = 'failed';
                $response->code = 422;
                $response->message = 'record not found';
                $response->response = [];
                return response()->json($response);
            }
        }
    }
    public function logout($id){
        $response = new \stdClass();
        $user = User::find($id);

        if($user){
            $user->remember_token = null;
            $user->save();
            $response->status = 'success';
            $response->code = 200;
            $response->message = 'logout Successfully';
            $response->response = [];
            return response()->json($response);
        }else{
            $response->status = 'failed';
            $response->code = 422;
            $response->message = 'No User Found';
            $response->response = [];
            return response()->json($response);
        }
    }
   
    public function imageUploadPost(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fk_order_id' => 'required',
        ]);
        $response = new \stdClass();
        
        if($validator->fails())
        {
            $response->status = 'failed';
            $response->code = 440;
            $response->message = 'validation failed';
            $response->response = $validator->errors();
            return response()->json($response);
        }
        else
        {
            if ($request->hasFile('image_url')) 
            {
                $image_file = $request->file('image_url');
                $image_name = time() . '.' . $image_file->getClientOriginalExtension();
                $destinationPath = public_path('/order_assets/images');
               /// if (!File::isDirectory($destinationPath)) {
               ///     File::makeDirectory($destinationPath, 0777, true, true);
              ///  }
              ///  $image_file->move($destinationPath, $image_name);
            }

            $App_Image_Object = new App_image();
            $App_Image_Object->image_url = $image_name;
            $App_Image_Object->fk_order_id = $request->fk_order_id;
            $App_Image_Object->save();
            $response->status = "success";
            $response->code = 200;
            $response->message = "Image Uploaded Successfully!";
            $response->response = $App_Image_Object;
            return response()->json($response);


        }
        //$imageName = time().'.'.request()->image_url->getClientOriginalExtension();

  
       // dd($imageName);
        //request()->image_url->move(public_path('images'), $imageName);

  

        //return back()

//            ->with('success','You have successfully upload image.')

  ///          ->with('image',$imageName);

    }

    public function create_order(Request $request)
    {
        $response = new \stdClass();
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'pickup' =>  'required',
            'dropoff'=> 'required',
            'trip_distance' => 'required',
            'load_unload_time' => 'required',
            'total_estimation' => 'required',
            'payment_mode' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            'time' => 'required',
            'pickup_lat' => 'required',
            'pickup_long' => 'required',
            'dropoff_lat' => 'required',
            'dropoff_long' => 'required',
            'fk_customer_id'=> 'required',
            ////'fk_driver_id' => 'required',
        ]);

        if($validator->fails())
        {
            $response->status = 'failed';
            $response->code = 440;
            $response->message = 'validation failed';
            $response->response = $validator->errors();
            return response()->json($response);

        }
        else
        {
            $orderToCreate = new Order();
            $orderToCreate->city = $request->city;
            $orderToCreate->country = $request->country;
            $orderToCreate->state = $request->state;
            $orderToCreate->zip_code = $request->zip_code;
            $orderToCreate->dropoff = $request->dropoff;
            $orderToCreate->pickup = $request->pickup;
            $orderToCreate->dropoff_lat = $request->dropoff_lat;
            $orderToCreate->dropoff_long = $request->dropoff_long;
            $orderToCreate->pickup_lat = $request->pickup_lat;
            $orderToCreate->pickup_long = $request->pickup_long;
            $orderToCreate->fk_customer_id = $request->fk_customer_id;
            $orderToCreate->fk_driver_id = $request->fk_driver_id;
            $orderToCreate->fk_promo_id = $request->fk_promo_id;
            $orderToCreate->load_unload_time = $request->load_unload_time;
            $orderToCreate->payment_mode = $request->payment_mode;
            $orderToCreate->status = $request->status;
            $orderToCreate->time = $request->time;
            $orderToCreate->tip = $request->tip;
            $orderToCreate->total_estimation = $request->total_estimation;

            $orderToCreate->save();

            $response->status = "success";
            $response->code = 200;
            $response->message = "Order Created Successfully!";
            $response->response = $orderToCreate;
            return response()->json($response);

        }
    }

   
    public function getCustomerTypes()
    {
        $response = new \stdClass();
        $customer_types = User_type::all();

        if(!$customer_types)
        {
            $response->status = 'failed';
            $response->code = 422;
            $response->message = 'No Record Exist';
            $response->response = [];
            return response()->json($response);
        }
        else
        {
            
            $response->status = 'success';
            $response->code = 200;
            $response->message = 'Customer Types';
            $response->response = $customer_types;
            return response()->json($response);
        }
    }
    public function getCustomerOrders($id)
    {
        $response = new \stdClass();

        $order_records = \DB::table('orders')
                    ->select(\DB::raw('orders.*'))
                   // ->join('app_images', 'orders.id', '=', 'app_images.fk_order_id')
                    ->where('fk_customer_id',$id)
                    ->get();
        $customer_orders = Order::with("app_images")->where('fk_customer_id', $id)->get();//->where('role', 'customer')->first();

        if(!$customer_orders)
        {
            $response->status = 'failed';
            $response->code = 422;
            $response->message = 'No Record Exist';
            $response->response = [];
            return response()->json($response);
        }
        else
        {
            $response->status = 'success';
            $response->code = 200;
            $response->message = 'Order Record';
            $response->response = $customer_orders;
            return response()->json($response);
            
        }

    }


    
    public function changeOrderStatus(Request $request){
        $response = new \stdClass();

        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            $response->status = 'failed';
            $response->code = 440;
            $response->message = 'validation failed';
            $response->response = $validator->errors();
            return response()->json($response);
        } else {
            $order = Order::find($request->order_id);
            if($order){
                $order->status = $request->status;
                $order->save();
                $response->status = 'success';
                $response->code = 200;
                $response->message = 'Status Updated Successful';
                $response->response = $order;
                return response()->json($response);
            }else{
                $response->status = 'failed';
                $response->code = 440;
                $response->message = 'No Order Found';
                $response->response = [];
                return response()->json($response);
            }
        }
    }
    public function updateProfile(Request $request){
        $response = new \stdClass();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'password' => 'required',
            'home_address' => 'required',
        ]);

        if($validator->fails()){
            $response->status = 'failed';
            $response->code = 440;
            $response->message = 'validation failed';
            $response->response = $validator->errors();
            return response()->json($response);
        } else {
            $user = User::find($request->id);
            if($user){
                $user->status = $request->status;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->contact = $request->contact;
                $user->password = Hash::make($request->password);//$request->password;  
                $user->home_address = $request->home_address;              
                $user->save();
                $response->status = 'success';
                $response->code = 200;
                $response->message = 'Status Updated Successful';
                $response->response = $user;
                return response()->json($response);
            }else{
                $response->status = 'failed';
                $response->code = 440;
                $response->message = 'No User Found';
                $response->response = [];
                return response()->json($response);
            }
        }
    }
    public function checkOnlineStatus($id)
    {
        $response = new \stdClass();
        $user = User::find($id);
        if($user)
        {
            if($user->online==1)
            {
                $response->status = 'success';
                $response->code = 200;
                $response->message = 'online';
                $response->response = [];
                return response()->json($response);
            }
            else
            {
                $response->status = 'offline';
                $response->code = 440;
                $response->message = 'User Offline';
                $response->response = [];
                return response()->json($response);
            }
        }
        else
        {
            $response->status = 'failed';
            $response->code = 422;
            $response->message = 'No User Found';
            $response->response = [];
            return response()->json($response);
        }
    }
    public function setStatus(Request $request)
    {
        $response = new \stdClass();

        $validator = Validator::make($request->all(), [
            'online' => 'required',
            'id' => 'required',
        ]);

        if($validator->fails()){
            $response->status = 'failed';
            $response->code = 440;
            $response->message = 'validation failed';
            $response->response = $validator->errors();
            return response()->json($response);
        } else {}

        $response = new \stdClass();
        $user = User::find($id);
        if($user)
        {
            $user->online = $request->online;
            $user->save();
            $response->status = 'success';
                $response->code = 200;
                $response->message = 'online';
                $response->response = [];
                return response()->json($response);
        }
        else
        {
            $response->status = 'failed';
            $response->code = 422;
            $response->message = 'No User Found';
            $response->response = [];
            return response()->json($response);
        }
    }

    public function get_drivers(Request $request) {
        $rules = array(
            'longitude' => 'required',
            'latitude' => 'required',
            'radius' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return [
                'status' => 440,
                'message' => $validator->errors()->first()
            ];
        }
        $longitude = $request->longitude;
        $latitude = $request->latitude;
        $radius = $request->radius;
        $get_drivers = \DB::table('users')
                             ->select(\DB::raw('users.*,
                              111.111 *
                              DEGREES(ACOS(COS(RADIANS('.$latitude.'))
                            * COS(RADIANS(latitude))
                            * COS(RADIANS('.$longitude.' - longitude))
                              + SIN(RADIANS('.$longitude.'))
                            * SIN(RADIANS(latitude)))) AS radius'))
                              ->where('role', '=','vehicle boy')
                              ->having('radius', '<', $radius)
                              ->get();
        return response(['status' => 200, 'drivers' => $get_drivers]);
    }
    public function update_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()){
            $response->status = 'failed';
            $response->code = 422;
            $response->message = 'validation failed';
            $response->response = $validator->errors();
            return response()->json($response);
        } 
        else 
        {
            $id = $request->order_id;
            $status = $request->status;
            $order_status = \DB::table('orders')
                                ->where('id', $id)
                                ->update(['status' => $status]);
                                // Get fcm token from users tables using order_id
            $fcm_token = \DB::table('orders')
                                ->join('users', 'orders.fk_customer_id', '=', 'users.id')
                                ->where('orders.id', $id)
                                ->value('fcm_token');
    
                                //Send Notifications 
                                // Start
            define('API_ACCESS_KEY', 
                'AAAAmHw-t58:APA91bGT8az1Cd5mZloii3dozhet-IMrYiqJUHk1ify-bx3_WXzJHQ6165TVIp2QcZj6vAsXm5Qg2yrC7oah4mfWv7roGTIAITELBLT-Z6jUa5riDIq97JkAzWR1Vwe5jeThdApMQqZe');
            // Customize the msg if you want
            $msg = array (
                        'title' => 'Order is'.' '.ucfirst($status),
                        'message' => 'Status Changed',
                    );
            $fields = array (
                            'registration_ids' => array($fcm_token),
                            'data' => $msg
                        );
            $headers = array (
                            'Authorization: key=' . API_ACCESS_KEY,
                            'Content-Type: application/json'
                        );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
    
            curl_close($ch);
            // End
            return response(['status' => 200, 'message' => 'Status Changed']);
        }
        
    }
    public function addVehicle(Request $request)
    {
        $response = new \stdClass();
        $validator = Validator::make($request->all(), [
            'fk_vehicle_type' => 'required',
            'license_no' =>  'required',
            'front_image_url'=> 'required',
            'left_image_url' => 'required',
            'right_image_url' => 'required',
            'color' => 'required',
            'licence_image_url' => 'required',
            'license_plate_url' => 'required',
            'rachet_strap1_url' => 'required',
            'rachet_strap2_url' => 'required',
            'rachet_strap3_url' => 'required',
            'rachet_strap4_url' => 'required',
            'bungee_cord1_url' => 'required',
            'bungee_cord2_url' => 'required',
            'moving_blanket1_url' => 'required',
            'moving_blanket2_url' => 'required',
            'tarp_url'=> 'required',
            'fk_driver_id'=>'required',
        ]);

        if($validator->fails())
        {
            $response->status = 'failed';
            $response->code = 440;
            $response->message = 'validation failed';
            $response->response = $validator->errors();
            return response()->json($response);

        }
        else
        {
            $vehicle = new Vehicle();
            $vehicle->fk_vehicle_type = $request->fk_vehicle_type;  
            $vehicle->license_no = $request->license_no;
            $vehicle->front_image_url = $request->front_image_url;
            $vehicle->left_image_url = $request->left_image_url;
            $vehicle->right_image_url = $request->right_image_url;
            $vehicle->color = $request->color;
            $vehicle->licence_image_url = $request->licence_image_url;
            $vehicle->license_plate_url = $request->license_plate_url;
            $vehicle->rachet_strap1_url = $request->rachet_strap1_url;
            $vehicle->rachet_strap2_url = $request->rachet_strap2_url;
            $vehicle->rachet_strap3_url = $request->rachet_strap3_url;
            $vehicle->rachet_strap4_url = $request->rachet_strap4_url;
            $vehicle->bungee_cord1_url = $request->bungee_cord1_url;
            $vehicle->bungee_cord2_url = $request->bungee_cord2_url;
            $vehicle->moving_blanket1_url = $request->moving_blanket1_url;
            $vehicle->moving_blanket2_url = $request->moving_blanket2_url;
            $vehicle->tarp_url = $request->tarp_url;
            $vehicle->fk_driver_id = $request->fk_driver_id;
            $vehicle->save();
            $response->status = 'success';
                $response->code = 200;
                $response->message = 'New Vehicle Record Added !';
                $response->response = $vehicle;
                return response()->json($response);
        }
    }
    public function checkPromoStatus(Request $request)
    {
        $response = new \stdClass();
        $validator = Validator::make($request->all(), [
            'promo_code' => 'required',
            'fk_user_id' =>  'required',
        ]);

        if($validator->fails())
        {
            $response->status = 'failed';
            $response->code = 440;
            $response->message = 'validation failed';
            $response->response = $validator->errors();
            return response()->json($response);

        }
        else
        {
            $promo_discount = Promo_discount::where('promo_code', $request->promo_code)->first();//->where('role', 'customer')->first();
            if(!$promo_discount)
            {
                $response->status = 'failed';
                $response->code = 422;
                $response->message = 'record not found';
                $response->response = [];
                return response()->json($response);
            }
            else
            {
                if($promo_discount->status != 'Expired')
                {
                    $response->status = "success";
                    $response->code = 200;
                    $response->message = 'Here is your discount percentage';
                    $response->response = $promo_discount->discount_percentage;
                }
                else
                {
                    $response->status = "failed";
                    $response->code = 422;
                    $response->message = 'This Promo Code Expired';
                    $response->response = $promo_discount->discount_percentage;
                }
            }
        }
    }
}
