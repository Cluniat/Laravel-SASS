@extends('layouts.well')

@section('wellTitle')
    <i class="fa fa-archive" aria-hidden="true"></i>
    Liste des articles du domaine {{ $domaine->libdomaine }}
@stop

@section('wellContent')
    {!! Form::open(['url' => 'getArticles']) !!}
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <!--<th>Id</th>-->
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Résumé</th>
                    <th>Panier</th>
                </tr>
            </thead>
            @forelse($articles as $article)
            <tr>   
                <!--<td> {{ $article->id_article }} </td>-->
                <td> {{ $article->titre }} </td>
                <td> {{ $article->prix }}€ </td>
                <td style="text-align:center;"><a href="{{ url('/getArticle') }}/{{ $article->id_article }}">
                        <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Résumé"></span></a></td>
                <td style="text-align:center;">
                        <a href="{{ url('/addBasket') }}/{{ $article->id_article }}">
                        <span class="glyphicon glyphicon-shopping-cart" data-toggle="tooltip" data-placement="top" title="Panier"></span></a></td>
                </td>                    
            </tr>
            @empty
                <tr><td colspan="5"> No data </td></tr>
            @endforelse
        </table>
        <div class="col-md-6 col-md-offset-3">
            @include('error')
        </div>
    {!! Form::close() !!}
@stop
