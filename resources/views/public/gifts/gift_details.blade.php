<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
$pageInfo = [
    'Gift Details',
    'Home/Gift Details',
    'rating'
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
        

       
     @foreach($productDetails as $key=>$item)   
     
     <?php 
        $defaultImage = DB::table('mktk_gift_media')->where('default_image', 1)->where('gift_id', $item->id)->first();
        if(COUNT($defaultImage) > 0) {
         $defaultImg = $defaultImage->gift_image;
        } else {
            $defaultImg = 'no_preview.jpg';
        }
        $allImages = DB::table('mktk_gift_media')
                         ->where('gift_id', $item->id)
                         ->get();
     
        $rateingCount = DB::table('mktk_gift_rating')->where('gift_id', $item->id)->count();
        $rateingCountSMS = '('.$rateingCount.' Rating)';
        
        $hits = DB::table('mktk_gift')->where('alias', $item->alias)->first();
            $currentHits = $hits->hits;
            $updated_hits = $currentHits + 1;
        $updateHits = DB::table('mktk_gift')->where('alias', $item->alias)->update(['hits' => $updated_hits]);
        
        $updated_hits = $updated_hits + 1;
        $updated_hits = $updated_hits/2;
     ?>
     
     
       

       <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mb-80">
                                <div class="row">
                                    <!-- imgs-zoom-area start -->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="imgs-zoom-area">
                                         
                                            <img id="zoom_03" src="{{asset('gift_images')}}/{{$defaultImg}}" data-zoom-image="{{asset('gift_images')}}/{{$defaultImg}}" alt="">
                                       
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                       @if(COUNT($allImages) > 0) 
                                                       @foreach($allImages as $img) 
                                                        
                                                        <div class="p-c">
                                                            <a href="#" data-image="{{asset('gift_images')}}/{{$img->gift_image}}" data-zoom-image="{{asset('gift_images')}}/{{$img->gift_image}}">
                                                                <img class="zoom_03" src="{{asset('gift_images')}}/{{$img->gift_image}}" alt="">
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        <div class="p-c">
                                                            <a href="#" data-image="{{asset('gift_images')}}/no_preview.jpg" data-zoom-image="{{asset('gift_images')}}/no_preview.jpg">
                                                                <img class="zoom_03" src="{{asset('gift_images')}}/no_preview.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="p-c">
                                                            <a href="#" data-image="{{asset('gift_images')}}/no_preview.jpg" data-zoom-image="{{asset('gift_images')}}/no_preview.jpg">
                                                                <img class="zoom_03" src="{{asset('gift_images')}}/no_preview.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="p-c">
                                                            <a href="#" data-image="{{asset('gift_images')}}/no_preview.jpg" data-zoom-image="{{asset('gift_images')}}/no_preview.jpg">
                                                                <img class="zoom_03" src="{{asset('gift_images')}}/no_preview.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="p-c">
                                                            <a href="#" data-image="{{asset('gift_images')}}/no_preview.jpg" data-zoom-image="{{asset('gift_images')}}/no_preview.jpg">
                                                                <img class="zoom_03" src="{{asset('gift_images')}}/no_preview.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="p-c">
                                                            <a href="#" data-image="{{asset('gift_images')}}/no_preview.jpg" data-zoom-image="{{asset('gift_images')}}/no_preview.jpg">
                                                                <img class="zoom_03" src="{{asset('gift_images')}}/no_preview.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        @endif
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- imgs-zoom-area end -->
                                    <!-- single-product-info start -->
                                    <div class="col-md-7 col-sm-7 col-xs-12"> 
                                        <div class="single-product-info">
                                            <h3 class="text-black-1">{{$item->gift_name}} <span style="float:right; color:#ddd">ID: {{$item->id}}</span></h3>
                                            <h6 class="brand-name-2">{{$item->name}}</h6>
                                            <div class="pro-rating sin-pro-rating f-left">
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

                                                    <span class="text-black-5">{{$rateingCountSMS}}, Hits: {{$updated_hits}}</span>
                                            </div>
                                            <div class="empty20" style="height:1px;"></div>
                                            <!-- hr -->
                                            <hr>
                                            <!-- single-product-tab -->
                                            <div class="single-product-tab">
                                                <ul class="reviews-tab mb-20">
                                                    <li  class="active"><a href="#description" data-toggle="tab">description</a></li>
                                                    <li ><a href="#information" data-toggle="tab">information</a></li>
                                                    <li ><a href="#reviews" data-toggle="tab">reviews</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="description">
                                                        <p>{{$item->short_decription}}</p>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="information">
                                                        <p>{{$item->long_decription}}</p>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="reviews">
                                                        <!-- reviews-tab-desc -->
                                                        <div class="reviews-tab-desc">
                                                            
                                                            <div class="writeReviwerate">
                                                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#productModal" title="Quickview" tabindex="0">Write a Review and Rate</a>
                                                            </div>
                                                            
                                                            
                                                            <!-- single comments -->
                                                            <div class="media mt-30">
                                                                <div class="media-left">
                                                                    <a href="#"><img class="media-object" src="{{asset('frontend/img/author/1.jpg')}}" alt="#"></a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="clearfix">
                                                                        <div class="name-commenter pull-left">
                                                                            <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                                                            <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                                        </div>
                                                                        <div class="pull-right">
                                                                            <ul class="reply-delate">
                                                                                <li><a href="#">Reply</a></li>
                                                                                <li>/</li>
                                                                                <li><a href="#">Delate</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas .</p>
                                                                </div>
                                                            </div>
                                                            <!-- single comments -->
                                                            <div class="media mt-30">
                                                                <div class="media-left">
                                                                    <a href="#"><img class="media-object" src="{{asset('frontend/img/author/2.jpg')}}" alt="#"></a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="clearfix">
                                                                        <div class="name-commenter pull-left">
                                                                            <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                                                            <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                                        </div>
                                                                        <div class="pull-right">
                                                                            <ul class="reply-delate">
                                                                                <li><a href="#">Reply</a></li>
                                                                                <li>/</li>
                                                                                <li><a href="#">Delate</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas .</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  hr -->
                                            <hr>
                                            
                                            <?php
                                            $attributes = DB::table('mktk_gift_attribute')
                                                ->join('mktk_attributes', 'mktk_attributes.attribute_id', '=', 'mktk_gift_attribute.attribute_id')
                                                ->Where('mktk_gift_attribute.gift_id', $item->id)
                                                ->select('mktk_attributes.attribute_name', 'mktk_attributes.attribute_id as attMainId','mktk_gift_attribute.*')
                                                ->groupBy('mktk_gift_attribute.attribute_id')
                                                ->get();
                                            
                                            $attValCount = COUNT($attributes);
                                            ?>
                                            
                                            <div id="attdata_message"></div>
                                           
                                            @if(COUNT($attributes) > 0)
                                            <div class="single-pro-color-rating clearfix" id="attdata_style">
                                               @foreach($attributes as $key=>$att)
                                                    <div class="row">
                                                        <div class="col-sm-3">{{$att->attribute_name}}</div>
                                                        <div class="col-sm-6">
                                                            <select class="custom-select-custom" name="selected_attributes" id="selected_attributes{{$key}}">
                                                                  <option value="">Select {{$att->attribute_name}}</option>
                                                                  <?php
                                                            $attributeValues = DB::table('mktk_gift_attribute')
                                                                        ->Where('attribute_id', $att->attribute_id)
                                                                        ->select('*')
                                                                        ->get();
                                                            ?>
                                                                  @foreach($attributeValues as $attVals) 
                                                                  <option value="{{$attVals->id}}">{{$attVals->value}} </option>
                                                                  @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endforeach
   
                                            </div>
                                            <hr>
                                            @endif
                                            <!-- single-pro-color-rating -->
                                            <div class="single-pro-color-rating clearfix">
                                                <div class="sin-pro-color f-left">
                                                    <h4 class="color-title f-left"><srtong>Price</strong></h4>
                                                    <div class="widget-color f-left">
                                                       <h3> {{$item->active_price}} {{$currency_value}}</h3>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            
                                            <!-- hr -->
                                            <hr>
                                            <!-- plus-minus-pro-action -->
                                            <div class="plus-minus-pro-action">
                                                <div class="sin-plus-minus f-left clearfix">
                                                    <p class="color-title f-left">Qty</p>
                                                    <div class="cart-plus-minus f-left">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>   
                                                </div>
                                                <div class="sin-pro-action f-right">
                                                   
                                                    <button class="btn btn-warning" onclick="check_attributeVal()" id="wishlistModal"><i class="zmdi zmdi-favorite"></i> Add to Wish List</button>
                                                    
                                                    <input type="hidden" id="hidden_pid" name="" value="{{$item->id}}"/>
                                                    
                                                    <a href="" class="btn btn-warning"><i class="zmdi zmdi-shopping-cart-plus"></i></i> Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                    <!-- single-product-info end -->
                                </div>
                            </div>
                            <!-- single-product-area end -->
                            <div class="related-product-area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title text-left mb-40">
                                            <h2 class="uppercase">related product</h2>
                                            <h6>There are many variations of passages of brands available,</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="active-related-product">
                                         <!-- product-item start -->
                                        <div class="col-xs-12">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="single-product.html">
                                                        <img src="{{asset('frontend/img/product/1.jpg')}}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="single-product.html">Product Name</a>
                                                    </h6>
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                    <h3 class="pro-price">$ 869.00</h3>
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
                                         <!-- product-item start -->
                                        <div class="col-xs-12">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="single-product.html">
                                                        <img src="{{asset('frontend/img/product/1.jpg')}}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="single-product.html">Product Name</a>
                                                    </h6>
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                    <h3 class="pro-price">$ 869.00</h3>
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
                                         <!-- product-item start -->
                                        <div class="col-xs-12">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="single-product.html">
                                                        <img src="{{asset('frontend/img/product/1.jpg')}}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="single-product.html">Product Name</a>
                                                    </h6>
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                    <h3 class="pro-price">$ 869.00</h3>
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
                                         <!-- product-item start -->
                                        <div class="col-xs-12">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="single-product.html">
                                                        <img src="{{asset('frontend/img/product/1.jpg')}}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="single-product.html">Product Name</a>
                                                    </h6>
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                    <h3 class="pro-price">$ 869.00</h3>
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
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <!-- widget-search -->
                            <aside class="widget-search mb-30">
                                <form action="{{URL::to('gift-search-results')}}" method="post">
                                                {{csrf_field()}}
                                    <input type="text" name="gift_title" placeholder="Search here...">
                                    <button type="submit" class="searchIcons"><i class="zmdi zmdi-search"></i></button>
                                </form>
                            </aside>
                            <!-- widget-categories -->
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Categories</h6>
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                        @foreach($all_category as $catVal)
                                        <li class="closed"><a href="{{URL('/gift-listing')}}/{{$catVal->alias}}">{{$catVal->name}}</a>
                                            
                                        </li>                                       
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
            

        
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product clearfix">
                               
                                
                                <div class="product-infos">
                                    <h1>Rate and Review</h1>
                                    <div class="price-box-3">
                                        <div class="s-price-box">
                                            <span class="new-price">
                                                <input type="text" class="rating rating-loading" value="4" data-size="xs" title="">
                                                <input type="hidden" id="gift_id" value="{{$item->id}}">
                                            </span>
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                </div><!-- .product-info -->
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div>
            <!-- END Modal -->
        </div>
        <!-- END QUICKVIEW PRODUCT --> 
        
       
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product clearfix">
                               
                                
                                <div class="product-infos">
                                    <h1>Rate and Review</h1>
                                    
                                    <button type="button" id="chooseW">My Wishlist</button>
                                    
                                    <div id="nonee" style="height: 200px; background: #ccc; display: none;"></div>
                                    
                                </div><!-- .product-info -->
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div>
            <!-- END Modal -->
        </div>
        <!-- END QUICKVIEW PRODUCT --> 
        
        
        
        
        
        
        
        
        
        
        
        
        @endforeach 
            
           

        

       
        

        
    </div>
    <!-- Body main wrapper end -->
    
    
    
  


    

 @include('public.footer') 
 
  
 


    <script>
    $(document).on('ready', function () {
        $('.kv-gly-star').rating({
            containerClass: 'is-star'
        });
       
        $('.kv-fa').rating({
            theme: 'krajee-fa',
            filledStar: '<i class="fa fa-star"></i>',
            emptyStar: '<i class="fa fa-star-o"></i>'
        });


        $('.rating,.kv-gly-star,.kv-gly-heart,.kv-uni-star,.kv-uni-rook,.kv-fa,.kv-fa-heart,.kv-svg,.kv-svg-heart').on(
                'change', function () {
                    
                    console.log('Rating selected: ' + $(this).val());
                    
                     $.ajax({
                        type:'post',
                        url:'/getratings',

                        data:{
                          "_token": "{{ csrf_token() }}",
                          'rating_val':$(this).val(),
                          'gift_id': $('#gift_id').val()
                        },

                        success: function (response) {
                                console.log(response)
                        }
                    });
                   
                    
                    
                });
    });
</script>

<script>
$("#chooseW").click(function(){
    $("#nonee").show();
});
</script>


<script>
  
function check_attributeVal() {
    p_giftId = $('#hidden_pid').val();
    p_attval1 = $('#selected_attributes0').val();
    p_attval2 = $('#selected_attributes1').val();
    
    if(p_attval1 != '' && p_attval2 != ''){
        $("#wishlistModal").click(function(){
        $("#productModal2").modal();
        });
    } else {
         document.getElementById("attdata_message").innerHTML = '<p style="color:#f00;">Please select Attributes</p>';
         $("#attdata_style").addClass("attdata_style");
    }
    
   
    
    
}
</script>