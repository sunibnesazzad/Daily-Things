<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->

            <li class="nav-item {!! Menu::isActiveRoute('dashboard.main') !!}">
                <a href="{!! route('dashboard.main') !!}" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    @if (Route::is('dashboard.main'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>

            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>

            <li class="nav-item {!! Menu::isActiveRoute('items.inventory') !!} ">
                <a href="/item/inventory" class="nav-link nav-toggle">
                    <i class="icon-basket"></i>
                    <span class="title">Items</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/item/inventory" class="nav-link ">
                            <span class="title">All Items</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/item/create" class="nav-link ">
                            <span class="title">Add Item</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {!! Menu::isActiveRoute('inventory.index') !!} ">
                <a href="/inventory" class="nav-link nav-toggle">
                    <i class="icon-basket"></i>
                    <span class="title">Inventory</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {!! Menu::isActiveRoute('inventory.index') !!} ">
                        <a href="/inventory" class="nav-link ">
                            <span class="title">All Inventory Items</span>
                        </a>
                    </li>
                    <li class="nav-item {!! Menu::isActiveRoute('inventory.index') !!} ">
                        <a href="/inventory/create" class="nav-link ">
                            <span class="title">Add Inventory Item</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {!! Menu::isActiveRoute('category.index') !!} ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-folder"></i>
                    <span class="title">Category</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/category" class="nav-link ">
                            <span class="title">All Categories</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="category/create" class="nav-link ">
                            <span class="title">Add Category</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {!! Menu::isActiveRoute('item.chart') !!} ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-graph"></i>
                    <span class="title">Charts</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{!! route('monthly.price') !!}" class="nav-link ">
                            <span class="title">Monthly Price</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{!! route('item.chart') !!}" class="nav-link ">
                            <span class="title">Item Charts</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{!! route('quantity.chart') !!}" class="nav-link ">
                            <span class="title">Area Charts</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->