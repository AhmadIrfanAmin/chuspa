<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class CustomerController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = \DB::table('users')
            					->select(\DB::raw('users.*,user_types.type_name'))
                                ->Join('user_types','users.customer_type','=','user_types.id')
                                ->where('users.role','=','customer')
            					->get();
    	return view('admin.customers.manage-customers',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        if(!$user)
        {
            //return $user object to view
            return view('admin.customers.customer-detail',compact('user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $user = User::find($id);
        // if(!$user)
        // {
        //     //return $user object to view
        //     return redirect()->route('admin.customers.manage-customers');
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        if($user)
        {
            $this->validate(request(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'password' => 'required|confirmed|min:6',
                'contact' => 'required',
                ]);
            DB::table('users')
            ->where('id', $id)
            ->update(
                ['first_name'=>$request->first_name,
                'last_name'=>$request->last_name,'email'=>$request->email,
                'password'=>$request->password,'contact'=>$request->contact]
            );
            return redirect()->route('admin.customers.manage-customers');
        }
        else
        {
            return redirect()->route('admin.customers.manage-customers');


        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        if($user)
        {
            $user->delete();
            return redirect()->route('admin.customers.manage-customers');
        }
        else
        {
            return redirect()->route('admin.customers.manage-customers');

        }
    }
}
