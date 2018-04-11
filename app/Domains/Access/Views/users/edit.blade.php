@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    <h6 class="panel-title">Usuários<a class="heading-elements-toggle"><i class="icon-more"></i></a>
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
                    <form action="{{ route('users.restore',['id' => $user->id]) }}" class="form-validate" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="text-bold">ID</label>
                                    <input type="text" class="form-control"
                                           value="{{ str_pad($user->id, 5, "0", STR_PAD_LEFT) }}" readonly="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-bold">Login:</label>
                                    <input type="text" class="form-control" value="{{ $user->username }}" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-bold">Nome:</label>
                                    <input type="text" name="nome" class="form-control text-uppercase" value="{{ $user->nome }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-bold">Email:</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary legitRipple"><i class="icon-database-insert"></i> Atualizar</button>
                                <a class="btn btn-info legitRipple" href="{{ route('users.home') }}"><i class="icon-reply"></i> Retornar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
