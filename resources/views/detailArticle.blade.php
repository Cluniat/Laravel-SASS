@extends('layouts.well')

@section('wellTitle')
    <i class="fa fa-info" aria-hidden="true"></i>
    Détail article
@stop

@section('wellContent')
    {!! Form::open(['url' => 'getArticle', 'files' => true]) !!}
    <div class="form-horizontal">
        <!--<div class="form-group">
            <label class="col-md-3 control-label">N° : </label>
            <div class="col-md-8">
                <label class="control-label">{{ $article->id_article }} </label>
            </div>
        </div>-->
        <div class="form-group">
            <label class="col-md-3 control-label">Titre : </label>
            <div class="col-md-8 text-left">
                <label class="control-label">{{ $article->titre }} </label>
            </div>
        </div>          
        <div class="form-group">
            <label class="col-md-3 control-label">Résumé : </label>
            <div class="col-md-8 text-left">
                <label >{{ $article->resume }} </label>
            </div>
        </div>        
        <div class="form-group">
            <label class="col-md-3 control-label">Prix : </label>
            <div class="col-md-8 text-left">
                <label class="control-label">{{ $article->prix }}€</label>
            </div>
        </div> 
        <div class="form-group">
            <label class="col-md-3 control-label">Date publication : </label>
            <div class="col-md-8 text-left">
                <label class="control-label">{{ $article->date_article }} </label>
            </div>
        </div>         
        <div class="form-group">
            <label class="col-md-3 control-label">Domaine : </label>
            <div class="col-md-8 text-left">
                <label class="control-label">{{ $article->id_domaine }} </label>
            </div>
        </div>    
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ url('/listerArticles')}}/{{ $article->id_domaine }}" ><button type="button" class="btn btn-default btn-primary"> Retour</button></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ url('/addBasket')}}/{{ $article->id_article }}" ><button type="button" class="btn btn-default btn-primary"> Acquérir</button></a>
            </div> 
        </div> 
        <div class="form-group">

        </div>        
        <div class="col-md-6 col-md-offset-3">
            @include('error')
        </div>
    </div>
{!! Form::close() !!}
@stop

