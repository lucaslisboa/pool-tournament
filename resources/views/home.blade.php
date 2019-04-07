@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Dashboard" cor="blue">

            <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>

            <div class="row">
                <div class="col-md-4">
                    <caixa quantidade="1500" titulo="Amigos" url="{{ route('players.index')  }}" cor="blue" icone="ion ion-person-stalker"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa quantidade="80" titulo="Partidas" url="{{ route('players.index')  }}" cor="orange" icone="ion ion-pie-graph"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa quantidade="3" titulo="Detalhes" url="#" cor="red" icone="ion ion-person"></caixa>
                </div>
            </div>

        </painel>
    </pagina>
@endsection
