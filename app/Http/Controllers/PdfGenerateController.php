<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\modeles\Client;
use Illuminate\Http\Request;
use DB;
use PDF;
use Illuminate\Support\Facades\Session;
use App\modeles\Achete;


class PdfGenerateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $id_client = Session::get('id');
        $client = new Client();
        $clients = $client->getClient($id_client);
        $nom = $clients->identite_client;
        $nom = str_replace(' ', '_', $nom);

        $achat = new Achete();
        $achats = $achat->getAchatsFichiers($id_client);
        $erreur = Session::get('erreur');
        Session::forget('erreur');

        view()->share('achats',$achats);
        view()->share('erreur',$erreur);

        
        if($request->has('download')){
            // Set extra option
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
            $pdf = PDF::loadView('pdf');
            // download pdf
            return $pdf->download($nom.'_Achats.pdf');
        }
        return view('listeAchats');
    }

}
