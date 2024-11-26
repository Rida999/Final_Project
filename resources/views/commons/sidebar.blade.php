<div class="hide-on-print main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item  ">
                <a href="{{route('list')}}">
                    <i class="fa-solid fa-house"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Blank Page</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('reviews.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    <span class="menu-title" data-i18n="nav.create-reviews">Create Reviews</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('list.reviews') }}">
                    <i class="fa-solid fa-list"></i>
                    <span class="menu-title" data-i18n="nav.list-reviews">List Reviews</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('orders.index') }}">
                    <i class="fa-solid fa-list"></i>
                    <span class="menu-title" data-i18n="nav.list-orders">List Orders</span>
                </a>
            </li>

        </ul>
    </div>
</div>
