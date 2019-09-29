<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Vehicle_type;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function index() {
    	$vehicle_types = Vehicle_type::all();
    	return view('admin.vehicles.manage-vehicles',compact('vehicle_types'));
    }
    public function create(Request $request) {
    	return view('admin.vehicles.add-vehicle-type');
    }
    public function store(Request $request) {
    	$this->validate(request(), [
            'type_name' => 'required',
            'price' => 'required',
            ]);
    	    if ($request->hasFile('image_url')) {
            $filenameWithExt = $request->file('image_url')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image_url')->move('images/vehicle_types', $filenameToStore);

        	} else {
            $filenameToStore = 'noimage.jpg';
        	}
    	$vehicle_type = new Vehicle_type;
        $vehicle_type->type_name = $request->type_name;
        $vehicle_type->price = $request->price;
        $vehicle_type->image_url = $filenameToStore;
        $vehicle_type->save();
        return redirect()->route('vehicle-types');
    }
    public function edit($id) {
        $vehicle_type=Vehicle_type::find($id);
        return view('admin.vehicles.update-vehicle-type',compact('vehicle_type'));
    }
     public function update(Request $request, $id) {
     	$this->validate(request(), [
            'type_name' => 'required',
            'price' => 'required',
            ]);
     	 if ($request->hasFile('image_url')) {
            $filenameWithExt = $request->file('image_url')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);    
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image_url')->move('images/vehicle_types', $filenameToStore);
        }
        $vehicle_type = vehicle_type::find($id);
      	$vehicle_type->type_name = $request->type_name;
        $vehicle_type->price = $request->price;
        if($request->hasFile('image_url')){
            $vehicle_type->image = $filenameToStore;
        }
     
        $vehicle_type->save();
        return redirect()->route('vehicle-types');
    }
    public function destroy($id) {
    	$vehicle_type = Vehicle_type::findOrFail($id);
    	$vehicle_type->delete();
    	return redirect()->route('vehicle-types');
	}
}
