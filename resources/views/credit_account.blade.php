@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Credit An Account</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('credit_account_api') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }} {{ session('error_account') ? ' has-error': '' }}">
                            <label for="id" class="col-md-4 control-label">Customer NIC #</label>

                            <div class="col-md-6">
                                <input id="id" type="number" class="form-control" name="id" placeholder="e.g. 1234567891011 (13 digits)" value="{{ old('id') }}" required>
                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                                @if (session('error_account'))
                                    <span class="help-block">
                                        <strong>{{ session('error_account') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" placeholder="e.g. 1000" value="{{ old('amount') }}" required>
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input hidden name="type" value="1">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Credit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
