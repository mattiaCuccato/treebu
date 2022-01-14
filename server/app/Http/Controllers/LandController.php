<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class LandController extends Controller
{
    //VIEW ALL LANDS WITH DESC
    public function view_lands(){
        $land = Land::orderBy('created_at', 'DESC')->get();
        return $land;
    }

    //VIEW ALL LANDS WITH DESC DIMENSIONE
    public function view_lands_dimensione_desc(){
        $land = Land::orderBy('dimensione', 'DESC')->get();
        return $land;
    }

    //VIEW ALL LANDS WITH ASC DIMENSIONE
    public function view_lands_dimensione_asc(){
        $land = Land::orderBy('dimensione', 'ASC')->get();
        return $land;
    }

    //DETAIL LAND
    public function detail_land($id){
        $land = Land::find($id);
        return $land;
    }

    //INSERT NEW OFFER
    public function insert_land(Request $request){
        $data = json_decode($request->getContent());
        $newLand = new Land();

        $newLand->comune = $data->comune;
        $newLand->foto = $data->foto;
        $newLand->dimensione = $data->dimensione;
        $newLand->foglio_catastale = $data->foglio_catastale;
        $newLand->mappa_catastale = $data->mappa_catastale;
        $newLand->parcella_catastale = $data->parcella_catastale;
        $newLand->tipologia_terreno = $data->tipologia_terreno;
        $newLand->tipo_arrigazione = $data->tipo_arrigazione;
        $newLand->tipo_offerta = $data->tipo_offerta;
        $newLand->canone_offerta = $data->canone_offerta;
        $newLand->disponibile_subito = $data->disponibile_subito;

        $newLand->save();
        return response()->json([
            'message' => $newLand,
            'status' => '201'
        ]);
    }

    //MODIFY OFFER
    public function update_land(Request $request, $id){
        $data = json_decode($request->getContent());
        $land = Land::find($id);

        $land->comune = $data->comune;
        $land->foto = $data->foto;
        $land->dimensione = $data->dimensione;
        $land->foglio_catastale = $data->foglio_catastale;
        $land->mappa_catastale = $data->mappa_catastale;
        $land->parcella_catastale = $data->parcella_catastale;
        $land->tipologia_terreno = $data->tipologia_terreno;
        $land->tipo_arrigazione = $data->tipo_arrigazione;
        $land->tipo_offerta = $data->tipo_offerta;
        $land->canone_offerta = $data->canone_offerta;
        $land->disponibile_subito = $data->disponibile_subito;
        
        $land->save();
        return response()->json([
            'message' => $land,
            'status' => '201'
        ]);
    }

    //DELETE OFFER
    public function delete_land($id){
        $destroyLand = Land::destroy($id);
        return response()->json([
            'message' => $destroyLand,
            'status' => '200'
        ]);
    }
}
