<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;

class categoryController extends Controller
{
    public function index(){
        return view('admin.categories');
    }

    public function getCategories(){
        $category = Category::all();

        return view('admin.category-list', compact('category'));
    }

    public function save(Request $request){
        if($request->ajax()){
            $category = new Category();
            $category->category = $request->category;
            $category->save();

            return response($category);
        }
    }

    public function update(Request $request){
        if($request->ajax()){
            $category = Category::find($request->id);
            $category->category = $request->category;
            $category->update();
            return response($category);
        }
    }

    public function delete(Request $request){
        if($request->ajax()){
            Category::destroy($request->id);
        }
    }
}
