
@extends('layouts.app')

@section('content')
    @include('admin.navbar')
    @yield('content')
    @include('admin.footer')
@endsection