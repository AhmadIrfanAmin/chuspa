<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User_type;
use Illuminate\Http\Request;

class CustomerTypeController extends Controller
{
    public function index() {
    	$user_types = User_type::all();
    	return view('admin.customer-types.manage-customer-types',compact('user_types'));
    }
    public function create(Request $request) {
    	return view('admin.customer-types.add-customer-type');
    }
    public function store(Request $request) {
    	$this->validate(request(), [
            'type_name' => 'required'
            ]);
    	  
    	$user_type = new User_type;
        $user_type->type_name = $request->type_name;
        $user_type->save();
        return redirect()->route('user-types');
    }
    public function edit($id) {
        $user_type=User_type::find($id);
        return view('admin.customer-types.update-customer-type',compact('user_type'));
    }
     public function update(Request $request, $id) {
     	$this->validate(request(), [
            'type_name' => 'required'
            ]);
     	 
        $user_type = User_type::find($id);
      	$user_type->type_name = $request->type_name;
        $user_type->save();
        return redirect()->route('user-types');
    }
    public function destroy($id) {
    	$user_type = User_type::findOrFail($id);
    	$user_type->delete();
    	return redirect()->route('user-types');
	}
}
