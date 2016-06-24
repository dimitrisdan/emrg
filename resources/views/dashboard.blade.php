@extends('layouts.app')

@section('content')

    @role('admin')
      @include('dashboard.admin')
    @endrole

    @role('doc')
        @include('dashboard.doctor')
    @endrole

    @role('pat')
        @include('dashboard.patient')
    @endrole

@endsection