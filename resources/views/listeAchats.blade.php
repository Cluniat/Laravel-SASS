@extends('layouts.well')
@section('wellTitle')
    <i class="fa fa-archive" aria-hidden="true"></i>
    Liste de mes achats
@stop
@section('wellContent')
    {!! Form::open(['url' => 'getAchats']) !!}
    <table class="table table-bordered table-striped table-responsive">
        <thead>
            <tr>
                <!--<th>Id</th>-->
                <th>Titre</th>
                <th>Domaine</th>
                <th>Date achat</th>
                <th>PDF</th>
            </tr>
        </thead>
        @forelse($achats as $achat)
        <tr>
            <!--<td> {{ $achat->id_article }} </td>-->
            <td> {{ $achat->titre }} </td>
            <td> {{ $achat->libdomaine }} </td>
            <td> {{ $achat->date_achat }} </td>
            <td> <a href="./pdf/{{ $achat->fichier }}" title="Pdf">Download the pdf here </a> </td>
        </tr>
        @empty
            <tr><td colspan="5"> No data </td></tr>
        @endforelse
    </table>
    <h2><a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a></h2>
        @include('error')
    {!! Form::close() !!}
@stop