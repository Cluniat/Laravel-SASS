@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="col-xs-12 well text-center marginTopBar">
            <h1>
                @yield('formTitle')
            </h1>
            <div class="form-horizontal">
                @yield('formContent')
            </div>
        </div>
    </div>
@stop


