@extends('layouts.master')
@section('content')

    <div class="parallax-fixed col-xs-12">
        <div class="title-layers col-xs-12 col-md-4">
            <h1>HOPE</h1>
            <h2>Un nouvel espoir pour l'informatique</h2>
        </div>
    </div>
    <div class="summary">
        <div class="col-xs-12 col-md-6">
        <ul>
            <h2>Nos produits :</h2>
            @if(Session::get("id") > 0)
                <li><a href="{{ url('/listerArticles') }}/{{1}}">Bases de données</a></li>
                <li><a href="{{ url('/listerArticles') }}/{{2}}">Langages</a></li>
                <li><a href="{{ url('/listerArticles') }}/{{3}}">Développement web</a></li>
                <li><a href="{{ url('/listerArticles') }}/{{4}}">Réseaux</a></li>
                <li><a href="{{ url('/listerArticles') }}/{{5}}">Systèmes d'exploitation</a></li>
                <li><a href="{{ url('/listerArticles') }}/{{6}}">Modélisation</a></li>
            @else
                <li><a href="#">Bases de données</a></li>
                <li><a href="#">Langages</a></li>
                <li><a href="#">Développement web</a></li>
                <li><a href="#">Réseaux</a></li>
                <li><a href="#">Systèmes d'exploitation</a></li>
                <li><a href="#">Modélisation</a></li>
            @endif
        </ul>
        </div>

        <div class="col-xs-12 col-md-6">
            <ul>
                <h2>Notre équipe : </h2>
            </ul>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="text-center">
                            <img src="{{URL::asset('/images/chemoul.png')}}" alt="Léa Chemoul">
                            <h2>Léa Chemoul</h2>
                        </div>
                    </div>

                    <div class="item">
                        <div class="text-center">
                            <img src="{{URL::asset('/images/berger.png')}}" alt="Valentin Berger">
                            <h2>Valentin Berger</h2>
                        </div>
                    </div>

                    <div class="item">
                        <div class="text-center">
                            <img src="{{URL::asset('/images/cluniat.png')}}" alt="Philippine Cluniat">
                            <h2>Philippine Cluniat</h2>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        {{--<div class="col-xs-6">--}}
        {{--<ul>--}}
            {{--<h2>Notre équipe : </h2>--}}
            {{--<div>--}}
                {{--<li>Léa Chemoul</li>--}}
                {{--<img src="../public/images/chemoul.jpg" height="10%" width="10%">--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<li>Valentin Berger</li>--}}
                {{--<img src="../public/images/berger.jpg" height="30%" width="10%">--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<li>Philippine Cluniat</li>--}}
                {{--<img src="../public/images/cluniat.png" height="30%" width="10%">--}}
            {{--</div>--}}
        {{--</ul>--}}
        {{--</div>--}}
    </div>
@stop
