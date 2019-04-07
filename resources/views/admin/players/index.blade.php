@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="List of Players" cor="blue">

            <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>

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
@endsection
