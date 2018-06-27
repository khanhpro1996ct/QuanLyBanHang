<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SlideModel;

class SlideController extends Controller
{
    public function index()
    {
        $data = SlideModel::all();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return view('slide.index', compact('data'));
    }

    public function create()
    {
        return view('slide.create');
    }

    public function store(Request $request)
    {
        $data = new SlideModel();
        $data->id = md5(time());
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move('upload', $file->getClientOriginalName());
            $data->image = url('upload') . '/' . $file->getClientOriginalName();
        } else {
            $data->image = "";
        }
        if ($data->save()) {
            return redirect('slide/index')->with('message', 'Thêm thành công !');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = SlideModel::where('id', '=', $id)->first();
        return view('slide.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SlideModel::find($id);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move('upload', $file->getClientOriginalName());
            $data->image = url('upload') . '/' . $file->getClientOriginalName();
        }
        if ($data->save()) {
            return redirect('slide/index')->with('message', 'Cập nhật thành công !');
        }
    }

    public function destroy($id)
    {
        SlideModel::find($id)->delete();
        return redirect('slide/index')->with('message', 'Xóa thành công !');
    }
}
