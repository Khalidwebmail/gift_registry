<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Session;

session_start();

class PublicPageController extends Controller {

    public function index(Request $request) {

        $latest_product = DB::table('mktk_gift')
                        ->join('mktk_gift_categories', 'mktk_gift.cat_id', '=', 'mktk_gift_categories.id')
                        ->where('mktk_gift.publish', 1)
                        ->where('mktk_gift.featured', 1)
                        ->orderby('mktk_gift.id', 'DESC')
                        ->limit(10)
                        //->select('mktk_gift.id','mktk_gift_categories.name','mktk_gift.gift_name','mktk_gift.alias','mktk_gift.short_decription','mktk_gift.sell_price', 'mktk_gift.special_price')->get();
                        ->select('mktk_gift.*', 'mktk_gift_categories.name')->get();

        return view('public.welcome', compact('latest_product'));
    }

    public function getSignin() {
        return view('public.login');
    }

    public function getProductByCategory(Request $request) {
        $product_by_category = $user = DB::table('mktk_gift')
                        ->where('cat_id', $request->id)->get();
        return view('public.product_by_category', compact('product_by_category'));
    }

    public function getGiftDetailsPage($param1 = '') {



        $productDetails = DB::table('mktk_gift')
                        ->join('mktk_gift_categories', 'mktk_gift.cat_id', '=', 'mktk_gift_categories.id')
                        ->where('mktk_gift.alias', $param1)
                        ->select('mktk_gift.*', 'mktk_gift_categories.name')->get();

        $all_category = DB::table('mktk_gift_categories')->get();

        return view('public.gifts.gift_details', compact('productDetails', 'all_category'));
    }

    public function singleGift_rating(Request $request) {
        $userId = $request->session()->get('user.id');

        $rating_val = $request->rating_val;
        $giftId = $request->gift_id;

        $checking_user = DB::table('mktk_gift_rating')
                ->where('user_id', $userId)->where('gift_id', $giftId)
                ->get();

        if (COUNT($checking_user) == 0) {

            $data = [

                'gift_id' => $giftId,
                'user_id' => $userId,
                'rated_value' => $rating_val
            ];
            $data_insert = DB::table('mktk_gift_rating')->insert($data);
        } else {
            $data_update = DB::table('mktk_gift_rating')->where('user_id', $userId)->where('gift_id', $giftId)->update(['rated_value' => $rating_val]);
        }

        $sumRating = DB::table('mktk_gift_rating')->where('gift_id', $giftId)->sum('rated_value');
        $rowCount = DB::table('mktk_gift_rating')->where('gift_id', $giftId)->count();
        $avgrating = $sumRating / $rowCount;

        $gift_update = DB::table('mktk_gift')->where('id', $giftId)->update(['rating' => $avgrating]);
    }

    public function subscribe(Request $request) {

        $subscriber_email = $request->subscriber_email;
        $created_at = Carbon::now();

        $checking_email = DB::table('mktk_newsletter_subscribers')
                ->where('subscriber_email', $subscriber_email)
                ->get();

        if (COUNT($checking_email) == 0) {
            $InsertSubscriber = DB::table('mktk_newsletter_subscribers')->insert(['subscriber_email' => $subscriber_email, 'created_at' => $created_at]);
            $messageName = ['success' => 'Your email is successfully subscribed'];
            if ($InsertSubscriber) {
                return response()->json($messageName);
            }
        } else {
            $messageName = ['error' => 'Your email is already in newsletter'];
            return response()->json($messageName);
        }
    }

    public function unsubscribe(Request $request, $subscriber_email) {
        $sqlSubscriber_email = DB::table('mktk_subscriber_email')
                        ->Where('subscriber_email', 'like', $subscriber_email)->get();

        if (count($subscriber_email) > 0) {
            $unsubscribe = DB::table('mktk_subscriber_email')
                    ->where('subscriber_email', $subscriber_email)
                    ->update(['status' => 0]);

            return redirect()->back()->with('success', 'You successfully unsubscribe from newsletter!!');
        }
    }

    public function searchGifts() {

        $all_category = DB::table('mktk_gift_categories')->get();

        return view('public.gifts.search_gifts', compact('all_category'));
    }

