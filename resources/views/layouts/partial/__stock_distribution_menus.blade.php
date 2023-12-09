<?php
$menu = [
    'stock_distribution_unit','stock_distribution_unit_add','stock_distribution_unit_edit',
    'stock_distribution_category','stock_distribution_category_add','stock_distribution_category_edit',
    'stock_distribution_sub_category','stock_distribution_sub_category_add','stock_distribution_sub_category_edit',
    'stock_distribution_product','stock_distribution_product_add','stock_distribution_product_edit',
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $menu) ? 'menu-open' : '' }}">
    <a href="#"
       class="nav-link {{ in_array(Route::currentRouteName(), $menu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            প্রোডাক্ট ম্যানেজ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php
        $subMenu = ['stock_distribution_unit','stock_distribution_unit_add','stock_distribution_unit_edit',]
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_unit') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                ইউনিট</a>
        </li>
        <?php
        $subMenu = ['stock_distribution_category','stock_distribution_category_add','stock_distribution_category_edit']
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_category') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                ক্যাটাগরি</a>
        </li>
        <?php
        $subMenu = ['stock_distribution_sub_category','stock_distribution_sub_category_add','stock_distribution_sub_category_edit']
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_sub_category') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                সাব-ক্যাটাগরি</a>
        </li>
        <?php
        $subMenu = ['stock_distribution_product','stock_distribution_product_add','stock_distribution_product_edit']
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_product') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                প্রোডাক্ট</a>
        </li>
    </ul>
</li>
<?php
$menu = [
    'stock_distribution_supplier','stock_distribution_supplier_add','stock_distribution_supplier_edit',
    'stock_distribution_purchases','stock_distribution_purchase_receipt_all','stock_distribution_purchase_inventory_all',
    'stock_distribution_purchase_inventory_details','stock_distribution_purchase_receipt_details',
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $menu) ? 'menu-open' : '' }}">
    <a href="#"
       class="nav-link {{ in_array(Route::currentRouteName(), $menu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            ক্রয় পরিচালনা
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php
        $subMenu = ['stock_distribution_supplier','stock_distribution_supplier_add','stock_distribution_supplier_edit',];
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_supplier') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                সরবরাহকারী </a>
        </li>
        <?php
        $subMenu = ['stock_distribution_purchases',];
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_purchases') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                ক্রয় </a>
        </li>
        <?php
        $subMenu = ['stock_distribution_purchase_receipt_all','stock_distribution_purchase_receipt_details'];
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_purchase_receipt_all') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                রসিদ </a>
        </li>
        <?php
        $subMenu = ['stock_distribution_purchase_inventory_all','stock_distribution_purchase_inventory_details',];
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_purchase_inventory_all') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                ইনভেন্টরি </a>
        </li>

    </ul>
</li>

<?php
$menu = [
    'stock_distribution_all_distribution','stock_distribution_product_distribution',
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $menu) ? 'menu-open' : '' }}">
    <a href="#"
       class="nav-link {{ in_array(Route::currentRouteName(), $menu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            ডিস্ট্রিবিউশন ম্যানেজ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php
        $subMenu = ['stock_distribution_all_distribution',];
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_all_distribution') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                প্রোডাক্ট ডিস্ট্রিবিউশন</a>
        </li>
        <?php
        $subMenu = ['stock_distribution_product_distribution',];
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_product_distribution') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                প্রোডাক্ট ডিস্ট্রিবিউশন যোগ</a>
        </li>
    </ul>
</li>

<?php
$menu = [
    'stock_distribution_damage_product','stock_distribution_damage_product_add',
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $menu) ? 'menu-open' : '' }}">
    <a href="#"
       class="nav-link {{ in_array(Route::currentRouteName(), $menu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            নষ্ট প্রোডাক্ট ম্যানেজ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php
        $subMenu = ['stock_distribution_damage_product',];
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_damage_product') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                নষ্ট প্রোডাক্ট </a>
        </li>
        <?php
        $subMenu = ['stock_distribution_damage_product_add',];
        ?>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}"
               href="{{ route('stock_distribution_damage_product_add') }}">
                <i class="far  {{  in_array(Route::currentRouteName(), $subMenu)  ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                নষ্ট প্রোডাক্ট যোগ</a>
        </li>
    </ul>
</li>
