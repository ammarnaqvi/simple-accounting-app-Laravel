@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View Account Balance</div>
                <div class="panel-body">
                    @if (isset($customer))
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('view_balance_api') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="id" class="col-md-4 control-label">National ID Card (NIC) #</label>

                            <div class="col-md-6">
                                <input id="id" disabled type="number" class="form-control" name="id" placeholder="e.g. 1234567891011 (13 digits)" value="{{ $customer->id }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Account Type</label>

                            <div class="col-md-6">
                                <select id="type" disabled class="form-control" name="type" required>
                                    <option {{ $customer->account->type == 0 ? 'selected' : '' }} value="0">Current</option>
                                    <option {{ $customer->account->type == 1 ? 'selected' : '' }} value="1">Savings</option>
                                </select>
                           </div>
                        </div>

                        <div class="form-group">
                            <label for="balance" disabled class="col-md-4 control-label">Balance</label>

                            <div class="col-md-6">
                                <input id="balance" type="number" disabled class="form-control" name="balance" placeholder="min: 1000 -> Current & 10000 -> Savings" value="{{ $customer->account->balance }}" required>
                            </div>
                        </div>
                    </form>
                    @else
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('view_balance_api') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }} {{ session('error') ? ' has-error': '' }}">
                            <label for="id" class="col-md-4 control-label">National ID Card (NIC) #</label>

                            <div class="col-md-6">
                                <input id="id" type="number" class="form-control" name="id" placeholder="e.g. 1234567891011 (13 digits)" value="{{ old('id') }}" required>
                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                                @if (session('error'))
                                    <span class="help-block">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input hidden name="find" value="0">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Find
                                </button>
                            </div>
                        </div>
                    </form>                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
