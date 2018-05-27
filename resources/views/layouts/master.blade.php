<!doctype html>
<html lang="fr">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('css/app.css') !!}
        {!! Html::style('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}
	    <link rel="shortcut icon" type="image/png" href="{{URL::asset('/images/logo.png')}}"/>
		<title>HOPE - Un nouvel espoir pour l'informatique</title>
    </head>
    <body class="body">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar+ bvn"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">HOPE</a>
                </div>
                @if(Session::get("id") == 0)
                <div class="collapse navbar-collapse" id="navbar-collapse-target">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ url('/getLogin') }}" data-toggle="collapse" data-target=".navbar-collapse.in">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                Se connecter
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
                @if(Session::get("id") > 0)
                <div class="collapse navbar-collapse" id="navbar-collapse-target">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ url('/getRecherche') }}" data-toggle="collapse" data-target=".navbar-collapse.in">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                Rechercher
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/getAchats') }}" data-toggle="collapse" data-target=".navbar-collapse.in">
                                <i class="fa fa-archive" aria-hidden="true"></i>
                                Mes articles
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/getCompte') }}" data-toggle="collapse" data-target=".navbar-collapse.in">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                Mon compte
                            </a>
                        </li>
                        @if (Session::get('basket'))
                            <li>
                                <a href="{{ url('/getBasket') }}" data-toggle="collapse" data-target=".navbar-collapse.in">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    Panier
                                </a>
                            </li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ url('/signOut') }}" data-toggle="collapse" data-target=".navbar-collapse.in">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                Se déconnecter
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </div><!--/.container-fluid -->
        </nav>

        <div class="content">
            @yield('content')
        </div>

        <div class="footer col-xs-12">
            <div class="col-xs-12 col-md-3">
                <ul>
                    <h2>Nous contacter :</h2>
                    <li>contact@hope.fr</li>
                    <li>111 Boulevard latarjet</li>
                    <li>69100 VILLEURBANNE</li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-2">
                <br/>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2782.6054016174758!2d4.867741015309186!3d45.77909782039734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ea98dfed2c95%3A0x42814326f31f2151!2s111+Boulevard+Andr%C3%A9+Latarjet%2C+69100+Villeurbanne!5e0!3m2!1sen!2sfr!4v1523888601382" width="230" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-xs-12 col-md-4">
                <ul>
                    <h2>Moyens de paiement : </h2>
                    <img src="{{URL::asset('/images/CB.png')}}" height="30%" width="30%">
                </ul>
            </div>
            <div class="col-xs-12 col-md-3">
                <ul>
                    <h2>Nous suivre : </h2>
                    <i class="fa fa-facebook-square"></i>
                    <i class="fa fa-twitter-square"></i>
                    <i class="fa fa-linkedin"></i>
                    <i class="fa fa-snapchat-square"></i>
                </ul>
            </div>
        </div>
    {!! Html::script('assets/js/jquery_v3.3.1.min.js') !!}
    {!! Html::script('assets/js/bootstrap.js') !!}
    </body>
</html>
