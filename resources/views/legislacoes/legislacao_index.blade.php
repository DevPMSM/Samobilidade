<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/indexLegislacao.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<div class="container">
    <div class="legislacoes">
        <h1> Legislações </h1>
        <hr>

        <a href="{{route('create_legislacao')}}" id="add">
            <img src="{{asset('assets\img\add.svg')}}" alt="Adicionar" id="icAdd">
            <span>Adicionar</span> 
        </a>

        <form method="GET" action="{{route('legislacoes')}}">
            <input type="text" id="search" name="search" placeholder="Digite uma palavra chave"><br>
            <button type="submit"> Buscar </button>
        </form>
       
        <div class="allLegislacoes">
            @foreach ($legislacoes as $legislacao)
                <div class="not">
                    <p>{{ $legislacao->titulo }}</p>                  
                        <div class="botoes">
                            <a href="https://www.google.com/" target='_blank' >
                                <img src="{{asset('assets\img\info.svg')}}" alt="Infor" id="info">
                            </a>
                            @can('access')
                                <a href="{{route('editar_legislacao', $legislacao->id)}}" target='_blank' >
                                    <img src="{{asset('assets\img\editar.svg')}}" alt="Editar" id="editar">
                                </a>

                                <form action="{{ route('legislacao_destroy', $legislacao->id) }}" method="POST" style="display:inline; margin: 0px;" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                                        <img src="{{ asset('assets/img/delete.svg') }}" alt="Deletar" id="delete">
                                    </button>
                                </form>
                            @endcan
                        </div>                                           
                </div>                                                    
            @endforeach
        </div>
      
    </div>

</div>

<div class = "navegar">
        @if ($legislacoes->lastPage() > 1)
            <ul class="pagination">
                <li class="page-item {{ ($legislacoes->onFirstPage()) ? ' disabled' : '' }}">
                    <a class="antes" href="{{ $legislacoes->previousPageUrl() }}" aria-label="Anterior">
                        <span class="material-icons">chevron_left</span>
                    </a>
                </li>
                
                @for ($page = max(1, $legislacoes->currentPage() - 2); $page <= min($legislacoes->lastPage(), $legislacoes->currentPage() + 2); $page++)
                    <li class="page-item {{ ($page == $legislacoes->currentPage()) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $legislacoes->url($page) }}">{{ $page }}</a>
                    </li>
                @endfor

                <li class="page-item {{ ($legislacoes->currentPage() == $legislacoes->lastPage()) ? ' disabled' : '' }}">
                    <a class="prox" href="{{ $legislacoes->nextPageUrl() }}" aria-label="Próximo">
                        <span class="material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>
        @endif
    </div>

@component('components.footer') @endcomponent