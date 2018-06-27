<?php

namespace App\Http\Controllers;

use App\productModel;
use Illuminate\Http\Request;
use App\typeModel;
use App\Http\Requests\typeRequest;

class typeController extends Controller
{
    public function index()
    {
        $data = typeModel::all();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return view('type.index', compact('data'));
    }

    public function create()
    {
        return view('type.create');
    }

    public function store(typeRequest $request)
    {
        $data = new typeModel();
        $data->id = md5(time());
        $data->name = $request->get('name');
        $data->description = $request->get('description');
        if ($data->save()) {
            return redirect('type/index')->with('message', 'Thêm thành công !');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $data = typeModel::where('id', '=', $id)->first();
        return view('type.edit', compact('data'));
    }

    public function update(typeRequest $request, $id)
    {
        $data = typeModel::find($id);
        $data->name = $request->get('name');
        $data->description = $request->get('description');
        if ($data->save()) {
            return redirect('type/index')->with('message', 'Cập nhật thành công !');
        }
    }

    public function destroy($id)
    {
        typeModel::find($id)->delete();
        productModel::where('id_type', $id)->delete();
        return redirect('type/index')->with('message', 'Xóa thành công !');
    }
}
