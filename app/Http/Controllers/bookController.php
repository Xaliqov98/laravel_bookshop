<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;
use App\Models\Expense;
use App\Models\Publish;
use App\Models\Seller;

class bookController extends Controller
{
    public function index(){

        $autdata = Author::all();
        $catdata = Category::all();
        $pubdata = Publish::all();
        $seldata = Seller::all();

        return view('admin.books', ['autdata' => $autdata , 'catdata' => $catdata , 'pubdata' => $pubdata , 'seldata' => $seldata]);
    }

    public function getBooks(){
        $book = Book::join('authors','authors.id','=','books.author_id')
                    ->join('categories','categories.id','=','books.category_id')
                    ->join('sellers','sellers.id','=','books.seller_id')
                    ->join('publishes','publishes.id','=','books.publish_id')
                    ->select('book','code','page','stock','binding','language','price','r_price','buy_price','discounted','author','category','seller','publisher','books.created_at','books.image','books.about','books.id')
                    ->orderBy('books.id','desc')
                    ->get();

        return view('admin.book-list', compact('book'));
    }

    public function save(Request $request){
        if($request->ajax()){
            $book = new Book();

            if($request->hasFile('image')){
                $file = time().'.'.$request->image->extension();
                $request->image->storeAs('public/images/books',$file);
                $book->image = 'storage/images/books/'.$file;
                
            }  

            $book->book = $request->book;
            $book->code = $request->code;
            $book->page = $request->page;
            $book->stock = $request->stock;
            $book->binding = $request->binding;
            $book->language = $request->language;
            $book->price = $request->price;
            $book->r_price = $request->r_price;
            $book->buy_price = $request->buy_price;
            $book->discounted = $request->discounted;
            $book->author_id = $request->author_id;
            $book->category_id = $request->category_id;
            $book->publish_id = $request->publish_id;
            $book->seller_id = $request->seller_id;
            $book->about = $request->about;
            $book->save();

            return response($book);
        }
    }

    public function update(Request $request){
        if($request->ajax()){
            $book = Book::find($request->id);

            if($request->hasFile('image')){
                $file = time().'.'.$request->image->extension();
                $request->image->storeAs('public/images/books',$file);
                $book->image = 'storage/images/books/'.$file;
                
            }  

            $book->book = $request->book;
            $book->code = $request->code;
            $book->page = $request->page;
            $book->stock = $request->stock;
            $book->binding = $request->binding;
            $book->language = $request->language;
            $book->price = $request->price;
            $book->r_price = $request->r_price;
            $book->buy_price = $request->buy_price;
            $book->discounted = $request->discounted;
            $book->author_id = $request->author_id;
            $book->category_id = $request->category_id;
            $book->publish_id = $request->publish_id;
            $book->seller_id = $request->seller_id;
            $book->about = $request->about;
            $book->update();
            return response($book);
        }
    }

    public function delete(Request $request){
        if($request->ajax()){
            Book::destroy($request->id);
        }
    }
}
