@extends('layouts.app')

@section('page-header')

@stop

@section('content')
    <app-pagina width="8">
        <app-panel title="Usuários">
            <app-table-list
                    v-bind:columns="['#','Nome','Email']"
                    v-bind:items="{{$users}}"
                    create="#create"
                    view="/"
                    edit="#edit"
                    remove="#delete"
                    token="15454545"
                    sort="desc"
                    colOrder="1"
                    modal="yes"
            ></app-table-list>
        </app-panel>
    </app-pagina>
    <app-modal name="create" title="Adicionar">
        <app-form id="formCreate" action="{{ route('users.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome:</label>
                <input type="text" class="form-control" name="name" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha:</label>
                <input type="password" class="form-control" name="password" placeholder="Senha">
            </div>
        </app-form>
        <span slot="buttons">
            <button form="formCreate" class="btn btn-primary"><i class="icon-database-insert"></i> Adicionar</button>
        </span>
    </app-modal>
    <app-modal name="edit" title="Editar">
        <app-form id="formEdit" css="" action="#" method="put" enctype="" token="1251515454">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" placeholder="Nome" v-model="$store.state.item.name">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" placeholder="Senha" v-model="$store.state.item.email">
            </div>
        </app-form>
        <span slot="buttons">
            <button class="btn btn-primary" form="formEdit"><i class="icon-database-refresh"></i> Atualizar</button>
        </span>
    </app-modal>
    <app-modal name="view" v-bind:title="$store.state.item.name">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="display-block">Nome:</label>
                    @{{$store.state.item.name}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="display-block">Email:</label>
                    @{{$store.state.item.email}}
                </div>
            </div>
        </div>
    </app-modal>

@stop