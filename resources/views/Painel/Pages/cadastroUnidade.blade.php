@extends('Painel.Layout.index')
@section('content')
<style>
    .div-modal-title {
        font-family: 'Nunito';
        font-weight: 700;
        font-size: 24px;
        color: #000;
    }

    .validation-nome_fantasia,
    .validation-razao_social,
    .validation-cnpj {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 600 !important;
        font-size: 14px;
        line-height: 20px;
        color: #dc3545;
    }

    .table-hover tr th {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 400;
        font-size: 12.191px;
        line-height: 17px;
        color: #231F20;
    }

    .table-hover tr {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 400;
        font-size: 13.3132px;
        line-height: 18px;
        align-items: center;
        color: #383637;
    }


    label.btn-check {
        margin-top: -9px;
    }
</style>


<!-- Main content -->


<section class="content">


    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm">

                <div class="float-sm-left div-filtro-btn mb-3">
                    <div class="input-group flex-nowrap input-busca-default">
                        <div class="input-group-prepend">
                            <span class="addon-busca-default" id="default-search">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <input type="text" class="input-busca-top" name="searchUnidades" id="searchKits" placeholder="Pesquisar rápida">
                    </div>
                </div>

                <div class="float-sm-right">
                    @component('Painel.Components.paginacao-padrao', [
                    'total' => 1,
                    'pagina' => 1,
                    'por_pagina' => 1,
                    ])
                    @endcomponent
                </div>

                <a id="btnAddUnidades" href="javascript:void(0)" data-toggle="modal" data-target="#modalAddUnidade" class="float-sm-right btn btn-form-active btn-float-left-mobile">Cadastro de Unidades</a>


            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="content-list">
            <div class="row">
                <div class="col-sm">
                    <div class="bl-vte">

                        <div class="table-responsive-sm">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome Fantasia</th>
                                        <th scope="col">Razão Social</th>
                                        <th scope="col">CNPJ</th>
                                        <th scope="col">Total de Colaboradores</th>
                                    </tr>
                                </thead>
                                <tbody id="listUnidades"></tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modals -->
    <div class="modal fade" id="modalAddUnidade" aria-labelledby="modalAddUnidade" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-border-bottom">
                    <div class="div-modal-title">Cadastro de Unidade</div>
                </div>
                <div class="modal-body">

                    <div class="row mt-2">
                        <div class="col-sm">
                            <div class="form-group form-bl">
                                <label class="titulo-txt">Nome Fantasia:</label>
                                <input type="text" class="form-control" name="nome_fantasia" id="nome_fantasia" placeholder="Digite o nome da fantasia">
                                <div class="validation-nome_fantasia" style="display:none;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm">
                            <div class="form-group form-bl">
                                <label class="titulo-txt">Razão Social:</label>
                                <input type="text" class="form-control" name="razao_social" id="razao_social" placeholder="Digite o razao social">
                                <div class="validation-razao_social" style="display:none;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm">
                            <div class="form-group form-bl">
                                <label class="titulo-txt">CNPJ:</label>
                                <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="Digite o CNPJ">
                                <div class="validation-cnpj" style="display:none;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-2">
                        <button id="addUnidade" type="button" class="btn btn-form-active">Cadastrar</button>
                        <button id="clean" type="button" class="btn btn-form-outline" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- /modals -->

</section>
<!-- /.content -->
<script type="text/javascript" src="{{ asset('/js/paginacao.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/gerenciar-cadastro-unidade.js') }}"></script>
@endsection