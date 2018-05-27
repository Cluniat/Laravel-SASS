@extends('layouts.well')

@section('wellTitle')
    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
    Mon panier
@stop

@section('wellContent')
    {!! Form::open(['url' => 'getPanier']) !!}
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <!--<th>Id</th>-->
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            @forelse($paniers as $panier)
            <tr>   
                <!--<td> {{ $panier->id_article }}  </td>-->
                <td> {{ $panier->titre }} </td>
                <td> {{ $panier->prix }}€ </td>
                <td style="text-align:center;">
                    <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#"
                       onclick="javascript:if (confirm('Suppression confirmée ?'))
                           { window.location ='{{ url('/deleteBasket') }}/{{ $panier->id_article }}'; }">
                    </a>
                </td>   
            </tr>
            @empty
                <tr><td colspan="4"> No data </td></tr>
            @endforelse
            <tr>
                <td colspan="2" style="text-align: right">Montant total</td>                    
                <td>{{ $total }}</td>
            </tr>             
        </table>
        <div>
            <a class="btn btn-primary" href="{{ url('/validBasket') }}"><span class="glyphicon glyphicon-log-in"></span> Valider panier</a>    
        </div>
        <div class="col-md-6 col-md-offset-3">
            @include('error')
        </div>
    {!! Form::close() !!}
@stop
