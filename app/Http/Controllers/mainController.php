<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;

class mainController extends Controller
{
    public function index(){
        $book = Book::take(4)->get();

        return view('users.main',['book'=> $book]);
    }
}
