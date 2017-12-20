<template>
    <div>
        <div class="form-inline">
            <a v-if="create && !modal" v-bind:href="create" class="btn btn-primary legitRipple">Criar</a>
            <app-modal-link v-if="create && modal" type="link" name="create" title="Cadastrar"></app-modal-link>
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Pesquisar" v-model="search">
            </div>
        </div>

        <table class="table table-condensed table-striped">
            <thead>
            <tr>
                <th style="cursor: pointer" v-on:click="ordenaColuna(index)" v-for="(column,index) in columns">{{ column }}</th>
                <th v-if="view || edit || remove">Ação</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in lista">
                <td v-for="i in item">{{ i }}</td>
                <td v-if="view || edit || remove">
                    <form v-bind:id="index" v-if="remove && token" v-bind:action="remove" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" v-bind:value="token">

                        <a v-if="view" v-bind:href="view" class="btn-sm btn-info"><i class="icon-eye"></i></a>
                        <a v-if="edit && !modal" v-bind:href="edit" class="btn-sm btn-primary"><i class="icon-pencil"></i></a>
                        <app-modal-link v-if="edit && modal" type="link" name="edit" title="Editar"></app-modal-link>

                        <a href="#" class="btn-sm btn-danger" v-on:click="executaForm(index)"><i class="icon-trash"></i></a>
                    </form>
                    <span v-if="!token">
                        <a v-if="view" v-bind:href="view" class="btn-sm btn-info"><i class="icon-eye"></i></a>
                        <a v-if="edit && !modal" v-bind:href="edit" class="btn-sm btn-primary"><i class="icon-pencil"></i></a>
                        <app-modal-link v-if="edit && modal" type="link" name="edit" title="Editar"></app-modal-link>
                    </span>
                    <span v-if="token && !remove">
                        <a v-if="view" v-bind:href="view" class="btn-sm btn-info"><i class="icon-eye"></i></a>
                        <a v-if="edit && !modal" v-bind:href="edit" class="btn-sm btn-primary"><i class="icon-pencil"></i></a>
                        <app-modal-link v-if="edit && modal" type="link" name="edit" title="Editar"></app-modal-link>
                    </span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['columns', 'items', 'create', 'view', 'edit', 'remove', 'token','sort','colOrder','modal'],
        data: function () {
          return {
              search:'',
              ordemAux: this.sort || "asc",
              ordemAuxCol: this.colOrder || 0
          }
        },
        methods: {
            executaForm: function (index) {
                document.getElementById(index).submit();
            },
            ordenaColuna: function (coluna) {
                this.ordemAuxCol = coluna;
                if(this.ordemAux.toLowerCase() == "asc"){
                    this.ordemAux = "desc"
                }else{
                    this.ordemAux = "asc"
                }
            }
        },
        computed:{
            lista: function () {

                let ordem = this.ordemAux;
                let ordemCol = this.ordemAuxCol;

                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == "asc"){
                    this.items.sort(function (a, b) {
                        if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]){ return 1;}
                        if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]){ return -1;}
                        return 0;
                    });
                }else{
                    this.items.sort(function (a, b) {
                        if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]){ return 1;}
                        if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]){ return -1;}
                        return 0;
                    });
                }

                if(this.search){
                    return this.items.filter(res => {
                        for(let k = 0; k<res.length; k++){
                            if((res[k] + "").toLowerCase().indexOf(this.search.toLowerCase()) >= 0){
                                return true;
                            }
                        }
                        return false;
                    });
                }


                return this.items;
            }
        }
    }
</script>
