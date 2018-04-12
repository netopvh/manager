@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    <h6 class="panel-title">Perfis de Usuário <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                    </h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('roles.store') }}" class="form-validate" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-bold">Nome:</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control text-uppercase" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-bold">Descrição:</label>
                                    <input type="text" name="description" value="{{ old('description') }}" class="form-control text-uppercase">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary legitRipple"><i class="icon-database-insert"></i> Cadastrar</button>
                                <a class="btn btn-info legitRipple" href="{{ route('roles.home') }}"><i class="icon-reply"></i> Retornar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
