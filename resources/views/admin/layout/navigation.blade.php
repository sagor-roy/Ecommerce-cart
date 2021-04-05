<div id="left-nav" class="nano">
    <div class="nano-content">
        <nav>
            <ul class="nav nav-left-lines" id="main-nav">
                <!--HOME-->
                <li class="{{ request()->is('admin/dashboard') ? 'active-item':'' }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                <li class="has-child-item close-item {{ request()->is('admin/product/add-product') ? 'open-item active':'' }} {{ request()->is('admin/product/manage-product') ? 'open-item active':'' }}">
                    <a><i class="fa fa-paper-plane" aria-hidden="true"></i><span>Product</span></a>
                    <ul class="nav child-nav level-1">
                        <li class="{{ request()->is('admin/product/add-product') ? 'active-item':'' }}"><a href="{{ route('admin.addproduct') }}">Add Product</a></li>
                        <li class="{{ request()->is('admin/product/manage-product') ? 'active-item':'' }}"><a href="{{ route('admin.manageproduct') }}">Manage Product</a></li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/coupon') ? 'active-item':'' }}"><a href="{{ route('admin.coupon') }}"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i><span>Coupon</span></a></li>


                <li class="has-child-item close-item {{ request()->is('admin/order/order') ? 'open-item active':'' }} {{ request()->is('admin/order/manage-order') ? 'open-item active':'' }}">
                    <a><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Order
                        </span></a>
                    <ul class="nav child-nav level-1">
                        <li class="{{ request()->is('admin/order/order') ? 'active-item':'' }}"><a href="{{ route('admin.order') }}">Orders</a></li>
                        <li class="{{ request()->is('admin/order/manage-order') ? 'active-item':'' }}"><a href="{{ route('admin.manageorder') }}">Manage Order</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
