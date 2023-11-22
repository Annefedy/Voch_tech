<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use App\Models\Colaborador;
use App\Http\Controllers\PaginacaoController;
use Illuminate\Http\Request;
use Exception;


class cadastroUnidadeController extends Controller
{
    public function processRequest(Request $request)
    {

        if ($request->case) {
            switch ($request->case) {
                case 'addUnidade':
                    return $this->addUnidade($request);
                    break;

                case 'getUnidade':
                    return $this->getUnidade($request);
                    break;
            }
        }
    }

    public function addUnidade($request)
    {
        $return = ['status' => 'failure', 'error' => '', 'existe' => true];

        try {

            $id = Unidade::firstOrCreate(
                [
                    'nome_fantasia' => $request->nome_fantasia,
                    'razao_social' => $request->razao_social,
                    'cnpj' => $request->cnpj

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

    public function getUnidade($request)
    {
        $return = ['status' => 'failure', 'error' => ''];

        try {

            $terms = explode(' ', trim($request->search));

            $itens = Unidade::select([
                'nome_fantasia',  'razao_social', 'cnpj'
            ])

                ->when($terms != null, function ($query) use ($terms) {
                    foreach ($terms as $term) {
                        return $query->where('nome_fantasia', 'like', '%' . $term . '%');
                    }
                })

                ->orderBy('nome_fantasia', 'asc');
            $total = $itens->count();

            // $total = $itens;
            // $return['total'] = $total->count('id');
            $paginar = true;

            if ($request->all) {
                $por_pagina = 100;
            } else {
                $por_pagina = 10;
            }

            $pagina = $request->page ?? 1;
            $pg = new PaginacaoController();
            $lst = $pg->paginar($itens, $paginar, $por_pagina, $pagina);

            // Incluindo a contagem de colaboradores por unidade
            foreach ($lst as $unidade) {
                $colaboradoresCount = $unidade->colaboradores()->count();
                $unidade->total_colaboradores = $colaboradoresCount;
            }

            $return['total'] = $total;
            $return['pagina'] = $pagina;
            $return['por_pagina'] = $por_pagina;
            $return['unidades'] = $lst;
            $return['status'] = 'success';
        } catch (Exception $e) {

            $return['error'] = $e->getMessage();
        }
        return response(json_encode($return), 200)->header('Content-Type', 'application/json');
    }


    // public function getUnidade($request)
    // {
    //     $return = ['status' => 'failure', 'error' => ''];

    //     try {
    //         $terms = explode(' ', trim($request->search));

    //         $unidades = Unidade::select(['nome_fantasia', 'razao_social', 'cnpj'])
    //             ->when($terms != null, function ($query) use ($terms) {
    //                 foreach ($terms as $term) {
    //                     $query->where('nome_fantasia', 'like', '%' . $term . '%');
    //                 }
    //             })
    //             ->orderBy('nome_fantasia', 'asc')
    //             ->get();

    //         foreach ($unidades as $unidade) {
    //             $totalColaboradores = Colaborador::where('unidade_id', $unidade->id)->count();
    //             $unidade->total_colaboradores = $totalColaboradores;
    //         }

    //         $totalUnidades = $unidades->count();
    //         $paginar = true;

    //         if ($request->all) {
    //             $porPagina = 4;
    //         } else {
    //             $porPagina = 3;
    //         }

    //         $pagina = $request->page ?? 1;
    //         $pg = new PaginacaoController();
    //         $unidadesPaginadas = $pg->paginar($unidades, $paginar, $porPagina, $pagina);

    //         $return['pagina'] = $pagina;
    //         $return['por_pagina'] = $porPagina;
    //         $return['total_unidades'] = $totalUnidades;
    //         $return['unidades'] = $unidadesPaginadas;
    //         $return['status'] = 'success';
    //     } catch (Exception $e) {
    //         $return['error'] = $e->getMessage();
    //     }

    //     return response(json_encode($return), 200)->header('Content-Type', 'application/json');
    // }
}
