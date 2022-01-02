<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoreDynamicProduct;
use Illuminate\Support\Facades\Validator;

class AddMoreDynamicProductController extends Controller
{
    public function index()
    {
        return view('add-more-dynamic-input-field');
    }

    public function store(Request $request)
    {

        // dd($request->newInputFields);
        $request->validate([
            'newInputFields.*.product_name' => 'required',
            'newInputFields.*.cost' => 'required'
        ]);

        // $msg = [
        //    'newInputFields.*.product_name.required' => 'please enter product',
        //    'newInputFields.*.cost.required' => 'please enter cost'
        // ];
        // $validator = Validator::make($request->all(), ([
        //     'newInputFields.*.product_name' => 'required',
        //     'newInputFields.*.cost' => 'required'
        // ]), $msg);

        // if ($validator->fails()) {
        //     return redirect(route('add-more'))
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }


        // foreach ($request->newInputFields as $key => $value)
        // {
        //     // dd($key , $value, $value['product_name'], $value['cost']);
        //     $newFields = AddMoreDynamicProduct::create([
        //         'product_name' => $value['product_name'],
        //         'cost' => $value['cost'],
        //     ]);
        // }
        // toast('Your Post as been submited!', 'success')->position('center');

        // return redirect()->back()->with('success', 'New Fileds added');
        // return redirect(route('add-more'));
    }
}