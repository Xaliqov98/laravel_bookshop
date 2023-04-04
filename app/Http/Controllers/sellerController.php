<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;
use App\Models\Seller;

class sellerController extends Controller
{
    public function index(){
        return view('admin.sellers');
    }

    public function getSellers(){
        $seller = Seller::all();

        return view('admin.seller-list', compact('seller'));
    }

    public function save(Request $request){
        if($request->ajax()){
            $seller = new Seller();
            $seller->seller = $request->seller;
            $seller->phone = $request->phone;
            $seller->email = $request->email;
            $seller->debt = $request->debt;
            $seller->save();

            return response($seller);
        }
    }

    public function update(Request $request){
        if($request->ajax()){
            $seller = Seller::find($request->id);
            $seller->seller = $request->seller;
            $seller->phone = $request->phone;
            $seller->email = $request->email;
            $seller->debt = $request->debt;
            $seller->update();
            return response($seller);
        }
    }

    public function delete(Request $request){
        if($request->ajax()){
            Seller::destroy($request->id);
        }
    }
}
