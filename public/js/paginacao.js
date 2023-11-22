montarPaginacao = function(total, por_pagina, pagina) {
    // if (total <= 0)
    //     return false;
    //Remontar paginação
    let _ultima = Math.ceil(total / por_pagina);

    $('#paginacao').show();

    //Se a última página for menor ou igual a 1, remove a paginação
    if (_ultima <= 1 || total <= 0) {
        $('#paginacao').hide();
        return false;
    }


    let _paginas = $('#paginacao').children('.page-item').length;
    let _ant = $('#paginacao').children('.page-item').eq(0).html();
    let _p1 = $('#paginacao').children('.page-item').eq(1).html().replace(' style="background: rgba(232, 102, 171, 0.24) !important; color: #ED228E;"', '');
    let _prox = $('#paginacao').children('.page-item').eq(_paginas - 1).html();
    $('#paginacao').html('');
    let paginacao = '<li class="page-item">' + _ant + '</li>';
    _p1 = '<li class="page-item">' + _p1 + '</li>';

    for (let pg = 1; pg <= _ultima; pg++) {
        if (pg == pagina) {
            paginacao += _p1.replace('>1<', ' style="background: rgba(232, 102, 171, 0.24) !important; color: #ED228E;">' + pg + '<')
                .replace('página 1', 'página ' + pg);
            continue;
        }
        if (_ultima > 3) {
            if (pg > 1 && pg < _ultima) {
                if (pg > pagina + 1 || pg < pagina - 1) {
                    if (pg == pagina + 2 || pg == pagina - 2) {
                        paginacao += '<li class="page-item"><span class="page-link">...</span></li>';
                        continue;
                    }
                    continue;
                }
            }
        }
        paginacao += _p1.replace('>1<', '>' + pg + '<')
            .replace('página 1', 'página ' + pg);
    }
    paginacao += '<li class="page-item">' + _prox + '</li>';
    $('#paginacao').html(paginacao);
}
