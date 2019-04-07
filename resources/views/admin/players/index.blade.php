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


    <modal nome="adicionar">
        <painel titulo="Adicionar">
            <formulario css="" action="#" method="post" enctype="multipart/form-data" token="">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
                <button class="btn btn-info">Adicionar</button>

            </formulario>
        </painel>
    </modal>

    <modal nome="editar">
        <painel titulo="Editar">
            <formulario css="" action="#" method="put" enctype="multipart/form-data" token="12345">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
                <button class="btn btn-info">Atualizar</button>

            </formulario>
        </painel>
    </modal>

@endsection
