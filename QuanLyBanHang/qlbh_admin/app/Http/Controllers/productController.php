<?php

namespace App\Http\Controllers;

use App\billDetailModel;
use Illuminate\Http\Request;
use App\productModel;
use App\typeModel;
use App\Http\Requests\productRequest;

class productController extends Controller
{

    public function indexview()
    {
        $data = productModel::leftjoin('type_products', 'type_products.id', '=', 'products.id_type')
            ->select([
                'products.id',
                'products.name',
                'type_products.name as id_type',
                'products.description',
                'products.description_detail',
                'products.image',
                'products.giagoc',
                'products.unit_price',
                'products.promotion_price',
                'products.unit',
                'products.new',
                'products.soluong'
            ])->orderby('products.created_at', 'asc')->get();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return $data;
    }

    public function index()
    {
        $data = $this->indexview();
        return view('product.index', compact('data'));
    }

    public function create()
    {
        $loaisanpham = typeModel::all();
        return view('product.create', compact('loaisanpham'));
    }

    public function store(productRequest $request)
    {

        $data = new productModel;
        $data->id = md5(time());
        $data->name = $request->get('name');
        $data->id_type = $request->get('id_type');
        $data->description = $request->get('description');
        $data->description_detail = $request->get('description_detail');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move('upload', $file->getClientOriginalName());
            $data->image = url('upload') . '/' . $file->getClientOriginalName();
        } else {
            $data->image = "";
        }
        $data->giagoc = $request->get('giagoc');
        $data->unit_price = $request->get('unit_price');
        $data->promotion_price = $request->get('promotion_price');
        $data->unit = $request->get('unit');
        if (empty($request->get('new'))) {
            $data->new = 0;
        } else {
            $data->new = 1;
        }
        $data->soluong = $request->get('soluong');
        if ($data->save()) {
            return redirect('product/index')->with('message', 'Thêm thành công !');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = productModel::leftjoin('type_products', 'type_products.id', '=', 'products.id_type')
            ->where('products.id', '=', $id)
            ->first([
                'products.id',
                'products.name',
                'products.id_type',
                'products.description',
                'products.description_detail',
                'products.image',
                'products.giagoc',
                'products.unit_price',
                'products.promotion_price',
                'products.unit',
                'products.new',
                'products.soluong'
            ]);
        $loaisanpham = typeModel::all();
        return view('product.edit', compact('data', 'loaisanpham'));
    }

    public function update(productRequest $request, $id)
    {
        $data = productModel::find($id);
        $data->name = $request->get('name');
        $data->id_type = $request->get('id_type');
        $data->description = $request->get('description');
        $data->description_detail = $request->get('description_detail');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move('upload', $file->getClientOriginalName());
            $data->image = url('upload') . '/' . $file->getClientOriginalName();
        }
        $data->giagoc = $request->get('giagoc');
        $data->unit_price = $request->get('unit_price');
        $data->promotion_price = $request->get('promotion_price');
        $data->unit = $request->get('unit');
        $data->soluong = $request->get('soluong');
        if (empty($request->get('new'))) {
            $data->new = 0;
        } else {
            $data->new = 1;
        }
        if ($data->save()) {
            return redirect('product/index')->with('message', 'Cập nhật thành công !');
        }
    }

    public function destroy($id)
    {
        productModel::find($id)->delete();
        return redirect('product/index')->with('message', 'Xóa thành công !');
    }

    public function soluongban($id)
    {
        $data = billDetailModel::find($id);
        $data->where('id_product', '=', 'id_product')->get();
        return $data;
    }

    public function soluongton(Request $request)
    {
        $data_pr = productModel::where('id', $request->get('id'))
            ->first();

        $data_bill_count = billDetailModel::where('id_product', $request->get('id'))
            ->sum('quantity');
        $data_pr->soluong -= $data_bill_count;
        $data_pr->save();
        return $data_pr;
    }

}
