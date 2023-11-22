<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Unidade;
use App\Models\Cargo;
use Exception;

use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function processRequest(Request $request)
    {

        if ($request->case) {
            switch ($request->case) {

                case 'getCargos':
                    return $this->getCargos($request);
                    break;

                case 'addColaborador':
                    return $this->addColaborador($request);
                    break;

                case 'getColaborador':
                    return $this->getColaborador($request);
                    break;
            }
        }
    }

    public function addColaborador($request)
    {
        $return = ['status' => 'failure', 'error' => '', 'existe' => true];

        try {

            $id = Colaborador::firstOrCreate(
                [
                    'nome' => $request->nome,
                    'cpf' => $request->cpf,
                    'email' => $request->email

                ]
            );

            if ($id->wasRecentlyCreated) {

                $return['existe'] = false;
            }
            $return['id'] = $id->id;

            $return['status'] = 'success';
        } catch (Exception $e) {

            $return['error'] = $e->getMessage();
        }
        return response(json_encode($return), 200)->header('Content-Type', 'application/json');
    }

    public function getColaborador($request)
    {
        $return = ['status' => 'failure', 'error' => ''];

        try {
            $terms = explode(' ', trim($request->search));

            $itens = Colaborador::select([
                'id', 'nome', 'cpf', 'email'
            ])

                ->when($terms != null, function ($query) use ($terms) {
                    foreach ($terms as $term) {
                        return $query->where('nome', 'ilike', '%' . $term . '%');
                    }
                })

                ->orderBy('nome', 'asc');


            $total = $itens;
            $return['total'] = $total->count('id');
            $paginar = true;

            if ($request->all) {
                $por_pagina = 100;
            } else {
                $por_pagina = 10;
            }

            $pagina = $request->page ?? 1;
            $pg = new PaginacaoController();
            $lst = $pg->paginar($itens, $paginar, $por_pagina, $pagina);


            $return['pagina'] = $pagina;
            $return['por_pagina'] = $por_pagina;
            $return['colaboradores'] = $lst;
            $return['status'] = 'success';
        } catch (Exception $e) {

            $return['error'] = $e->getMessage();
        }
        return response(json_encode($return), 200)->header('Content-Type', 'application/json');
    }


    public function getCargos($request)
    {
        $return = ['status' => 'failure', 'error' => ''];

        try {

            $return['cargos'] = Cargo::select("id", "cargo")
                ->orderBy('cargo', 'asc')
                ->get();

            $return['status'] = 'success';
        } catch (Exception $e) {

            $return['error'] = $e->getMessage();
        }
        return response(json_encode($return), 200)->header('Content-Type', 'application/json');
    }
}
