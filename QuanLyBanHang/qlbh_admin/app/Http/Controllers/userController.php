<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\UsersModel;
use App\Http\Requests\userRequest;

class userController extends Controller
{
    public function index()
    {
        $data = UsersModel::all();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return view('user.index', compact('data'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = new UsersModel();
        $data->id = md5(time());
        $data->full_name = $request->get('full_name');
        $data->email = $request->get('email');
        $data->password = Hash::make($request->get('password'));
        $data->phone = $request->get('phone');
        $data->address = $request->get('address');
        if ($data->save()) {
            return redirect('user/index')->with('message', 'Thêm thành công !');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = UsersModel::where('id', '=', $id)->first();
//        dd($data);
        return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = UsersModel::find($id);
        $data->full_name = $request->get('full_name');
        $data->email = $request->get('email');
        $data->phone = $request->get('phone');
        $data->address = $request->get('address');
        if ($data->save()) {
            return redirect('user/index')->with('message', 'Cập nhật thành công !');
        }
    }

    public
    function destroy($id)
    {
//        dd($id);
        UsersModel::find($id)->delete();
        return redirect('user/index')->with('message', 'Xóa thành công !');
    }
}
