@extends('layouts.app')

@section('title')
    Welcome!
@endsection

@section('content')

    @include('includes.message-block')
    <div class="row">
        <div class="col-md-4 col-md-offset-2">

            <h3>Sign Up</h3>

            <form class="form-group" action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('name') }}">
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="last_name">Last Name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ Request::old('name') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Your password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin">Administrator</option>
                        <option value="doc">Doctor</option>
                        <option value="pat" selected>Patient</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-4">
            <h3>Sign In</h3>
            <form class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" action="{{ route('signin') }}" method="post">
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Your password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
