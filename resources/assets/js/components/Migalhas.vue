<template>
    <ol class="breadcrumb">
        <li v-for="item in lista"><a v-if="item.url" v-bind:class="defineClass" v-bind:href="item.url">{{ item.titulo }}</a><span v-if="!item.url">{{ item.titulo }}</span></li>
    </ol>
</template>

<script>
    export default {
        props: ['lista'],
        computed: {
            defineClass: function() {
                //Se existir url, retornará a string active
                if (this.url) {
                    return 'active';
                } else {
                    return '';
                }
            }
        }
    }
</script>
