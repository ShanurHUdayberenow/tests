<li>
    <a href="{{route('admin.dashboard')}}" ><i class="ti-dashboard"></i><span>{{trans('message.dashboard', [])}}</span></a>
</li>

@if (auth()->user()->role == 'operator')
<li>
    <a href="{{route('orderProduct.index')}}" ><i class="bi bi-basket-fill"></i><span>{{trans('message.orderProduct', [])}}</span></a>
</li>
<!-- <li>
    <a href="{{route('offerProduct.index')}}" ><i class="bi bi-basket-fill"></i><span>{{trans('message.offerProduct', [])}}</span></a>
</li> -->
@endif
@if (auth()->user()->role == 'admin')
<li class="active">
    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-shopping-cart"></i><span>{{trans('message.product', [])}}</span></a>
    <ul class="collapse in">
        <li>
            <a href="{{route('category.index')}}" ><i class="ti-menu-alt"></i><span>{{trans('message.category_plural', [])}}</span></a>
        </li>

        <li>
            <a href="{{route('subcategory.index')}}" ><i class="ti-menu-alt"></i><span>{{trans('message.subcategory_plural', [])}}</span></a>
        </li>
        <li>
            <a href="{{route('brand.index')}}" ><i class="ti-shopping-cart"></i><span>{{trans('message.brand_plural', [])}}</span></a>
        </li>
        <li>
            <a href="{{route('pacet.index')}}" ><i class="ti-shopping-cart"></i><span>{{trans('message.pacet_plural', [])}}</span></a>
        </li>

        {{-- <li>
            <a href="{{route('subsubcategory.index')}}" ><i class="ti-menu-alt"></i><span>{{trans('message.subsubcategory_plural', [])}}</span></a>
        </li> --}}

        <li>
            <a href="{{route('attribute.index')}}" ><i class="ti-list"></i><span>{{trans('message.attribute_plural', [])}}</span></a>
        </li>

        <li>
            <a href="{{route('product.index')}}" ><i class="ti-shopping-cart"></i><span>{{trans('message.product_plural', [])}}</span></a>
        </li>

        
        

        {{-- <li>
            <a href="{{route('unit.index')}}" ><i class="ti-list"></i><span>{{trans('message.unit_plural', [])}}</span></a>
        </li> --}}
    </ul>
</li>
{{-- <li>
    <a href="{{route('rate.index')}}" ><i class="ti-money"></i><span>{{trans('message.rate_plural', [])}}</span></a>
</li> --}}

{{-- <li>
    <a href="{{route('userDiscount.index')}}" ><i class="bi bi-people-fill"></i><span>{{trans('message.userDiscount_plural', [])}}</span></a>
</li> --}}

<li>
    <a href="{{route('orderProduct.index')}}" ><i class="bi bi-basket-fill"></i><span>{{trans('message.orderProduct', [])}}</span></a>
</li>
<!-- <li>
    <a href="{{route('offerProduct.index')}}" ><i class="bi bi-basket-fill"></i><span>{{trans('message.offerProduct', [])}}</span></a>
</li> -->
<li>
    <a href="{{route('feedBack.index')}}" ><i class="bi bi-envelope-fill"></i><span>{{trans('message.feedBack', [])}}</span></a>
</li>
<li>
    <a href="{{route('user.index')}}" ><i class="bi bi-people-fill"></i><span>{{trans('message.user', [])}}</span></a>
</li>
<li>
    <a href="{{route('role.index')}}" ><i class="bi bi-people-fill"></i><span>{{trans('message.role', [])}}</span></a>
</li>
{{-- 
<li>
    <a href="{{route('shop.index')}}" ><i class="bi bi-shop-window"></i><span>{{trans('message.shop_plural', [])}}</span></a>
</li>

<li>
    <a href="{{route('shopProduct.index')}}" ><i class="bi bi-cart2"></i><span>{{trans('message.shopProduct_plural', [])}}</span></a>
</li> --}}


{{-- <li>
    <a href="{{route('setting.index')}}" ><i class="ti-settings"></i><span>{{trans('message.setting_plural', [])}}</span></a>
</li> --}}

<li class="active">
    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i><span>{{trans('message.frontend', [])}}</span></a>
    <ul class="collapse in">
        <li>
            <a href="{{route('logo.index')}}" ><i class="bi bi-image"></i><span>{{trans('message.logo_plural', [])}}</span></a>
        </li>
        <li>
            <a href="{{route('footerLogo.index')}}" ><i class="bi bi-image"></i><span>{{trans('message.footerLogo_plural', [])}}</span></a>
        </li>
        <li>
            <a href="{{route('banner.index')}}" ><i class="bi bi-image"></i><span>{{trans('message.banner_plural', [])}}</span></a>
        </li>
        <li>
            <a href="{{route('magazineInformation.index')}}" ><i class="bi bi-chat-square-text-fill"></i><span>{{trans('message.magazineInformation_plural', [])}}</span></a>
        </li>
        <li>
            <a href="{{route('aboutUs.index')}}" ><i class="bi bi-chat-square-text-fill"></i><span>{{trans('message.aboutUs_plural', [])}}</span></a>
        </li>
        <li>
            <a href="{{route('colorSetting.index')}}" ><i class="bi bi-chat-square-text-fill"></i><span>{{trans('message.colorSetting_plural', [])}}</span></a>
        </li>
        <li>
            <a href="{{route('map.index')}}" ><i class="bi bi-map"></i><span>{{trans('message.map_plural', [])}}</span></a>
        </li>
    </ul>
</li>
@endif
