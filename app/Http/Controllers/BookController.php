<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = DB::table("books")->get(); //query builder
        return view('book.list',compact('books'));
    }

    public function show($id)
    {
        $book = DB::table("books")->where("id",$id)->first(); //
        dd($book);
    }

    public function create()
    {
        return view('book.create');
    }

    public function destroy($id)
    {
        DB::table("books")->where("id",$id)->delete();
        return redirect()->route("book.index");
//        DB::table("books")->delete($id);
    }
}
