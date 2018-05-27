<!doctype html>
<html lang="fr">
<head>
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('css/app.css') !!}
    {!! Html::style('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}
</head>
<body class="body">
    <div class="container">
        <div class="col-xs-12 text-center marginTopBar">
            <h2 class="text-center">
                <i class="fa fa-archive" aria-hidden="true"></i>
                Liste de mes achats
            </h2>
            {!! Form::open(['url' => 'getAchats']) !!}
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <!--<th>Id</th>-->
                    <th>Titre</th>
                    <th>Domaine</th>
                    <th>Date achat</th>
                </tr>
                </thead>
                @forelse($achats as $achat)
                    <tr>
                    <!--<td> {{ $achat->id_article }} </td>-->
                        <td> {{ $achat->titre }} </td>
                        <td> {{ $achat->libdomaine }} </td>
                        <td> {{ $achat->date_achat }} </td>
                    </tr>
                @empty
                    <tr><td colspan="5"> No data </td></tr>
                @endforelse
            </table>
            {!! Form::close() !!}
        </div>
    </div>
</body>
</html>