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
                        @if(in_array($value['id'], $shared_doctor_ids))
                            <tr>
                                <td>{{$value['id']}}</td>
                                <td>{{$email}}</td>
                                <td>{{$value['name']}}</td>
                                <td>{{$value['profession']}}</td>
                                <td><label>Already Shared</label></td>
                            </tr>
                        @else
                            <tr>
                                <td>{{$value['id']}}</td>
                                <td>{{$email}}</td>
                                <td>{{$value['name']}}</td>
                                <td>{{$value['profession']}}</td>
                                <td>
                                    <form class="form-inline" role="form" action="{{ route('policy.create',[ 'patient_id' => Session::get('patient_id') ,'doctor_id'=> $value['id']]) }}" method="GET">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        <button type="submit" class="btn btn-primary pull-right">Share Records</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection