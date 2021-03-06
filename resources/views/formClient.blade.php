@extends('layouts.form')

@section('formTitle')
    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
    Mon compte
@stop

@section('formContent')
    {!! Form::open (['url' => 'validerCompte', 'files' => true]) !!}
    <div class="form-horizontal">
    <div class="form-group">
        <label class="col-md-3 control-label">Identité : </label>
        <div class="col-md-3">
            <input type="text" name="identite" class="form-control"  value="{{ $client->identite_client or '' }}" placeholder="Prénom et nom" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Adresse : </label>
        <div class="col-md-6">
            <input type="text" name="adresse"  class="form-control" value="{{ $client->adresse_client }}" placeholder="Votre adresse" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Crédit : </label>
        <div class="col-md-3 text-left">
            <label class="control-label">{{ $client->credits }} </label>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Catégorie : </label>
        <div class="col-md-3">
            <select class='form-control' name='cbCategorie' required>
                <OPTION VALUE=0>Sélectionner une catégorie</option>
                @foreach($categories as $categorie)
                    selected="";
                    <option value="{{ $categorie->id_categorie }}"
                            @if($categorie->id_categorie == $client->id_categorie)
                            selected="selected"
                            @endif
                    >{{$categorie->libcategorie}} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Identifiant : </label>
        <div class="col-md-2">
            <input type="text" name="login" class="form-control" value="{{ $client->login_client }}" placeholder="Votre identifiant" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Mot de passe : </label>
        <div class="col-md-2">
            <input type="password" name="pwd" ng-model="pwd" class="form-control" value="{{ $client->pwd_client }}" placeholder="Votre mot de passe" required>
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
</div>
{!!  Form::close() !!}
@stop
