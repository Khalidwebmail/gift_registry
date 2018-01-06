
<?php 
$currency = DB::table('mktk_system_detail')->where('type', 'currency_symbol')->first();
$currency_value = $currency->details;


?>



 <div class="featured-product-section section-bg-tb pt-80 pb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Featured product</h2>
                                <h6>There are many variations of passages of brands available,</h6>
                            </div>
                        </div>
                    </div>
                    <div class="featured-product">
                        <div class="row active-featured-product slick-arrow-2">
                            
                            @foreach($latest_product as $key=>$item)
                            
                           <?php 
                           $product_image = DB::table('mktk_gift_media')
                                           ->where('gift_id', $item->id)
                                           ->where('default_image', 1)
                                           ->get();
                           
                           ?>
                            <!-- product-item start -->
                            <div class="col-xs-12">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="{{URL('/gift_details')}}/{{$item->alias}}">
                                            <?php $featuredImg = '';?>
                                            @foreach($product_image as $img)
                                                <?php $featuredImg = $img->gift_image; ?>
                                              <img src="{{asset('gift_images')}}/{{$featuredImg}}" alt=""/>
                                            @endforeach
                                            
                                            @if($featuredImg == '')
                                                <img src="{{asset('gift_images')}}/no_preview.jpg" alt=""/>
                                            @endif
                                           
                                            
                                        </a>
                                    </div>
                                    <div class="product-info customProductBG">
                                        <h6 class="product-title">
                                            <a href="{{URL('/gift_details')}}/{{$item->alias}}">{{$item->gift_name}}</a>
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
                                        <h3 class="pro-price">{{$item->active_price}} {{$currency_value}}</h3>
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
            </div>
            <!-- FEATURED PRODUCT SECTION END -->
            
            
             
                           
                            <!-- START QUICKVIEW PRODUCT -->     
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
                                                <div class="product-images">
                                                    <div class="main-image images">
                                                        <img alt="" src="{{asset('frontend/img/product/quickview.jpg')}}">
                                                    </div>
                                                </div><!-- .product-images -->

                                                <div class="product-info">
                                                    <h1>Aenean eu tristique</h1>
                                                    <div class="price-box-3">
                                                        <div class="s-price-box">
                                                            <span class="new-price">£160.00</span>
                                                            <span class="old-price">£190.00</span>
                                                        </div>
                                                    </div>
                                                    <a href="single-product-left-sidebar.html" class="see-all">See all features</a>
                                                    <div class="quick-add-to-cart">
                                                        <form method="post" class="cart">
                                                            <div class="numbers-row">
                                                                <input type="number" id="french-hens" value="3">
                                                            </div>
                                                            <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                                        </form>
                                                    </div>
                                                    <div class="quick-desc">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                                                    </div>
                                                    <div class="social-sharing">
                                                        <div class="widget widget_socialsharing_widget">
                                                            <h3 class="widget-title-modal">Share this product</h3>
                                                            <ul class="social-icons clearfix">
                                                                <li>
                                                                    <a class="facebook" href="#" target="_blank" title="Facebook">
                                                                        <i class="zmdi zmdi-facebook"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="google-plus" href="#" target="_blank" title="Google +">
                                                                        <i class="zmdi zmdi-google-plus"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="twitter" href="#" target="_blank" title="Twitter">
                                                                        <i class="zmdi zmdi-twitter"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="pinterest" href="#" target="_blank" title="Pinterest">
                                                                        <i class="zmdi zmdi-pinterest"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="rss" href="#" target="_blank" title="RSS">
                                                                        <i class="zmdi zmdi-rss"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
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
                            
                            
                             