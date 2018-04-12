<ul class="icons-list">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="icon-menu9"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="{{ route('users.edit',['id' => $user->id]) }}"><i class="icon-pencil7"></i> Editar</a></li>
            @if($user->active)
                <li>
                    <a href="#" class="desativa" data-id="{{ $user->id }}" data-value="0">
                        <i class="icon-user-block"></i> Desativar
                    </a>
                </li>
            @else
                <li>
                    <a href="#" class="ativa" data-id="{{ $user->id }}" data-value="1">
                        <i class="icon-user-check"></i> Ativar
                    </a>
                </li>
            @endif
        </ul>
    </li>
</ul>