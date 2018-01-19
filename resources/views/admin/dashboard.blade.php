@inject('dashboard', 'App\Admin\Dashboard')
@extends('layouts.admin')
    @section('content')
        @foreach ($dashboard->items() as $view)
            @include("admin.dashboard.$view")
        @endforeach
    @endsection

