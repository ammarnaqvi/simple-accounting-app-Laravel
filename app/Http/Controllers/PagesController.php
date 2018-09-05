<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(Request $request)
    {
        return view('welcome_home');
    }

    public function new_account(Request $request)
    {
    	return view('new_account');
    }

    public function edit_account(Request $request)
    {
    	return view('edit_account');
    }

    public function debit_account(Request $request)
    {
    	return view('debit_account');
    }

    public function credit_account(Request $request)
    {
    	return view('credit_account');
    }

    public function view_balance(Request $request)
    {
    	return view('view_balance');
    }
}
