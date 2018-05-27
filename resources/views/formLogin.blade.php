@extends('layouts.form')

@section('formTitle')
    <i class="fa fa-sign-in" aria-hidden="true"></i>
    Authentification
@stop

@section('formContent')
    {!! Form::open(['url' => 'signIn']) !!}
        <div class="form-group flex-center">
            <label class="control-label">Identifiant : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="login" class="form-control" placeholder="Votre identifiant" required autofocus>
            </div>
        </div>
        <div class="form-group flex-center">
            <label class="control-label">Mot de passe : </label>
            <div class="col-md-6 col-md-3">
                <input type="password" name="pwd" ng-model="pwd" class="form-control" placeholder="Votre mot de passe" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3">
            @include('error')
        </div>
    {!! Form::close() !!}
@stop

