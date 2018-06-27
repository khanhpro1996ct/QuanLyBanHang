<?php

namespace App\Http\Controllers;

use App\billDetailModel;
use App\productModel;
use Illuminate\Http\Request;

class KhoController extends Controller
{
    public function index()
    {
        $data = productModel::select([
            'products.id',
            'products.name',
            'products.soluong',
            'products.giagoc',
            'products.unit',
            'products.unit_price',
            'products.promotion_price',
        ])->get();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return view('kho.index', compact('data'));
    }

    public function edit($id)
    {
        $data =  productModel::where( 'id','=',$id)->first();
        return view('kho.nhapkho', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = productModel::find($id);
        $data->giagoc = $request->get('giagoc');
        $data->unit_price = $request->get('unit_price');
        $data->promotion_price = $request->get('promotion_price');
        $data->soluong = $request->get('soluong');
        $data->unit = $request->get('unit');
        $data->save();
        return redirect('/kho-hang/index');
    }
}
