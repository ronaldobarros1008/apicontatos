<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contato;

class ContatoController extends Controller
{
    public function status() {
        return ['status' => 'Ok'];
    }

    public function add(Request $request) {

        try{
            $contato = new Contato();

            $contato->nome = $request->nome;
            $contato->telefone = $request->telefone;
            $contato->email = $request->email;

            $contato->save();

            return ['retorno' => 'ok'];

        }catch(\Exception $erro){
            return ['retorno' => 'erro', 'details'=>$erro];
        }
    }

    public function list() {
        $contato = Contato::all();

        return $contato;
    }

    public function select($id) {
        $contato = Contato::find($id);

        return $contato;
    }
}


