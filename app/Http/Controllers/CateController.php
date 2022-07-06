<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CateController extends Controller
{
    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:category',
            'parent' => 'required',
        ],[
            'name.required' => 'Vui long nhap name',
            'name.unique' => 'Name bi trung',
            'parent.required' => 'Vui long nhap parent',
        ]);
        
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();

        DB::table('category')->insert($data);
        return redirect()->route('admin.category.index');
    }

    public function index() {
        $categorys = DB::table('category')->orderBy('created_at', 'DESC')->get();
        return view('admin.category.index', ['categorys' => $categorys]);
    }

    public function update(Request $request, $id) {
        $data = $request->except('_token');
        DB::table('category')->where('id', $id)->update($data);
        return redirect()->route('admin.category.index');
    }

    public function edit($id) {
        $edit = DB::table('category')->where('id', $id)->first();
        return view('admin.category.edit', ['id' => $id , 'edit' => $edit]);
    }

    public function delete ($id) {
        $delete = DB::table('category')->where('id', $id)->delete();
        return redirect()->route('admin.category.index');
    }
}
