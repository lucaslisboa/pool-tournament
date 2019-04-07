@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Lista de Jogadores" cor="blue">
            <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>

            <tabela-lista
                    v-bind:titulos="['#','Nome']"
                    v-bind:itens="{{ $listaPlayers }}"
                    ordem="desc" ordemcol="1"
                    criar="#criar"
                    detalhe="#detalhe"
                    editar="#editar"
                    eliminar="#eliminar"
                    token="7887522323"
                    modal="sim"
            ></tabela-lista>
        </painel>
    </pagina>


    <modal nome="adicionar" titulo="Adicionar Novo Jogador">
        <formulario id="formAdicionar" css="" action="{{ route('players.store') }}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>

        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar Jogador">
        <formulario id="formEditar" css="" action="#" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" v-model="$store.state.item.nome" placeholder="Nome">
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
