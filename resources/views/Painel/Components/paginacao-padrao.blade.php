@php $paginas = ceil($total / $por_pagina); @endphp
<nav aria-label="Navegação de página exemplo">
  <ul class="pagination" id="paginacao">
    <li class="page-item">
      <a class="page-link" href="javascript: void(0);" aria-label="Anterior" title="Anterior">
        <i class="material-icons chevron_left">chevron_left</i>
      </a>
    </li>
    @for($i = 1; $i <= $paginas; $i++) @if ($i==$pagina) <li class="page-item">
      <a class="page-link itens-link" href="javascript: void(0);" title="Ir para página {{ $i }}">{{ $i }}</a>
      </li>
      @php continue; @endphp
      @endif
      @if ($paginas > 3)
      @if ($i > 1 && $i < $paginas) @if ($i> $pagina + 1 || $i < $pagina - 1) @if ($i==$pagina + 2 || $i==$pagina - 2)
          <li class="page-item"><span class="page-link">...</span></li>
          @php continue; @endphp
          @endif
          @php continue; @endphp
          @endif
          @endif
          @endif
          <li class="page-item">
            <a class="page-link" href="javascript: void(0);" title="Ir para página {{ $i }}">{{ $i }}</a>
          </li>
          @endfor
          <li class="page-item">
            <a class="page-link" href="javascript: void(0);" aria-label="Próximo" title="Próximo">
              <i class="material-icons chevron_right">chevron_right</i>
            </a>
          </li>
  </ul>
</nav>