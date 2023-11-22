<?php

use Illuminate\Support\Facades\Route;

Route::get('/cadastro-unidade', function () {
    return view('Painel.Pages.cadastroUnidade');
})->name('painel.cadastro-unidade');

Route::post('/cadastro-unidade/request', [App\Http\Controllers\cadastroUnidadeController::class, 'processRequest']);


Route::get('/cadastro-colaborador', function () {
    return view('Painel.Pages.cadastroColaborador');
})->name('painel.cadastro-colaborador');

Route::post('/cadasto-colaborador/request', [App\Http\Controllers\cadastroColaboradorController::class, 'processRequest']);




Route::get('/', function () {
    return view('Admin.index');
});
