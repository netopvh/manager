@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="text-bold">Usuários</span>
                </div>
                <user-table></user-table>
            </div>
        </div>
    </div>

@stop