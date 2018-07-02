<?php

namespace App\Http\Controllers;
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

    public function deleteColaboradores($id)
    {
        DB::table('colaboradores')->where('id', '=',$id)->delete();
        return redirect("colaboradores");
    }

    public function updateColaboradores(Request $response, $id)
    {
        $nome = $response->post('nome');
        $nif = $response->post('nif');
        $telefone = $response->post('telefone');
        $email = $response->post('email');

        DB::table('colaboradores')->where('id', '=', $id)->update([
            'nome' => $nome,
            'nif' => $nif,
            'telefone' => $telefone,
            'email' => $email
        ]);
        return redirect("colaboradores");
    }
}
