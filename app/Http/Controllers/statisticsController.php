<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;
use App\Models\Expense;
use App\Models\Publish;
use App\Models\Seller;

class statisticsController extends Controller
{
    public function index(){

        $book_count = Book::count();
        $author_count = Author::count();
        $category_count = Category::count();
        $publish_count = Publish::count();
        $seller_count = Seller::count();
        $expense_count = Expense::count();

        $book = Book::get();
        $total_buy = 0;
        $total_sell = 0;
        $total_profit = 0;


        foreach ($book as $b) {
            $total_buy = ($total_buy + $b->buy_price);
            $total_sell = ($total_sell + $b->price);

            $total_profit = ($b->price - $b->buy_price)*$b->stock;
        }

        return view('admin.statistics' , ['book_count'=>$book_count , 'author_count'=>$author_count , 'category_count'=>$category_count , 'publish_count'=>$publish_count , 'seller_count'=>$seller_count , 'expense_count'=>$expense_count , 'total_buy'=>$total_buy , 'total_sell'=>$total_sell , 'total_profit'=>$total_profit]);


    }
}
