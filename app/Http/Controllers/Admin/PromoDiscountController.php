<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Promo_discount;
use App\User_type;
use Illuminate\Http\Request;
use Validator;
class PromoDiscountController extends Controller
{
    public function index() {
    	$promo_discounts = \DB::table('promo_discounts')
            					->select(\DB::raw('promo_discounts.*,user_types.type_name'))
            					->leftJoin('user_types','promo_discounts.fk_user_type','=','user_types.id')
            					->get();
    	return view('admin.promos.manage-promos',compact('promo_discounts'));
    }
    public function create(Request $request) {
    	$user_types = User_type::all();
    	return view('admin.promos.add-promo',compact('user_types'));
    }
    public function store(Request $request) {
    	$this->validate(request(), [
            'promo_code' => 'required',
            'discount_percentage' => 'required',
            'status' => 'required',
            'consume_count' => 'required',
            
            ]);
    	$promo_discount = new Promo_discount;
        $promo_discount->promo_code = $request->promo_code;
        $promo_discount->discount_percentage = $request->discount_percentage;
        $promo_discount->status = $request->status;
        $promo_discount->fk_user_type =  $request->fk_user_type ? $request->fk_user_type : 0;
        $promo_discount->consume_count = $request->consume_count;
        $promo_discount->created_by = 1;
        $promo_discount->save();
        return redirect()->route('promos');
    }
    public function edit($id) {
        $promo_discount=Promo_discount::find($id);
        $user_types = User_type::all();
        return view('admin.promos.update-promo',compact('promo_discount','user_types'));
    }
     public function update(Request $request, $id) {
        $this->validate(request(), [
            'promo_code' => 'required',
            'discount_percentage' => 'required',
            'status' => 'required',
            'consume_count' => 'required',
            ]);
        $promo_discount = Promo_discount::find($id);
      	$promo_discount->promo_code = $request->promo_code;
        $promo_discount->discount_percentage = $request->discount_percentage;
        $promo_discount->status = $request->status;
        $promo_discount->fk_user_type = $request->fk_user_type ? $request->fk_user_type : 0;
        $promo_discount->consume_count = $request->consume_count;
        $promo_discount->created_by = 1;
        $promo_discount->save();
        return redirect()->route('promos');
    }
    public function destroy($id) {
        $promo_discount = Promo_discount::findOrFail($id);
        $promo_discount->delete();
        return redirect()->route('promos');
	}
}
