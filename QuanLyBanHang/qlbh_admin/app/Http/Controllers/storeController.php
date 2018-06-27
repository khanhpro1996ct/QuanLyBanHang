<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeRequest;
use Illuminate\Http\Request;
use App\storeModel;

class storeController extends Controller
{
    public function index()
    {
        $data = storeModel::all();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return view('store.index', compact('data'));
    }

    public function create()
    {
        return view('store.create');
    }

    public function store(storeRequest $request)
    {
        $data = new storeModel();
        $data->id = md5(time());
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->phone = $request->get('phone');
        $data->email = $request->get('email');
        if ($data->save()) {
            return redirect('store/index')->with('message', 'Thêm thành công !');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = storeModel::where('id', '=', $id)->first();
        return view('store.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = storeModel::find($id);
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->phone = $request->get('phone');
        $data->email = $request->get('email');
        if($data->save()){
            return redirect('store/index')->with('message', 'Cập nhật thành công !');
        }
    }

    public function destroy($id)
    {
        storeModel::find($id)->delete();
        return redirect('store/index')->with('message', 'Xóa thành công !');
    }
}
