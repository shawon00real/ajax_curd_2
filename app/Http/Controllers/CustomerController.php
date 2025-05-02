<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::orderBy('id', 'desc')->get();
        return view('welcome', compact('customers'));
    }

    public function create(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function delete(Request $request){
        $del = Customer::FindOrFail($request->id);
        $del->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function update(Request $request){
        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->save();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
