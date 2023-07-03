<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Expense extends Controller
{
    public function Expense_Receipt(){
        return view ('Expense.Expense_Receipt');
    }
}
