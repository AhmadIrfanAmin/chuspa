<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Vehicle_type;
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
                    $login_user->home_address = $user->home_address;
                    $login_user->_token = $user->remember_token;


                   // $vehicles_data = new \stdClass();
                    //$vehicles_data_array = array();
                    //$vehicle_types = Vehicle_type::with('vehicle')->get();//all();
                    //$vehicle_types = Vehicle_type::with('vehicles')->get();//all();
                    $vehicle_types = Vehicle_type::all();
                    

                   
                    ////vehicle::with('vehicle_type')->get();
                    //$vehicle_record = \DB::table('vehicle_types')
                    //->select(\DB::raw('vehicle_types.*,vehicles.*'))
                    //->join('vehicles', 'vehicle_types.id', '=', 'vehicles.fk_vehicle_type')
                    //->where('role_id',$roleId)
                    //->get();
                   // dd($vehicle_record);
                    // foreach($vehicle_types as $vehicle_type)
                    // {
                        //$vehicles_data->type_name = $vehicle_type->type_name;
                        //$vehicles_data->image_url = $vehicle_type->image_url;
                        //$vehicles_data->record = $vehicle_type->vehicles;
                        //$temp = $vehicles_data;
                        //array_push($vehicles_data_array,$temp);
                        //$vehicle_type = null;
                        //$vehicles_data = null;
                        ///$vehicles_data->vehicle   = $vehicle_type->vehicles;
                        //$vehicles_data->type_name = $vehicle_type->type_name;
                        //$vehicles_data->image_url = $vehicle_type->image_url;
                        //array_push($vehicles_data_array,$vehicle_type);
                        ///array_push($vehicles_data_array,$vehicle_type);
                        ///array_push($vehicles_data_array,$vehicle_type->vehicles);
                    //}
                    //dd($vehicles_data_array);
                    $login_user->vehicle_info = $vehicle_types;//$vehicles_data_array;//$vehicles_data;

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
    // public function add_new_item(Request $request)
    // {
    //     $response = new \stdClass();
    //     $validator = Validator::make($request->all(),[
    //         ''.,'',
            
    //     ]);
    // }
    public function imageUploadPost(Request $request)
    {

        // request()->validate([

        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        // ]);

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

    public function get_orders($id)
    {
        $response = new \stdClass();
       /// $booking = Order::with('boxes.country','boxes.state')->where('customer_id',$id)->get();
    }
    public function getCustomerTypes()
    {
        $response = new \stdClass();
        $customer_types = User_type::all();//->get();

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

        $order_record = \DB::table('orders')
                    ->select(\DB::raw('orders.*,app_images.*'))
                    ->join('app_images', 'orders.id', '=', 'app_images.fk_order_id')
                    ->where('fk_customer_id',$id)
                    ->get();
                    dd($order_record);
       //// dd($order_record);
        //$vehicle_record = \DB::table('vehicle_types')
          //          ->select(\DB::raw('vehicle_types.*,vehicles.*'))
            //        ->join('vehicles', 'vehicle_types.id', '=', 'vehicles.fk_vehicle_type')
              //      //->where('role_id',$roleId)
                //    ->get();
        ///$customer_types = User_type::all();//->get();

        if(!$order_record)
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
            $response->response = $order_record;
            return response()->json($response);
        }
    }


    
  
}
