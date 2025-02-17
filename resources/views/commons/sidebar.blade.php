<div class="hide-on-print main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item  ">

                <a href="{{route('stores.index')}}">
                    <i class="fa-solid fa-house"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Stores</span>
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

            <li>
                <a href="{{route('menus.index')}}">
                    <i class="fa-solid fa-utensils"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Menus</span>
                </a>                    
            </li>
            <li>
                <a href="{{ route('special_offers.index') }}">
                    <i class="fa-solid fa-tags"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Special Offers</span>
                </a>   
            </li>
            <li>
                <a href="{{ route('menu_items.index') }}">
                    <i class="fa-solid fa-pizza-slice"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Menu Items</span>
                </a>   
            </li>            
        </ul>
    </div>
</div>
