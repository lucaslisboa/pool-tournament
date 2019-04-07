@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Lista de Jogadores" cor="blue">
            <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>

            <modal-link tipo="link" nome="meuModalTeste" titulo="Criar" css=""></modal-link>

            <tabela-lista
                    v-bind:titulos="['#','Nome']"
                    v-bind:itens="[[1, 'Lucas Lisboa'],[2, 'Bruna Lisboa']]"
                    ordem="desc" ordemcol="1"
                    criar="#criar"
                    detalhe="#detalhe"
                    editar="#editar"
                    eliminar="#eliminar"
                    token="7887522323"
            ></tabela-lista>
        </painel>
    </pagina>


    <modal nome="meuModalTeste">

        <painel titulo="Adicionar">
            <formulario css="" action="#" method="put" enctype="multipart/form-data" token="12345">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
                <button class="btn btn-info">Adicionar</button>

            </formulario>
        </painel>

    </modal>
@endsection
