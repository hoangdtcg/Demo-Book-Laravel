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
        return redirect()->route('category.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        DB::table("categories")->delete($id);
        return redirect()->route('category.index');
    }
}
