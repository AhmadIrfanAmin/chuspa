<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Promo_discount;
use App\User_type;
use Illuminate\Http\Request;

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
    public function store() {
    	$this->validate(request(), [
            'promo_code' => 'required',
            'discount_percentage' => 'required',
            'status' => 'required',
            'fk_user_type' => 'required',
            ]);
        Promo_discount::create([
            'promo_code' => $request->promo_code,
            'discount_percentage' => $request->discount_percentage,
            'created_by' =>	\Auth::user()->id,
            'status' => $request->status,
            'fk_user_type'=>$request->fk_user_type,
        ]);
        return redirect()->route('promos');
    }
    
}
