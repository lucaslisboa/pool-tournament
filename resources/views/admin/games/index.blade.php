@extends('layouts.app')

@section('content')
    <pagina tamanho="10">

        @if($errors->all())
            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach ($errors->all() as $key => $value)
                    <li><strong>{{$value}}</strong></li>
                @endforeach
            </div>
        @endif

        <painel titulo="Lista de Jogadores" cor="blue">
            <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>

            <tabela-lista
                    v-bind:titulos="['#','Nome']"
                    v-bind:itens="{{ json_encode($listaModelo) }}"
                    ordem="desc" ordemcol="1"
                    criar="#criar"
                    detalhe="/admin/games/"
                    editar="/admin/games/"
                    eliminar="/admin/games/"
                    token="{{ csrf_token() }}"
                    modal="sim"
            ></tabela-lista>
            <div align="center" class="paginacao">
                {{ $listaModelo }}
            </div>
        </painel>
    </pagina>


    <modal nome="adicionar" titulo="Adicionar Novo Jogador">
        <formulario id="formAdicionar" css="" action="{{ route('games.store') }}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">

            <div class="form-group">
                <label for="data">Data</label>
                <input type="datetime-local" class="form-control" id="data" name="data" placeholder="Data do Jogo" value="{{ old('data_jogo') }}">
            </div>


        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar Jogador">
        <formulario id="formEditar" css="" v-bind:action="'/admin/games/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="data">Data</label>
                <input type="datetime-local" class="form-control" id="data" name="data" v-model="$store.state.item.data_jogo" placeholder="Data do Jogo">
            </div>
        </formulario>

        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>

    <modal nome="detalhe" v-bind:titulo="'Detalhe (' + $store.state.item.nome + ')'">
        <label for="nome">Nome</label>
        <p>@{{$store.state.item.nome}}</p>
    </modal>

@endsection
