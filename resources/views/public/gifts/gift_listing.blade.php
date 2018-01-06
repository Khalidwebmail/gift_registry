
<?php
$pageInfo = [
    'Gift Listing',
    'Home/Gift Listing',
    'gift_listing'
];

$currency = DB::table('mktk_system_detail')->where('type', 'currency_symbol')->first();
$currency_value = $currency->details;


?>  

@include('public.header')
<!-- Body main wrapper start -->
<div class="wrapper">

    @include('public.main_navigation')
    @include('user.user_breadcrumbs') 

    <div class="container">
        @include('public.notification_message')
    </div> 








    <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <div class="shop-content">
                                <!-- shop-option start -->
                                <div class="shop-option box-shadow mb-30 clearfix">
                                    <!-- Nav tabs -->
                                    <ul class="shop-tab f-left" role="tablist">
                                        <li class="active">
                                            <a href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
                                        </li>
                                        <li>
                                            <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                                        </li>
                                    </ul>
                                    <!-- short-by -->
                                    <div class="short-by f-left text-center">
                                        <span>Sort by :</span>
                                        <select>
                                            <option value="volvo">Newest items</option>
                                            <option value="saab">Saab</option>
                                            <option value="mercedes">Mercedes</option>
                                            <option value="audi">Audi</option>
                                        </select> 
                                    </div> 
                                    <!-- showing -->
                                    <div class="showing f-right text-right">
                                        <span>Showing : {{$itemCount}} records</span>
                                    </div>                                   
                                </div>
                                <!-- shop-option end -->
                                <!-- Tab Content start -->
                                <div class="tab-content">
                                    <!-- grid-view -->
                                    <div role="tabpanel" class="tab-pane active" id="grid-view">
                                        <div class="row">
                                            
                                            @if($itemCount == '0')
                                        <h3 class="search_error">No Record Found</h3>

                                        @endif
                                            
                                            @foreach($getGiftItems as $item)
                                            
                                              <?php
                                        $defaultImage = DB::table('mktk_gift_media')->where('default_image', 1)->where('gift_id', $item->id)->first();
                                        if (COUNT($defaultImage) > 0) {
                                            $defaultImg = $defaultImage->gift_image;
                                        } else {
                                            $defaultImg = 'no_preview.jpg';
                                        }
                                        ?>
                                            
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="{{URL('/gift_details')}}/{{$item->alias}}">
                                                        <img src="{{asset('gift_images')}}/{{$defaultImg}}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="{{URL('/gift_details')}}/{{$item->alias}}"> {{$item->gift_name}} </a>
                                                    </h6>
                                                    <div class="pro-rating">
                                                        @if($item->rating >='0.5' && $item->rating < '1.0')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        @elseif($item->rating >= '1.0' && $item->rating < '1.5')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        @elseif($item->rating >= '1.5' && $item->rating < '2.0')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        @elseif($item->rating >= '2.0' && $item->rating < '2.5')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        @elseif($item->rating >= '2.5' && $item->rating < '3.0')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        @elseif($item->rating >= '3.0' && $item->rating < '3.5')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        @elseif($item->rating >= '3.5' && $item->rating < '4.0')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        @elseif($item->rating >= '4.0' && $item->rating < '4.5')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        @elseif($item->rating >= '4.5' && $item->rating < '5.0')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                        @elseif($item->rating >= '5.0')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                        @elseif($item->rating == '')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        @elseif($item->rating == '0.0')
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                        @endif
                                                    </div>
                                                    <h3 class="pro-price"> {{$item->active_price}} {{$currency_value}}</h3>
                                                    <ul class="action-button">
                                                        <li>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product-item end -->
                                            
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- list-view -->
                                    <div role="tabpanel" class="tab-pane" id="list-view">
                                        <div class="row">
                                            
                                            
                                            @foreach($getGiftItems as $item)
                                            
                                            <?php
