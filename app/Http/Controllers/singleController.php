<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publish;
use App\Models\Seller;

class singleController extends Controller
{
    public function index(Request $request,$id){

        $book = Book::join('authors','authors.id','=','books.author_id')
        ->join('categories','categories.id','=','books.category_id')
        ->join('publishes','publishes.id','=','books.publish_id')
        ->select('books.id','books.image','books.book','books.page','books.stock','books.language','books.publish_id','books.binding','books.price','books.about','books.created_at','books.category_id','books.code','books.author_id','authors.author','categories.category','publishes.publisher')
        ->find($id);

        return view('users.single',['book'=>$book]);


    }
}
