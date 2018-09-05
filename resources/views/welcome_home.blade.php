@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <ul class="menu" role="menu">
                        <li> <a href="{{ route('home') }}">Home</a> </li>
                        <li> <a href="{{ route('new_account_page') }}">Add new account</a> </li>
                        <li> <a href="{{ route('edit_account_page') }}">Edit existing account</a> </li>
                        <li> <a href="{{ route('debit_account_page') }}">Debit an account</a> </li>
                        <li> <a href="{{ route('credit_account_page') }}">Credit an account</a> </li>
                        <li> <a href="{{ route('view_balance_page') }}">View account balance</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
