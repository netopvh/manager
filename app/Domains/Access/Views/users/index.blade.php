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
                    view="#view"
                    edit="#edit"
                    remove="#delete"
                    token="15454545"
                    sort="desc"
                    colOrder="1"
                    modal="yes"
            ></app-table-list>
        </app-panel>
    </app-pagina>
    <app-modal name="create">
        <app-panel title="Cadastro">
            <app-form css="" action="#" method="put" enctype="" token="1251515454">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="email" class="form-control" placeholder="Nome">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Usuário</label>
                    <input type="password" class="form-control" placeholder="Senha">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </app-form>
        </app-panel>
    </app-modal>
    <app-modal name="edit">
        <app-panel title="Cadastro">
            <app-form css="" action="#" method="put" enctype="" token="1251515454">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="email" class="form-control" placeholder="Nome">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Usuário</label>
                    <input type="password" class="form-control" placeholder="Senha">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </app-form>
        </app-panel>
    </app-modal>
    <app-modal name="view">
        <app-panel title="Cadastro">
            <app-form css="" action="#" method="put" enctype="" token="1251515454">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="email" class="form-control" placeholder="Nome">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Usuário</label>
                    <input type="password" class="form-control" placeholder="Senha">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </app-form>
        </app-panel>
    </app-modal>

@stop