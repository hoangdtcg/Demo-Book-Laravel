<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table("categories")->get(); //query builder
        return view('category.list',compact('categories'));
    }


    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $request->only('name','content');
        DB::table("categories")->insert($data);
        return redirect()->route('categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = DB::table("categories")->where("id",$id)->first();
        return view('category.update', compact(['id','category']));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('name','content');
        $update = DB::table('categories')->where("id",$id)->update($data);
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        DB::table("categories")->delete($id);
        return redirect()->route('categories.index');
    }
}
