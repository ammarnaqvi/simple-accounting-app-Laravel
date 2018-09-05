<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Account;
use App\Transaction;

class BankingSystemController extends Controller
{
    public function new_account(Request $request)
    {

    	$this->validate($request, [
        	'id' => 'required|unique:customers|digits:13',
        	'first_name' => 'required|alpha',
        	'last_name' => 'required|alpha',
        	'phone' => 'required|unique:customers|digits:10',
        	'address' => 'required|string',
        	'type' => 'required|boolean',
    	]);

    	if ($request->type == 0) {
    		$this->validate($request, [
    			'balance' => 'required|integer|min:1000'
    		]);    			
    	}
    	else {
    		$this->validate($request, [
    			'balance' => 'required|integer|min:10000'
    		]);    			
    	}

    	$customer = new Customer;
    	$customer->id = $request->id;
    	$customer->first_name = $request->first_name;
    	$customer->last_name = $request->last_name;
    	$customer->phone = $request->phone;
    	$customer->address = $request->address;

    	$account = new Account;
    	$account->customer_id = $request->id;
    	$account->type = $request->type;
    	$account->balance = $request->balance;

    	$customer->save();
    	$account->save();

        return redirect('/')->with('success', 'New account created successfully!');
    }

    public function edit_account(Request $request)
    {
    	if ($request->find == 0) {

	    	$this->validate($request, [
	        	'id' => 'required|digits:13',
	    	]);

	    	$customer = Customer::find($request->id);

	    	if (is_null($customer)) {
	    		return redirect()->route('edit_account_page')->with('error', 'Account does not exist!');
	    	}

	    	return view('edit_account')->with('customer', $customer);
    	}
    	elseif ($request->find == 1) {

	    	$this->validate($request, [
	        	'id' => 'required|digits:13',
	        	'first_name' => 'required|alpha',
	        	'last_name' => 'required|alpha',
	        	'phone' => 'required|digits:10',
	        	'address' => 'required|string',
	        	'type' => 'required|boolean',
	    		'balance' => 'required|integer',
	    	]);

	    	$customer = Customer::find($request->id);

	    	if (is_null($customer)) {
	    		return redirect()->route('edit_account_page')->with('error', 'Account does not exist!');
	    	}

	    	$customer->id = $request->id;
	    	$customer->first_name = $request->first_name;
	    	$customer->last_name = $request->last_name;
	    	$customer->phone = $request->phone;
	    	$customer->address = $request->address;

	    	$customer->account->customer_id = $request->id;
	    	$customer->account->type = $request->type;
	    	$customer->account->balance = $request->balance;

    		$customer->save();
			$customer->account->save();

        	return redirect('/')->with('success', 'Account updated successfully!');
    	}
    }

    public function debit_account(Request $request)
    {

    	$this->validate($request, [
        	'id' => 'required|digits:13',
        	'amount' => 'required|integer',
        	'type' => 'required|boolean',
    	]);

    	$customer = Customer::find($request->id);

	    if (is_null($customer)) {
	    	return redirect()->route('debit_account_page')->with('error_account', 'Account does not exist!');
	    }

    	$transaction = new Transaction;
    	$transaction->account_id = $customer->account->id;
    	$transaction->type = $request->type;

    	$customer->account->balance -= $request->amount;

    	if ($customer->account->type == 1 && $customer->account->balance < 5000) {
    		$customer->account->balance += $request->amount;
	    	return redirect()->route('debit_account_page')->with('error_transaction', 'Debit transaction Failed! Savings account balance cannot be below 5000! Available balance: ' . $customer->account->balance);    		
    	}
    	else if ($customer->account->balance < 0) {
    		$customer->account->balance += $request->amount;
	    	return redirect()->route('debit_account_page')->with('error_transaction', 'Debit transaction Failed! Current balance insuffient for transaction! Available balance: ' . $customer->account->balance);
    	}

    	//$transaction->amount = $request->amount;
    	$transaction->save();
		$customer->account->save();

        return redirect('/')->with('success', 'Debit transaction completed successfully!');
    }

    public function credit_account(Request $request)
    {

    	$this->validate($request, [
        	'id' => 'required|digits:13',
        	'amount' => 'required|integer',
        	'type' => 'required|boolean',
    	]);

    	$customer = Customer::find($request->id);

	    if (is_null($customer)) {
	    	return redirect()->route('credit_account_page')->with('error_account', 'Account does not exist!');
	    }

    	$transaction = new Transaction;
    	$transaction->account_id = $customer->account->id;
    	$transaction->type = $request->type;

    	$customer->account->balance += $request->amount;

    	//$transaction->amount = $request->amount;
    	$transaction->save();
		$customer->account->save();

        return redirect('/')->with('success', 'Debit transaction completed successfully!');
    }

    public function view_balance(Request $request)
    {
    	$this->validate($request, [
        	'id' => 'required|digits:13',
    	]);

    	$customer = Customer::find($request->id);

    	if (is_null($customer)) {
    		return redirect()->route('view_balance_page')->with('error', 'Account does not exist!');
    	}

    	return view('view_balance')->with('customer', $customer);
    }
}
