@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    <h6 class="panel-title">Perfis de Usuário<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary legitRipple"><i class="icon-add"></i> Novo</a>
                </div>
                <table class="table table-bordered table-condensed table-hover datatable-highlight" data-form="tblRoles" id="roles">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop
