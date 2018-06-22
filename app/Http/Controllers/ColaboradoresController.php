<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColaboradoresController extends Controller
{
    public function insertColaboradores(Request $request)
    {
        $nome = $request->post('nome');
        $nif = $request->post('nif');
        $telefone = $request->post('telefone');
        $email = $request->post('email');

        $query = DB::table('colaboradores');
        try{
            $query->insert([
                'nome' => $nome,
                'nif' => $nif,
                'telefone' => $telefone,
                'email' => $email
            ]);

            return $this->selectColaboradores();
        }
        catch (QueryException $e){

            if($e->errorInfo[1] == '1062')
            {
                return redirect()->back()->withErrors(['error1' => 'Colaborador Já Existe']);
            }

        }
    }

    public function selectColaboradores()
    {
        $colaboradores = DB::table('colaboradores')->get()->all();

        return view('colaboradores', ['colabs' => $colaboradores]);
    }
}
