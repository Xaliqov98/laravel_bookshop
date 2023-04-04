<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;


class authorController extends Controller
{
    public function index(){
        return view('admin.authors');
    }

    public function getAuthors(){
        $author = Author::all();

        return view('admin.author-list', compact('author'));
    }

    public function save(Request $request){
        if($request->ajax()){
            $author = new Author();

            if($request->hasFile('image')){
                $file = time().'.'.$request->image->extension();
                $request->image->storeAs('public/images/authors',$file);
                $author->image = 'storage/images/authors/'.$file;
                
            }  

            $author->author = $request->author;
            $author->about = $request->about;
            $author->save();

            return response($author);
        }
    }

    public function update(Request $request){
        if($request->ajax()){
            $author = Author::find($request->id);

            if($request->hasFile('image')){
                $file = time().'.'.$request->image->extension();
                $request->image->storeAs('public/images/authors',$file);
                $author->image = 'storage/images/authors/'.$file;
                
            }  

            $author->author = $request->author;
            $author->about = $request->about;
            $author->update();
            return response($author);
        }
    }

    public function delete(Request $request){
        if($request->ajax()){
            Author::destroy($request->id);
        }
    }
}
