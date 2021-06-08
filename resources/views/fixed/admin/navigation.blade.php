{{-- LEFT MENU --}}
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Database</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_accounts') }}">Accounts</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_categories') }}">Categories</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_extras') }}">Extras</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_ingredients') }}">Ingredients</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_products') }}">Products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_orders') }}">Orders</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_comments') }}">Comments</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_links') }}">Links</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_navs') }}">Navigations</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/apps/todo.html">--}}
{{--                <i class="icon-align-right menu-icon"></i>--}}
{{--                <span class="menu-title">Todo List</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/documentation/documentation.html">--}}
{{--                <i class="icon-paper menu-icon"></i>--}}
{{--                <span class="menu-title">Documentation</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>

<!-- partial -->
<div class="main-panel">
