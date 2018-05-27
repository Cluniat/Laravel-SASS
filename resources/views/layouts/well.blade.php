@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="col-xs-12 well text-center marginTopBar">
            <h2>
                @yield('wellTitle')
            </h2>
            @yield('wellContent')
        </div>
    </div>
@stop


