@extends('layouts.app')

@section('title')
    Welcome!
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create new Guardian</div>

                <div class="panel-body">
                    <form class="form-group" action="{{ route('guardian.create') }}" method="post">
                        <div class="form-group">
                            <label for="role">Guardian's Role</label>
                            <select class="form-control" name="role" id="role" style="width:100px;">
                                <option value="legal">Legal: </option>
                                <option value="contact">Contact</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name: </label>
                            <input class="form-control" type="text" name="firstname" id="firstname">
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name: </label>
                            <input class="form-control" type="text" name="lastname" id="lastname" value="">
                        </div>

                        <div class="form-group">
                            <label for="telephone">Telephone: </label>
                            <input class="form-control" type="text" name="telephone" id="telephone" value="">
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail: </label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ $guardian->guardian_email }}">
                        </div>

                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                        <button type="submit" class="btn btn-primary">Edit Guardian</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection