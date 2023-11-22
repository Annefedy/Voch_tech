<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginacaoController extends Controller
{
    public function paginar($sql, bool $paginar, int $per_page, int $page = 1)
    {
        $offset = ($page - 1) * $per_page;

        $ret = $sql
            ->when($paginar, function ($query) use ($per_page, $offset) {
                return $query->limit($per_page)
                    ->offset($offset);
            })
            ->get();

        return $ret;
    }
}