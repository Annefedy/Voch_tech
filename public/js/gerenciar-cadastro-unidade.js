(function ($) {
  "use strict";

  class CadastroUnidade {
      constructor() {
          let _cadastroUnidades = this;

          _cadastroUnidades.prps = {

              // AJAX definitions
              ajaxUrl: "/cadastro-unidade/request",
              commandParam: "case",
          };

          _cadastroUnidades._constructor = function () {
              _cadastroUnidades.addUnidade();
              _cadastroUnidades.getUnidade();
          };

          _cadastroUnidades.addUnidade = function (data) {
              $("#addUnidade").on("click", function () {
                  var post = {};
                  post["case"] = "addUnidade";

                  let nome_fantasia = $("#nome_fantasia").val();
                  if (nome_fantasia.length == 0) {
                      $(".validation-nome_fantasia")
                          .css("display", "inline-block")
                          .html(
                              "O campo Nome da fantasia é um campo de preenchimento obrigatório!"
                          );
                      return;
                  } else {
                      post["nome_fantasia"] = nome_fantasia;
                      $(".validation-nome_fantasia")
                          .css("display", "none")
                          .html("");
                  }

                  let razao_social = $("#razao_social").val();
                  if (razao_social.length == 0) {
                      $(".validation-razao_social")
                          .css("display", "inline-block")
                          .html(
                              "O campo Razão Social é um campo de preenchimento obrigatório!"
                          );
                      return;
                  } else {
                      post["razao_social"] = razao_social;
                      $(".validation-razao_social")
                          .css("display", "none")
                          .html("");
                  }


                  let cnpj= $("#cnpj").val();
                  if (cnpj.length == 0) {
                      $(".validation-cnpj")
                          .css("display", "inline-block")
                          .html(
                              "O campo CNPJ é um campo de preenchimento obrigatório!"
                          );
                      return;
                  } else {
                      post["cnpj"] = cnpj;
                      $(".validation-cnpj")
                          .css("display", "none")
                          .html("");
                  }
                   $.ajax({
                      type: "POST",
                      url: _cadastroUnidades.prps.ajaxUrl,
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
                                      "O cadastro da unidade digitada ja existe!"
                                  );
                              } else {

                                  toastr.success(
                                      "Cadastro da unidade adicionada com sucesso!!!"
                                  );
                                  _cadastroUnidades.getUnidade(
                                        _cadastroUnidades.prps.atual
                                     );

                              }
                          } else {
                              toastr.warning(
                                  "Erro ao tentar Cadastrar a área!"
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


          $("#searchUnidade").on("keyup", function () {
            _cadastroUnidades.getUnidade(_cadastroUnidades.prps.atual);
        });

        _cadastroUnidades.getUnidade = function (page) {
            var post = {};
            post["case"] = "getUnidade";
            page = page == undefined ? 1 : page;
            post["page"] = page; //paginação
            post["search"] = $("#searchUnidade").val()
                ? $("#searchUnidade").val()
                : null;

            $.ajax({
                type: "POST",
                url:_cadastroUnidades.prps.ajaxUrl,
                data: post,
                dataType: "text",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    data = JSON.parse(data);

                    _cadastroUnidades.prps.atual = page * 1; //paginação

                    if (data.status === "success") {
                        $("#listUnidades").html("");
                        _cadastroUnidades.clean();

                       // console.log(data.unidades);

                        for (let i = 0; i < data.unidades.length; i++) {


                            $("#listUnidades").append(
                                "<tr>" +
                                    '<td><span class="tbl-txt1-div">' +
                                    data.unidades[i].nome_fantasia +
                                    "</span></td>" +
                                    '<td><span class="tbl-txt1-div">' +
                                    data.unidades[i].razao_social +
                                    "</span></td>" +
                                    '<td><span class="tbl-txt1-div">' +
                                    data.unidades[i].cnpj +
                                    "</span></td>" +
                                    '<td><span class="tbl-txt1-div">' +
                                    data.unidades[i].total_colaboradores || 0 +
                                    "</span></td>" +
                                    "</tr>"
                            );
                        }

                        //Paginação
                        montarPaginacao(
                            data.total,
                            data.por_pagina,
                            _cadastroUnidades.prps.atual
                        );
                        _cadastroUnidades.prps.ultima = Math.ceil(
                            data.total / data.por_pagina
                        );
                        _cadastroUnidades.irParaPagina();
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
        _cadastroUnidades.irParaPagina = function () {
                $("a.page-link").click(function () {
                    let _page = $(this).html();
                    if (_page == "...") return false;

                    if (isNaN(_page)) {
                        _page = 1;
                        if ($(this).attr("aria-label") == "Próximo")
                            _page =  _cadastroUnidades.prps.atual + 1;
                        else _page = _cadastroUnidades.prps.atual - 1;
                    }
                    _page = _page * 1;
                    if (_page < 1) _page = 1;
                    if (_page >  _cadastroUnidades.prps.ultima)
                        _page = _cadastroUnidades.prps.ultima;

                    if (_page ==  _cadastroUnidades.prps.atual) return false;

                    _cadastroUnidades.getUnidade(_page);
                });
            };


          _cadastroUnidades.clean = function (data) {
              $("#modalAddUnidade").modal("hide");
              $("#nome_fantasia").val("");
              $("#razao_social").val("");
              $("#cnpj").val("");
          };

          this._constructor();
      }
  }

  $(document).ready(function () {
      new CadastroUnidade();
  });
})(window.jQuery);
