@extends('layouts.app')

@section('page-header')

@stop

@section('content')
    <app-pagina width="6">
        <app-panel title="Usuários">
            <app-table-list
                    v-bind:columns="['#','Titulo','Descricao']"
                    v-bind:items="[[1,'PHP OO','Curso de PHP OO'],[2,'Vue JS','Curso de Vue Js']]"
            ></app-table-list>
        </app-panel>
    </app-pagina>

@stop