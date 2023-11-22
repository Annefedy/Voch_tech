(function ($) {
    "use strict";

    class CadastroColaborador {
        constructor() {
            let _colaboradores = this;

            _colaboradores.prps = {

                // AJAX definitions
                ajaxUrl: "/cadastro-colaborador/request",
                commandParam: "case",
            };

            _colaboradores._constructor = function () {
                _colaboradores.addColaborador();
                _colaboradores.getColaborador();
                _colaboradores.getCargos();
            };

            _colaboradores.addColaborador = function (data) {
                $("#addColaborador").on("click", function () {
                    var post = {};
                    post["case"] = "addColaborador";

                    let nome = $("#nome").val();
                    if (nome.length == 0) {
                        $(".validation-nome")
                            .css("display", "inline-block")
                            .html(
                                "O campo Nome é um campo de preenchimento obrigatório!"
                            );
                        return;
                    } else {
                        post["nome"] = nome;
                        $(".validation-nome")
                            .css("display", "none")
                            .html("");
                    }

                    let cpf = $("#cpf").val();
                    if (cpf.length == 0) {
                        $(".validation-cpf")
                            .css("display", "inline-block")
                            .html(
                                "O campo CPF é um campo de preenchimento obrigatório!"
                            );
                        return;
                    } else {
                        post["cpf"] = cpf;
                        $(".validation-cpf")
                            .css("display", "none")
                            .html("");
                    }


                    let email= $("#email").val();
                    if (cnpj.length == 0) {
                        $(".validation-cnpj")
                            .css("display", "inline-block")
                            .html(
                                "O campo email é um campo de preenchimento obrigatório!"
                            );
                        return;
                    } else {
                        post["email"] = email;
                        $(".validation-email")
                            .css("display", "none")
                            .html("");
                    }
                     $.ajax({
                        type: "POST",
                        url: _colaboradores.prps.ajaxUrl,
                        data: post,
                        dataType: "text",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        success: function (data) {
                            data = JSON.parse(data);

                            if (data.status === "success") {

                                if (data.existe) {
                                    toastr.warning(
                                        "O cadastro do Colaborador digitada ja existe!"
                                    );
                                } else {

                                    toastr.success(
                                        "Cadastro do colaborador adicionado com sucesso!!!"
                                    );
                                    _colaboradores.getColaborador(
                                          _colaboradores.prps.atual
                                       );

                                }
                            } else {
                                toastr.warning(
                                    "Erro ao tentar Cadastrar o Colaborador!"
                                );
                                console.log(data);
                            }
                        },
                        error: function (data) {
                            data = JSON.parse(data);
                            console.log(data);
                        },
                    });
                });
            };


            $("#searchColaborador").on("keyup", function () {
              _colaboradores.getColaborador(_colaboradores.prps.atual);
          });

          _colaboradores.getColaborador = function (page) {
              var post = {};
              post["case"] = "getColaborador";
              page = page == undefined ? 1 : page;
              post["page"] = page; //paginação
              post["search"] = $("#searchUnidade").val()
                  ? $("#searchUnidade").val()
                  : null;

              $.ajax({
                  type: "POST",
                  url:_colaboradores.prps.ajaxUrl,
                  data: post,
                  dataType: "text",
                  headers: {
                      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                          "content"
                      ),
                  },
                  success: function (data) {
                      data = JSON.parse(data);

                      _colaboradores.prps.atual = page * 1; //paginação

                      if (data.status === "success") {
                          $("#listcolaboradores").html("");
                          _colaboradores.clean();

                          console.log(data.colaboradores);

                          for (let i = 0; i < data.colaboradores.length; i++) {


                              $("#listcolaboradores").append(
                                  "<tr>" +
                                      '<td><span class="tbl-txt1-div">' +
                                      data.colaboradores[i].nome +
                                      "</span></td>" +
                                      '<td><span class="tbl-txt1-div">' +
                                      data.colaboradores[i].cpf +
                                      "</span></td>" +
                                      '<td><span class="tbl-txt1-div">' +
                                      data.colaboradores[i].email +
                                      "</span></td>" +
                                      '<td><span class="tbl-txt1-div">' +
                                      20 +
                                      "</span></td>" +
                                      '<td><span class="tbl-txt1-div">' +
                                      20 +
                                      "</span></td>" +
                                      "</tr>"
                              );
                          }

                          //Paginação
                          montarPaginacao(
                              data.total,
                              data.por_pagina,
                              _colaboradores.prps.atual
                          );
                          _colaboradores.prps.ultima = Math.ceil(
                              data.total / data.por_pagina
                          );
                          _colaboradores.irParaPagina();
                          //---------
                      } else {
                          console.log(data);
                      }
                  },
                  error: function (data) {
                      data = JSON.parse(data);
                      console.log(data);
                  },
              });
          };

          /**
               * Metodo referente a páginação
               */
          _colaboradores.irParaPagina = function () {
                  $("a.page-link").click(function () {
                      let _page = $(this).html();
                      if (_page == "...") return false;

                      if (isNaN(_page)) {
                          _page = 1;
                          if ($(this).attr("aria-label") == "Próximo")
                              _page =  _colaboradores.prps.atual + 1;
                          else _page = _colaboradores.prps.atual - 1;
                      }
                      _page = _page * 1;
                      if (_page < 1) _page = 1;
                      if (_page >  _colaboradores.prps.ultima)
                          _page = _colaboradores.prps.ultima;

                      if (_page ==_colaboradores.prps.atual) return false;

                      _colaboradores.getColaborador(_page);
                  });
              };

        _colaboradores.getCargos = function (data) {
                var post = {};
                post["case"] = "getCargos";

                $.ajax({
                    type: "POST",
                    url: _colaboradores.prps.ajaxUrl,
                    data: post,
                    dataType: "text",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (data) {
                        data = JSON.parse(data);

                        if (data.status === "success") {

                            console.log(data.cargos);
                            let opt =
                                '<option value="" selected>Selecione...</option>';

                            let opt_fnl, opt_new;
                            for (let eqpto in data.cargos) {
                                opt_fnl += `<option value="${data.cargos[eqpto].id}">${data.cargos[eqpto].cargo}</option>`;
                            }
                            opt_new = opt + opt_fnl;

                            $("#listarCargos").html(opt_new).select2();
                        } else {
                            console.log(data);
                        }
                    },
                    error: function (data) {
                         console.log("Erro no servidor:", data);
                        data = JSON.parse(data);
                        console.log(data);
                    },
                });
            };



            _colaboradores.clean = function (data) {
                $("#modalAddColaborador").modal("hide");
                $("#nome").val("");
                $("#cpf").val("");
                $("#email").val("");
            };

            this._constructor();
        }
    }

    $(document).ready(function () {
        new CadastroColaborador();
    });
  })(window.jQuery);
