<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function showAll()
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
}
