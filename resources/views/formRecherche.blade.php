@extends('layouts.form')

@section('formTitle')
    <i class="fa fa-search" aria-hidden="true"></i>
    Recherche d'articles
@stop

@section('formContent')
    {!! Form::open(['url' => 'listerArticles']) !!}
        <div class="form-group flex-center">
            <label class="col-md-2 control-label">Domaine : </label>
            <div class="col-md-3">
                <select class="form-control" name="cbDomaine" required>
                    <OPTION VALUE=0>Sélectionner un domaine</option>
                    @foreach($domaines as $domaine)
                        <option value="{{$domaine->id_domaine}}"> {{ $domaine ->libdomaine }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
            <div>

            </div>
        </div>
        <div class="col-md-6 col-md-offset-3">
            @include('error')
        </div>
    {!! Form::close() !!}
@stop
