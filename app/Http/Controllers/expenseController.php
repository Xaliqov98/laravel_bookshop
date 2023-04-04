<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class expenseController extends Controller
{
    public function index(){
        return view('admin.expenses');
    }

    public function getExpenses(){
        $expense = Expense::all();

        return view('admin.expense-list', compact('expense'));
    }

    public function save(Request $request){
        if($request->ajax()){
            $expense = new Expense();
            $expense->expense = $request->expense;
            $expense->exp_price = $request->exp_price;
            $expense->save();

            return response($expense);
        }
    }

    public function update(Request $request){
        if($request->ajax()){
            $expense = Expense::find($request->id);
            $expense->expense = $request->expense;
            $expense->exp_price = $request->exp_price;
            $expense->update();
            return response($expense);
        }
    }

    public function delete(Request $request){
        if($request->ajax()){
            Expense::destroy($request->id);
        }
    }
}
