@push('categories-scripts')
    <script type="text/javascript" language
    ="javascript" src="{{asset('js/jquery.js')}}"></script>

    <script type="text/javascript" language
    ="javascript" src="{{asset('js/templates/catalog/catalog.js')}}"></script>
@endpush

@section('cont-cat')
    @forelse ($categories as $categorie)
        @if ($categorie->parentid == "1")
            {{-- Só cuidado para não alterar a ordem 3 e 4 da class por causa do Jquery: --}}
            <div class="w3-bar-item w3-button cat-sub cat-{{$categorie->id}} parente-{{$categorie->parentid}}">{{$categorie->label}}</div>
            {{-- Só cuidado para não alterar a ordem da class por causa do Jquery. --}}
            
            {{-- <div class="recebe">
                
                {{$variable}}
            </div> --}}
        @endif

    @empty
        {{-- <p class='test-tag-a' data-ola-mundo="teste do att data-">Nenhuma categoria encontrada!</p> --}}
    @endforelse
    <p class='test-tag-a' data-ola-mundo="teste do att data-">Nenhuma categoria encontrada!</p>
    {{-- <div class="sub-categorias" style="display: none;">
        @forelse ($categories as $categorie)
            @if ($categorie->parentid != "1")
                <div class="w3-bar-item w3-button cat-sub cat-{{$categorie->id}} parente-{{$categorie->parentid}}">{{$categorie->label}}</div>
            @endif

            @empty
                <p>Nenhuma sub-categoria encontrada!</p>
        @endforelse

    </div> --}}
@endsection