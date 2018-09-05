@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Existing Account</div>
                <div class="panel-body">
                    @if (isset($customer))
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('edit_account_api') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">National ID Card (NIC) #</label>

                            <div class="col-md-6">
                                <input id="id" readonly type="number" class="form-control" name="id" placeholder="e.g. 1234567891011 (13 digits)" value="{{ $customer->id }}" required>
                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" placeholder="e.g. John (alphabet)" value="{{ $customer->first_name }}" required>
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" placeholder="e.g. Doe (alphabet)" value="{{ $customer->last_name }}" required>
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" placeholder="e.g. 3211234567 (10 digits)" value="{{ $customer->phone }}" required>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" placeholder="e.g. 221B Baker Street (string)" value="{{ $customer->address }}" required>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Account Type</label>

                            <div class="col-md-6">
                                <select id="type" class="form-control" name="type" required>
                                    <option {{ $customer->account->type == 0 ? 'selected' : '' }} value="0">Current</option>
                                    <option {{ $customer->account->type == 1 ? 'selected' : '' }} value="1">Savings</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                           </div>
                        </div>

                        <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                            <label for="balance" class="col-md-4 control-label">Balance</label>

                            <div class="col-md-6">
                                <input id="balance" type="number" readonly class="form-control" name="balance" placeholder="min: 1000 -> Current & 10000 -> Savings" value="{{ $customer->account->balance }}" required>
                                 @if ($errors->has('balance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('balance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input hidden name="find" value="1">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                    @elseif ($errors->has('first_name') || $errors->has('last_name') || $errors->has('phone') || $errors->has('address') || $errors->has('type') || $errors->has('balance'))
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('edit_account_api') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">National ID Card (NIC) #</label>

                            <div class="col-md-6">
                                <input id="id" readonly type="number" class="form-control" name="id" placeholder="e.g. 1234567891011 (13 digits)" value="{{ old('id') }}" required>
                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" placeholder="e.g. John (alphabet)" value="{{ old('first_name') }}" required>
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" placeholder="e.g. Doe (alphabet)" value="{{ old('last_name') }}" required>
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" placeholder="e.g. 3211234567 (10 digits)" value="{{ old('phone') }}" required>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" placeholder="e.g. 221B Baker Street (string)" value="{{ old('address') }}" required>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Account Type</label>

                            <div class="col-md-6">
                                <select id="type" class="form-control" name="type" required>
                                    <option {{ old('type') == 0 ? 'selected' : '' }} value="0">Current</option>
                                    <option {{ old('type') == 1 ? 'selected' : '' }} value="1">Savings</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                           </div>
                        </div>

                        <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                            <label for="balance" class="col-md-4 control-label">Starting Balance</label>

                            <div class="col-md-6">
                                <input id="balance" readonly type="number" class="form-control" name="balance" placeholder="min: 1000 -> Current & 10000 -> Savings" value="{{ old('balance') }}" required>
                                 @if ($errors->has('balance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('balance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input hidden name="find" value="1">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('edit_account_api') }}">
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