$defaultImage = DB::table('mktk_gift_media')->where('default_image', 1)->where('gift_id', $item->id)->first();
if (COUNT($defaultImage) > 0) {
    $defaultImg = $defaultImage->gift_image;
} else {
    $defaultImg = 'no_preview.jpg';
}
?>
                                            
                                            <!-- product-item start -->
                                            <div class="col-md-12">
                                            <div class="shop-list product-item">
                                                <div class="product-img">
                                                    <a href="{{URL('/gift_details')}}/{{$item->alias}}">
                                                        <img src="{{asset('gift_images')}}/{{$defaultImg}}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="clearfix">
                                                        <h6 class="product-title f-left">
                                                            <a href="{{URL('/gift_details')}}/{{$item->alias}}"> {{$item->gift_name}} </a>
                                                        </h6>
                                                        <div class="pro-rating f-right">
                                                            @if($item->rating >='0.5' && $item->rating < '1.0')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            @elseif($item->rating >= '1.0' && $item->rating < '1.5')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            @elseif($item->rating >= '1.5' && $item->rating < '2.0')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            @elseif($item->rating >= '2.0' && $item->rating < '2.5')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            @elseif($item->rating >= '2.5' && $item->rating < '3.0')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            @elseif($item->rating >= '3.0' && $item->rating < '3.5')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            @elseif($item->rating >= '3.5' && $item->rating < '4.0')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            @elseif($item->rating >= '4.0' && $item->rating < '4.5')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            @elseif($item->rating >= '4.5' && $item->rating < '5.0')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                            @elseif($item->rating >= '5.0')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                            @elseif($item->rating == '')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            @elseif($item->rating == '0.0')
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <h6 class="brand-name mb-30">
<?php
$catName = DB::table('mktk_gift_categories')->where('id', $item->cat_id)->first();
$catName = $catName->name;
echo $catName;
?>
                                                    </h6>
                                                    <h3 class="pro-price">{{$item->active_price}} {{$currency_value}}</h3>
                                                    <p>{{$item->short_decription}}</p>
                                                    <ul class="action-button">
                                                        <li>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                            <!-- product-item end -->
                                            @endforeach
                                        </div>                                        
                                    </div>
                                </div>
                                <!-- Tab Content end -->
                                <!-- shop-pagination start -->
                                <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <li><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">05</a></li>
                                    <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                </ul>
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <!-- widget-search -->
                            <aside class="widget-search mb-30">
                                <form action="#">
                                    <input type="text" placeholder="Search here...">
                                    <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                </form>
                            </aside>
                            <!-- widget-categories -->
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Categories</h6>
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                        @foreach($all_category as $catVal)
                                        <li><a href="{{URL('/gift-listing')}}/{{$catVal->alias}}">{{$catVal->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>
                            
                           
                           
                            <!-- widget-product -->
                            <aside class="widget widget-product box-shadow">
                                <h6 class="widget-title border-left mb-20">recent products</h6>
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="{{asset('frontend/img/product/4.jpg')}}" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name</a>
                                        </h6>
                                        <h3 class="pro-price">$ 869.00</h3>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="{{asset('frontend/img/product/8.jpg')}}" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name</a>
                                        </h6>
                                        <h3 class="pro-price">$ 869.00</h3>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="{{asset('frontend/img/product/12.jpg')}}" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name</a>
                                        </h6>
                                        <h3 class="pro-price">$ 869.00</h3>
                                    </div>
                                </div>
                                <!-- product-item end -->                               
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->






















</div>
<!-- Body main wrapper end -->


@include('public.footer') 

<script>
    function giftSearchTitle(searchTitle) {
        //console.log(searchTitle);
        $.ajax({
            type: 'post',
            url: '/gift-search-results',
            data: {
                "_token": "{{ csrf_token() }}",
                'searchTitle': searchTitle

            },
            success: function (data) {

                document.getElementById("ajaxDataPrint").innerHTML = data;
                document.getElementById("ajaxDataPrint2").innerHTML = data;
               

            }
        });
    }

    function giftSearchCategory(giftCat, ajax_title_search) {
        var selected = new Array();
        console.log(ajax_title_search);

        $("input:checkbox[name=cat_id]:checked").each(function () {
            selected.push($(this).val());

        });
        //console.log(searchTitle);

        $.ajax({
            type: 'post',
            url: '/gift-search-results',
            data: {
                "_token": "{{ csrf_token() }}",
                'giftCatId': selected

            },
            success: function (data) {
                
                 
                 document.getElementById("ajaxDataPrint").innerHTML = data;
                 document.getElementById("ajaxDataPrint2").innerHTML = data;
//                 document.getElementById("itemCount").innerHTML = data.totalItem;
                

            }
        });
    }

</script>

