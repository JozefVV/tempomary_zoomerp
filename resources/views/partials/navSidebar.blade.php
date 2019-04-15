<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title text-muted">
            Navigácia
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Domov</span>
                        </a>
                    </li>
                    <li class="nav">
                        <a href="{{ route('userAdministration.list') }}">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span>Používatelia</span>
                        </a>
                    </li>
                    <li class="nav">
                        <a href="{{ route('shop.index') }}">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span>Pobočky</span>
                        </a>
                    </li>

                    <li class="nav">
                        <a href="{{ route('warehouse.index') }}">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span>Sklady</span>
                        </a>
                    </li>
                    {{--
                    <li class="nav">
                        <a href="{{ route('item.index') }}">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span>Produkty</span>
                        </a>
                    </li> --}}
                </ul>
            </nav>
        </div>
    </div>
</aside>
<!-- end: sidebar -->
