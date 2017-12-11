@auth
<div class="sidebar sidebar-main sidebar-default sidebar-fixed">
    <div class="sidebar-content">
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li class="navigation-header">
                        <span>Menu Principal</span>
                        <i class="icon-menu" title="Main pages"></i>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="icon-home4"></i>
                            <span class="text-bold">Início</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-stack"></i>
                            <span class="text-bold">Cadastros</span>
                        </a>
                        <ul>
                            <li><a href="">Horizontal navigation</a></li>
                            <li>
                                <a href="#">3 columns</a>
                                <ul>
                                    <li>
                                        <a href="#">Double sidebars</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navigation-divider"></li>
                            <li>
                                <a href="#">Fixed top navbar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-list-unordered"></i>
                            <span class="text-bold">Changelog</span>
                        </a>
                    </li>
                    <li class="navigation-header">
                        <span>Menu Administrativo</span>
                        <i class="icon-menu" title="Main pages"></i>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-file-locked"></i>
                            <span class="text-bold">Gerenciamento de Acesso</span>
                        </a>
                        <ul>
                            <li class="{{ active(['users.*']) }}">
                                <a href="{{ route('users.home') }}">
                                    <i class="icon-user"></i>
                                    <span class="text-bold">Usuários</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-users4"></i>
                                    <span class="text-bold">Perfil de Acesso</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="icon-cog"></i>
                            <span class="text-bold">Parâmetros do Sistema</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="icon-stack-star"></i>
                            <span class="text-bold">Auditoria</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endauth