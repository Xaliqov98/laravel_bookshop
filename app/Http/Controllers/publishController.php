<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publish;

class publishController extends Controller
{
    public function index(){
        return view('admin.publishers');
    }

    public function getPublishers(){
        $publisher = Publish::all();

        return view('admin.publish-list', compact('publisher'));
    }

    public function save(Request $request){
        if($request->ajax()){
            $publisher = new Publish();
            $publisher->publisher = $request->publisher;
            $publisher->save();

            return response($publisher);
        }
    }

    public function update(Request $request){
        if($request->ajax()){
            $publisher = Publish::find($request->id);
            $publisher->publisher = $request->publisher;
            $publisher->update();
            return response($publisher);
        }
    }

    public function delete(Request $request){
        if($request->ajax()){
            Publish::destroy($request->id);
        }
    }
}