    public function searchGifts_post(Request $request) {

        $gift_title = $request->gift_title;
        $giftAjaxtitle = $request->searchTitle;
        $giftCatId = $request->giftCatId;
        //echo $giftCatId
        //print_r($giftCatId);

        $all_category = DB::table('mktk_gift_categories')->get();
        if (!empty($gift_title)) {




            $gift_details = DB::table('mktk_gift')
                    ->Where('gift_name', 'like', '%' . $gift_title . '%')
                    ->get();
            $itemValue = [];
            foreach ($gift_details as $key => $val) {
                $itemValue[$key] = $val;
            }

            if (!empty($gift_details)) {
                return view('public.gifts.search_gifts', [
                    'gift_items' => $itemValue,
                    'all_category' => $all_category,
                    'item_count' => COUNT($gift_details)
                ]);
            } else {
                return redirect()->back()->with('error', 'No result found');
            }
        }

        // Ajax Title Seatch
        else if (!empty($giftAjaxtitle)) {
            $gift_details = DB::table('mktk_gift')
                    ->join('mktk_gift_categories', 'mktk_gift.cat_id', '=', 'mktk_gift_categories.id')
                    ->Where('gift_name', 'like', '%' . $giftAjaxtitle . '%')
                    ->select('mktk_gift.*', 'mktk_gift_categories.name')
                    ->get();
            $itemValue = [];
            foreach ($gift_details as $key => $val) {
                $itemValue[$key] = $val;
            }

            if (!empty($gift_details)) {
                $dataAjax = [
                    'gift_items' => $itemValue,
                    'all_category' => $all_category,
                    'item_count' => COUNT($gift_details)
                ];
                // return response()->json($dataAjax);

                if (COUNT($gift_details) > 0) {

                    foreach ($itemValue as $item) {

                        $detailsPath = "gift_details/";
                        $imagePath = 'http://localhost:8000/gift_images/';
                        $defaultImage = DB::table('mktk_gift_media')->where('gift_id', $item->id)->where('default_image', 1)->first();
                        if (!empty($defaultImage->gift_image)) {
                            $defaultImage = $defaultImage->gift_image;
                        } else {
                            $defaultImage = 'no_preview.jpg';
                        }
                        $dataItems = '
                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="single-product.html">
                                                            <img src="' . $imagePath . $defaultImage . '" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                            <a href="' . $detailsPath . '' . $item->alias . '"> ' . $item->gift_name . ' </a>
                                                        </h6>
                                                        <div class="pro-rating">
                                                            
                                                        </div>
                                                        <h3 class="pro-price"> ' . $item->active_price . '</h3>
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


                                            

                ';

                        echo $dataItems;
                    }
                } else {
                    echo '<div class="search_error">No record Found</div>';
                }
            }
        }  // End of Only Ajax Title Search
        else if (!empty($giftCatId)) {
            $returnData = [];
            $va = DB::table('mktk_gift')
                    ->join('mktk_gift_categories', 'mktk_gift.cat_id', '=', 'mktk_gift_categories.id')
                    ->Where('gift_name', 'like', '%' . $giftAjaxtitle . '%')
                    ->whereIn('mktk_gift_categories.id', $giftCatId)
                    ->select('mktk_gift_categories.name', 'mktk_gift.*')
                    ->get();



            $itemValue = [];
            foreach ($va as $key => $val) {
                $itemValue[$key] = $val;
            }

            if (COUNT($va) > 0) {
                //$dataItems=[];
                foreach ($itemValue as $item) {

                    $detailsPath = "gift_details/";
                    $imagePath = 'http://localhost:8000/gift_images/';

                    $defaultImage = DB::table('mktk_gift_media')->where('gift_id', $item->id)->where('default_image', 1)->first();
                    if (!empty($defaultImage->gift_image)) {
                        $defaultImage = $defaultImage->gift_image;
                    } else {
                        $defaultImage = 'no_preview.jpg';
                    }

                    $dataItems = '
                    
                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="' . $detailsPath . '' . $item->alias . '">
                                                            <img src="' . $imagePath . $defaultImage . '" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                            <a href="' . $detailsPath . '' . $item->alias . '"> ' . $item->gift_name . ' </a>
                                                        </h6>
                                                        <div class="pro-rating">
                                                            
                                                        </div>
                                                        <h3 class="pro-price"> ' . $item->active_price . '</h3>
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

                ';

                    echo $dataItems;
                }

//                 $returnData=['grid'=>$dataItems];
                //return response()->json($dataItems);
            } else {
                echo '<div class="search_error">No record Found</div>';
            }
        } else {
            return view('public.gifts.search_gifts', [
                'all_category' => $all_category,
                'item_count' => '0'
            ]);
        }
    }

    public function getGiftListingPage($param1 = '') {

        $all_category = DB::table('mktk_gift_categories')->get();

        $getCatId = DB::table('mktk_gift_categories')->where('alias', $param1)->first();
        $getCatId = $getCatId->id;

        $getGiftItems = DB::table('mktk_gift')
                ->join('mktk_gift_categories', 'mktk_gift.cat_id', '=', 'mktk_gift_categories.id')
                ->Where('mktk_gift.cat_id', $getCatId)
                ->Where('mktk_gift.publish', 1)
                ->select('mktk_gift_categories.name', 'mktk_gift.*')
                ->get();

        $itemCount = COUNT($getGiftItems);

        return view('public.gifts.gift_listing', compact('all_category', 'getGiftItems', 'itemCount'));
    }

    public function getContactus() {
        return view('public.contact_us');
    }

    public function getWishlistSearch()
    {
        return view('public.user_wishlist_info');
    }

    public function searchWishlist(Request $request)
    {
        $access_code=$request->access_code;
        $search_wishlist = DB::table('mktk_user_wish_list')->where('access_code',$access_code)->first();
        // print_r($search_wishlist);
        // exit;
        return view('public.user_wishlist_info',compact('search_wishlist'));
    }

    // public function getContactus()
    // {
    //     return view('public.contact_us');
    // }
}
