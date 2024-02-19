<aside class="sidebar_widget widget-mt">
    <div class="widget_inner">
        <div class="widget-list widget-mb-1">
            <h3 class="widget-title">Search</h3>
            <div class="search-box">
                <div class="input-group">
                    {{-- <form class="form-inline">
                        <div class="form-group">
                            <input type="text" name="" id="" class="form-control search-form-product" placeholder="search . . ." aria-describedby="helpId">
                        </div>
                        <div class="search-ajax-result">

                        </div>
                    </form> --}}
                    <input type="text" class="form-control  search-form-product" placeholder="Search Our Store" aria-label="Search Our Store">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <div class="search-ajax-result">

                    </div>
                </div>
            </div>
        </div>
        <div class="widget-list widget-mb-1">
            <h3 class="widget-title">Menu Categories</h3>
            <!-- Widget Menu Start -->
            <nav>
                <ul class="mobile-menu p-0 m-0">
                    <li class="menu-item-has-children"><a href="#">Breads</a>
                        <ul class="dropdown">
                            <li><a href="#">Skateboard (02)</a></li>
                            <li><a href="#">Surfboard (4)</a></li>
                            <li><a href="#">Accessories (3)</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Fruits</a>
                        <ul class="dropdown">
                            <li><a href="#">Samsome</a></li>
                            <li><a href="#">GL Stylus (4)</a></li>
                            <li><a href="#">Uawei (3)</a></li>
                            <li><a href="#">Avocado (3)</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Vagetables</a>
                        <ul class="dropdown">
                            <li><a href="#">Power Bank</a></li>
                            <li><a href="#">Data Cable (4)</a></li>
                            <li><a href="#">Avocado (3)</a></li>
                            <li><a href="#">Brocoly (3)</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Organic Food</a>
                        <ul class="dropdown">
                            <li><a href="#">Vagetables</a></li>
                            <li><a href="#">Green Food (4)</a></li>
                            <li><a href="#">Coconut (3)</a></li>
                            <li><a href="#">Cabage (3)</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- Widget Menu End -->
        </div>
        <div class="widget-list widget-mb-1">
            <h3 class="widget-title">Categories Product</h3>
            <div class="sidebar-body">
                <ul class="sidebar-list">
                @foreach ($cats_home as $cats)
                    <li><a href="{{route('home.category', $cats->slug)}}">{{$cats->name}}({{$cats->products->count()}})</a></li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="widget-list widget-mb-2">
            <h3 class="widget-title">Color</h3>
            <div class="sidebar-body">
                <div class="sidebar-list">
                    <button type="button" class="btn red"></button>
                    <button type="button" class="btn green"></button>
                    <button type="button" class="btn blue"></button>
                    <button type="button" class="btn yellow"></button>
                    <button type="button" class="btn white"></button>
                    <button type="button" class="btn gold"></button>
                    <button type="button" class="btn gray"></button>
                    <button type="button" class="btn magenta"></button>
                    <button type="button" class="btn maroon"></button>
                    <button type="button" class="btn navy"></button>
                </div>
            </div>
        </div>
        <div class="widget-list widget-mb-3">
            <h3 class="widget-title">Tags Product</h3>
            <div class="sidebar-body">
                <ul class="tags">
                    @foreach ($tags_product_home as $tag_product)
                        <li><a href="{{route('home.tags_product',$tag_product->slug)}}">{{$tag_product->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget-list widget-mb-4">
            <h3 class="widget-title" style="color: #e98c81;">Recent Products</h3>
            <div class="sidebar-body">
                @foreach ($new_products as $item)
                <div class="sidebar-product align-items-center">
                    <a href="{{route('home.product',$item->slug)}}" class="image">
                        <img src="uploads/product/{{$item->image}}" alt="product">
                    </a>
                    <div class="product-content">
                        <div class="product-title">
                            <h4 class="title-2" style="color: #e98c81;font-weight:700;"> <a href="{{route('home.product',$item->slug)}}">{{$item->name}}</a></h4>
                        </div>
                        <div class="price-box">
                            @if ($item->sale_price > 0)
                                <span class="regular-price ">{{number_format($item->sale_price)}}VND</span>
                                <span class="old-price"><del>{{number_format($item->price)}}VND</del></span>
                            @else
                                <span class="regular-price ">{{number_format($item->price)}}VND</span>
                            @endif
                        </div>
                        <div class="category-box">
                            <span>{{$item->cat->name}}</span>
                        </div>
                    </div>
                </div>
                    
                @endforeach

            </div>
        </div>
    </div>
</aside>