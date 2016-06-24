@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $email => $value)
                        <tr>
                            <td>{{$value['id']}}</td>
                            <td>{{$email}}</td>
                            <td>{{$value['name']}}</td>
                            <td>{{$value['profession']}}</td>
                            <td>
                                <form class="form-inline" role="form" action="{{ route('home') }}" method="post">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <button type="submit" class="btn btn-primary pull-right">Share Records</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection