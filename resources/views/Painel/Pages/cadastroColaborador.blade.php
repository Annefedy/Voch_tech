@extends('Painel.Layout.index')
@section('content')
<link href="{{ asset('/AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('/AdminLTE-3.2.0/plugins/select2/js/select2.min.js') }}"></script>

<style>
    .div-modal-title {
        font-family: 'Nunito';
        font-weight: 700;
        font-size: 24px;
        color: #000;
    }

    .validation-nome,
    .validation-cpf,
    .validation-email,
    .validation-cargo {
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

    .table-hover tr td.td-txt-vaga {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 400;
        font-size: 13.3132px;
        line-height: 18px;
        align-items: center;
        color: #383637;
    }

    .td-chbx {
        width: 20px;
    }

    label.btn-check {
        margin-top: -9px;
    }

    .btn-outline-custom {
        font-family: 'Nunito';
        font-weight: 500;
        font-size: 14px;
        color: #ED228E;
        border: 1px solid #ced4da;
        border-left: solid 1px #ED228E;
        width: 60px;
    }

    .btn-outline-custom:hover {
        color: #FF8EED;
    }

    .list-group-horizontal {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        align-content: center;
        -ms-flex-direction: row;
    }

    .list-group-kit {
        text-align: center;
        font-family: 'Nunito';
        font-weight: 500;
        font-size: 14px;
        line-height: 18px;
        letter-spacing: 0.02em;
        color: #ED228E;
        list-style: none;
        margin-top: 1px;
        margin-right: 10px;
        margin-bottom: 10px;
        padding: 3px 25px 2px 10px;
        height: initial;
        background: rgba(232, 102, 171, 0.3);
        border-radius: 15PX;
        cursor: pointer;
    }

    .list-group-kit>a {
        color: #ED228E;
    }

    .material-icons-x {
        font-size: 14px;
        position: absolute;
        padding-left: 3px;
        margin-top: 1px;
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

                <a id="btnAddColaboradores
                " href="javascript:void(0)" data-toggle="modal" data-target="#modalAddColaborador" class="float-sm-right btn btn-form-active btn-float-left-mobile">Cadastro de Colaboradores</a>


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
                                        <th scope="col">Nome do colaborador</th>
                                        <th scope="col">CPF</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Unidade</th>
                                        <th scope="col">Cargo</th>
                                    </tr>
                                </thead>
                                <tbody id="listColaboradores"></tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modals -->
    <div class="modal fade" id="modalAddColaborador" aria-labelledby="modalAddColaborador" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-border-bottom">
                    <div class="div-modal-title">Cadastro de Colaborador</div>
                </div>
                <div class="modal-body">

                    <div class="row mt-2">
                        <div class="col-sm">
                            <div class="form-group form-bl">
                                <label class="titulo-txt">Nome:</label>
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
                                <div class="validation-nome" style="display:none;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm">
                            <div class="form-group form-bl">
                                <label class="titulo-txt">CPF:</label>
                                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite o CPF">
                                <div class="validation-cpf" style="display:none;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm">
                            <div class="form-group form-bl">
                                <label class="titulo-txt">E-mail:</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Digite o E-mail">
                                <div class="validation-email" style="display:none;"></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm">
                        <div class="form-group">
                            <label class="selecioneCargo">Selecionar o Cargo*</label>
                            <select class="form-control" name="listarCargos" id="listarCargos">
                            </select>
                            <div class="validation-cargo"></div>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="form-group">
                            <label class="selecioneVaga">Selecionar unidade*</label>
                            <select class="form-control" name="listarUnidades" id="listarUnidades">
                            </select>
                            <div class="validation-unidade"></div>
                        </div>
                    </div>






                    <div class="modal-footer mt-2">
                        <button id="addColaborador" type="button" class="btn btn-form-active">Cadastrar</button>
                        <button id="clean" type="button" class="btn btn-form-outline" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- /modals -->

</section>
<!-- /.content -->

<script>
    $(document).ready(function() {

        $("#listarCargos").select2();

    })
</script>


<script type="text/javascript" src="{{ asset('/js/paginacao.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/gerenciar-cadastro-colaborador.js') }}"></script>
@endsection