<template>
    <div>

        <div class="form-inline">
            <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
            <modal-link v-if="criar && modal" tipo="link" nome="adicionar" titulo="Criar" css=""></modal-link>
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th class="coluna" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos">{{ titulo }}</th>
                <th v-if="detalhe || editar || eliminar">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in lista">
                <td v-for="i in item"> {{ i }}</td>

                <td v-if="detalhe || editar || eliminar">

                    <form v-if="eliminar && token" v-bind:id="index" v-bind:action="eliminar + item.id" method="post">

                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" v-bind:value="token">

                        <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                        <modal-link v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo="link" nome="detalhe" titulo="Detalhe |" css=""></modal-link>

                        <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                        <modal-link v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="link" nome="editar" titulo="Editar |" css=""></modal-link>

                        <a href="#" v-on:click="executaForm(index)">Eliminar</a>

                    </form>

                    <span v-if="!token">
                        <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                        <modal-link v-if="detalhe && modal" v-bind:item="item" tipo="link" v-bind:url="detalhe" nome="detalhe" titulo="Detalhe |" css=""></modal-link>

                        <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                        <modal-link v-if="editar && modal" v-bind:item="item" tipo="link" v-bind:url="editar" nome="editar" titulo="Editar |" css=""></modal-link>
                        <a v-if="eliminar" v-bind:href="eliminar">Eliminar</a>
                    </span>

                    <span v-if="token && !eliminar">
                        <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                        <modal-link v-if="detalhe && modal" v-bind:item="item"  tipo="link" v-bind:url="detalhe" nome="detalhe" titulo="Detalhe |" css=""></modal-link>

                        <a v-if="editar && !modal" v-bind:href="editar">Editar</a>
                        <modal-link v-if="editar && modal" v-bind:item="item" tipo="link" v-bind:url="editar" nome="editar" titulo="Editar" css=""></modal-link>
                    </span>


                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['titulos','itens','ordem','ordemcol','criar','detalhe','editar','eliminar','token','modal'],
        data: function() {
            return {
                buscar: '',
                ordemAux: this.ordem || 'asc',
                ordemColAux: this.ordemcol || 0,
            }
        },
        methods: {
            executaForm: function(index) {
                document.getElementById(index).submit();
            },
            ordenaColuna: function(coluna) {
                //Método para quando clicar na coluna da tabela, ordernar a lista.
                this.ordemColAux = coluna;
                if (this.ordemAux.toLowerCase() == 'asc') {
                    this.ordemAux = 'desc';
                } else {
                    this.ordemAux = 'asc';
                }
            }
        },
        computed: {
            //carrega a lista
            lista: function() {

                //Paginação
                let lista = this.itens.data;

                //Início lógica de ordenação por tag
                let ordem = this.ordemAux;
                let ordemCol = this.ordemColAux;

                //tratamento das variáveis
                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                //ordem crescente
                if (ordem == "asc") {
                    lista.sort(function(a, b) {
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return 1; }
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return -1; }
                        return 0;
                    });
                } else {
                    //ordem decrescente
                    lista.sort(function(a, b) {
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return 1; }
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return -1; }
                        return 0;
                    });
                }
                //Fim lógica de ordenação por tag

                //Se foi digitado algo no campo busca
                if (this.buscar) {
                    //Filtragem da lista
                    return lista.filter(response => {

                        response = Object.values(response);

                        //filtro em cada campo da lista de itens
                        for (let k = 0 ; k < response.length ; k++) {

                            //verificação se o que foi digitado no campo buscar existe na lista de itens
                            //garantir que o valor pego da lista de itens será transformado para string
                            if ((response[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0) {
                                return true;
                            }
                        }

                        return false;

                    });
                }




                return lista;
            }
        }
    }
</script>


<style>
    .coluna {
        cursor: pointer;
    }
</style>
