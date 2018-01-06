<?php

namespace App\Http\Controllers;

 
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class AdminPageController extends Controller {

    public function index(Request $request) {
        return view('admin.admin_dashboard');
    }

    public function getAdminlogin() {
        return view('admin.admin_login');
    }

    public function getManageUsers_users() {
        return view('admin.admin_manage_users');
    }

    public function getManageUsers_approveVendors() {
        return view('admin.admin_approve_vendors');
    }

    public function getManageUsers_Vendors() {
        return view('admin.admin_manage_vendors');
    }

    public function getManageUsers_AdminUsers() {
        return view('admin.admin_manage_admin_users');
    }

    public function getGift_categories() {
        $all_category = DB::table('mktk_gift_categories')->get();

        return view('admin.gifts.admin_gift_categories', compact('all_category'));
    }

    public function saveGiftCategory(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'alias' => 'required',
        ]);

        $data = request()->all();
        unset($data['_token']);

        $insert_gift_category = DB::table('mktk_gift_categories')->insert($data);
        if ($insert_gift_category) {
            return Redirect('/gift-categories')->with('success', 'Gift Has been created.');
        }
    }

    public function updateGiftCategory(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'alias' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['alias'] = $request->alias;

        DB::table('mktk_gift_categories')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Gift Category has been Updated.');
    }

    public function publishCategory($id) {
        $data = array();
        $data['publish'] = 1;
        DB::table('mktk_gift_categories')
                ->where('id', $id)
                ->update($data);
        return redirect()->back()->with('success', 'Gift Category has been Published.');
    }

    public function unpublishCategory($id) {
        $data = array();
        $data['publish'] = 0;
        DB::table('mktk_gift_categories')
                ->where('id', $id)
                ->update($data);
        return redirect()->back()->with('success', 'Gift Category has been unpublished.');
    }

    public function deleteCategory($id) {
        DB::table('mktk_gift_categories')->where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Gift Category has been deleted.');
    }

    public function getCreate_gifts(Request $request) {

        $userId = $request->session()->get('user.id');
        $temp_creator = $request->session()->get('temp_creator');


        $gift_id = 'no_id';
        $cat_id = '';
        $gift_name = '';
        $gift_sku = '';
        $alias = '';
        $featured = '';
        $access = '';
        $publish_status = '';
        $new_arrival = '';
        $sell_price = '';
        $special_price = '';
        $active_price = '';
        $discount_type = '';
        $discount_value = '';
        $discounted_price = '';
        $short_decription = '';
        $long_decription = '';
        $quantity = '';
        $stock_status = '';
        $lower_stock = '';
        $meta_keywords = '';
        $meta_des = '';
        $giftImg = [];



        // Rendering category list
        $categories = DB::table('mktk_gift_categories')->get();
        $catValue = [];
        foreach ($categories as $key => $val) {
            $catValue[$key] = $val;
        }

        $attributes = DB::table('mktk_attributes')->get();
        $attValue = [];
        foreach ($attributes as $att => $attVa) {
            $attValue[$att] = $attVa;
        }

        if (!empty($temp_creator)) {
            $gifts = DB::table('mktk_gift')->where('created_by', '=', $userId)->orderBy('id', 'desc')->limit(1)->get();

            $gift_id = $gifts[0]->id;
            $cat_id = $gifts[0]->cat_id;
            $gift_name = $gifts[0]->gift_name;
            $gift_sku = $gifts[0]->gift_sku;
            $alias = $gifts[0]->alias;
            $featured = $gifts[0]->featured;
            $access = $gifts[0]->access;
            $publish_status = $gifts[0]->publish;
            $new_arrival = $gifts[0]->new_arrival;
            $sell_price = $gifts[0]->sell_price;
            $special_price = $gifts[0]->special_price;
            $active_price = $gifts[0]->active_price;
            $discount_type = $gifts[0]->discount_type;
            $discount_value = $gifts[0]->discount_value;
            $discounted_price = $gifts[0]->discounted_price;
            $short_decription = $gifts[0]->short_decription;
            $long_decription = $gifts[0]->long_decription;

            $quantity = $gifts[0]->quantity;
            $stock_status = $gifts[0]->stock_status;
            $lower_stock = $gifts[0]->lower_stock;

            $meta_keywords = $gifts[0]->meta_keywords;
            $meta_des = $gifts[0]->meta_des;



            $sell_price = number_format($sell_price, 2);
            $special_price = number_format($special_price, 2);
            $active_price = number_format($active_price, 2);
            $discounted_price = number_format($discounted_price, 2);


            $gift_images = DB::table('mktk_gift_media')->where('gift_id', '=', $gift_id)->get();
            $giftImg = [];
            foreach ($gift_images as $img => $dat) {
                $giftImg[$img] = $dat;
            }
        }


        return view('admin.gifts.admin_create_gifts', [
            'categories' => $catValue,
            'attributes' => $attributes,
            'cat_id' => $cat_id,
            'gift_name' => $gift_name,
            'gift_sku' => $gift_sku,
            'alias' => $alias,
            'featured' => $featured,
            'access' => $access,
            'publish_status' => $publish_status,
            'new_arrival' => $new_arrival,
            'sell_price' => $sell_price,
            'special_price' => $special_price,
            'active_price' => $active_price,
            'discount_type' => $discount_type,
            'discount_value' => $discount_value,
            'discounted_price' => $discounted_price,
            'gift_id' => $gift_id,
            'short_decription' => $short_decription,
            'long_decription' => $long_decription,
            'quantity' => $quantity,
            'stock_status' => $stock_status,
            'lower_stock' => $lower_stock,
            'meta_keywords' => $meta_keywords,
            'meta_des' => $meta_des,
            'giftImages' => $giftImg
        ]);
    }

    public function getCreate_gifts_dataSave(Request $request, $param1 = '', $param2 = '') {

        //$request->session()->put('temp_creator', '');
        //$temp_creator =  $request->session()->get('temp_creator');
        $userId = $request->session()->get('user.id');
        $save_exit = $request->save_exit;

        $gift_name = '';
        $gift_alias = '';
        $gift_sku = '';
        $gift_category = '';
        $gift_status = '';
        $gift_access = '';
        $gift_featured = '';
        $gift_new = '';
        $sell_price = '';
        $special_price = '';
        $active_price = '';
        $discount_type = '';
        $discount_value = '';
        $discounted_price = '';
        $short_decription = '';
        $long_decription = '';
        $quantity = '';
        $stock_status = '';
        $lower_stock = '';
        $gift_image = '';

        $meta_keywords = '';
        $meta_des = '';


        $gift_name = $request->gift_name;
        $gift_alias = $request->gift_alias;
        $gift_sku = $request->gift_sku;
        $gift_category = $request->gift_category;
        $gift_status = $request->gift_status;
        $gift_access = $request->gift_access;
        $gift_featured = $request->gift_featured;
        $gift_new = $request->gift_new;

        $sell_price = $request->sell_price;
        $special_price = $request->special_price;
        $active_price = $request->active_price;
        $discount_type = $request->discount_type;
        $discount_value = $request->discount_value;
        $discounted_price = $request->discounted_price;

        $short_decription = $request->short_description;
        $long_decription = $request->long_description;

        $quantity = $request->quantity;
        $stock_status = $request->stock_status;
        $lower_stock = $request->lower_stock;

        $meta_keywords = $request->meta_keywords;
        $meta_des = $request->meta_des;

        $gift_image = $request->gift_image;

        //checking same alias
        $getAlias = DB::table('mktk_gift')
                ->where('alias', '=', $gift_alias)
                //->where('id', '!=', $param2)
                ->get();

        $aliasNumber = COUNT($getAlias);
        //checking same alias
        $getAlias2 = DB::table('mktk_gift')
                ->where('alias', '=', $gift_alias)
                ->where('id', '!=', $param2)
                ->get();

        $aliasNumber2 = COUNT($getAlias2);


        if ($gift_featured == 'on') {
            $gift_featured = 1;
        } else {
            $gift_featured = 0;
        }
        if ($gift_new == 'on') {
            $gift_new = 1;
        } else {
            $gift_new = 0;
        }

        $data = [

            'cat_id' => $gift_category,
            'created_by' => $userId,
            'gift_name' => $gift_name,
            'alias' => $gift_alias,
            'publish' => $gift_status,
            'gift_sku' => $gift_sku,
            'access' => $gift_access,
            'featured' => $gift_featured,
            'new_arrival' => $gift_new,
            'created_at' => Carbon::now()
        ];

        if ($param1 == 'basic_settings') {

            $this->validate($request, [

                'gift_name' => 'required',
                'gift_category' => 'required',
            ]);

            if (isset($_POST['save_exit'])) {
                if ($param2 == 'no_id') {
                    if ($aliasNumber == 0) {
                        $request->session()->put('temp_creator', '');
                        $data_insert = DB::table('mktk_gift')->insert($data);
                        return Redirect('/list-of-gifts')->with('success', 'Gift has been created.');
                    } else {
                        $request->session()->put('temp_creator', '');
                        return Redirect('/create-gifts')->with('error', 'There is already gift item with same alias. Please try diffrent alias');
                    }
                } else {
                    if ($aliasNumber2 == 0) {
                        $dataUpdate = DB::table('mktk_gift')
                                ->where('id', $param2)
                                ->update([
                            'cat_id' => $gift_category,
                            'created_by' => $userId,
                            'gift_name' => $gift_name,
                            'alias' => $gift_alias,
                            'publish' => $gift_status,
                            'gift_sku' => $gift_sku,
                            'access' => $gift_access,
                            'featured' => $gift_featured,
                            'new_arrival' => $gift_new,
                            'updated_at' => Carbon::now()
                        ]);
                        $request->session()->put('temp_creator', '');
                        return Redirect('/list-of-gifts')->with('success', 'Gift Information Has been Updated');
                    } else {
                        $request->session()->put('temp_creator', 'temp_data');
                        return Redirect('/create-gifts')->with('error', 'There is already gift item with same alias. Please try diffrent alias');
                    }
                }
            } else if ($param2 == 'no_id') {
                if ($aliasNumber == 0) {
                    $data_insert = DB::table('mktk_gift')->insert($data);
                    $request->session()->put('temp_creator', 'temp_data');
                    return Redirect('/create-gifts')->with('success', 'Gift has been created.');
                } else {
                    $request->session()->put('temp_creator', '');
                    return Redirect('/create-gifts')->with('error', 'There is already gift item with same alias. Please try diffrent alias');
                }
            } else {
                if ($aliasNumber2 == 0) {
                    $dataUpdate = DB::table('mktk_gift')
                            ->where('id', $param2)
                            ->update([
                        'cat_id' => $gift_category,
                        'created_by' => $userId,
                        'gift_name' => $gift_name,
                        'alias' => $gift_alias,
                        'publish' => $gift_status,
                        'gift_sku' => $gift_sku,
                        'access' => $gift_access,
                        'featured' => $gift_featured,
                        'new_arrival' => $gift_new,
                        'updated_at' => Carbon::now()
                    ]);
                    $request->session()->put('temp_creator', 'temp_data');
                    return Redirect('/create-gifts')->with('success', 'Gift Information Has been Updated');
                } else {
                    $request->session()->put('temp_creator', 'temp_data');
                    return Redirect('/create-gifts')->with('error', 'There is already gift item with same alias. Please try diffrent alias');
                }
            }
        } // End of basic settings

        if ($param1 == 'gift_pricing') {

            if (isset($_POST['save_exit_two'])) {

                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'sell_price' => $sell_price,
                    'active_price' => $active_price,
                    'special_price' => $special_price,
                    'discount_type' => $discount_type,
                    'discount_value' => $discount_value,
                    'discounted_price' => $discounted_price,
                    'updated_at' => Carbon::now()
                ]);
                $request->session()->put('temp_creator', '');
                return Redirect('/list-of-gifts')->with('success', 'Gift Information Has been Updated');
            } else {

                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'sell_price' => $sell_price,
                    'active_price' => $active_price,
                    'special_price' => $special_price,
                    'discount_type' => $discount_type,
                    'discount_value' => $discount_value,
                    'discounted_price' => $discounted_price,
                    'updated_at' => Carbon::now()
                ]);
                $request->session()->put('temp_creator', 'temp_data');
                return Redirect('/create-gifts')->with('success', 'Gift Information Has been Updated');
            }
        } // End of gift pricing tab

        if ($param1 == 'gift_description') {

            if (isset($_POST['save_exit_three'])) {

                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'short_decription' => $short_decription,
                    'long_decription' => $long_decription,
                    'updated_at' => Carbon::now()
                ]);
                $request->session()->put('temp_creator', '');
                return Redirect('/list-of-gifts')->with('success', 'Gift Information {Description} has been Updated');
            } else {

                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'short_decription' => $short_decription,
                    'long_decription' => $long_decription,
                    'updated_at' => Carbon::now()
                ]);
                $request->session()->put('temp_creator', 'temp_data');
                return Redirect('/create-gifts')->with('success', 'Gift Information {Description} has been UpdatedX');
            }
        } // End of description


        if ($param1 == 'gift_quantity') {

            if (isset($_POST['save_exit_four'])) {

                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'quantity' => $quantity,
                    'stock_status' => $stock_status,
                    'lower_stock' => $lower_stock,
                    'updated_at' => Carbon::now()
                ]);
                $request->session()->put('temp_creator', '');
                return Redirect('/list-of-gifts')->with('success', 'Gift Information {Quantity} has been Updated');
            } else {

                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'quantity' => $quantity,
                    'stock_status' => $stock_status,
                    'lower_stock' => $lower_stock,
                    'updated_at' => Carbon::now()
                ]);
                $request->session()->put('temp_creator', 'temp_data');
                return Redirect('/create-gifts')->with('success', 'Gift Information {Quantity} has been UpdatedX');
            }
        } // Gift Quantity

        if ($param1 == 'gift_images') {

            if (isset($_POST['save_exit_five'])) {

                $image_full_name = '';
                if (!empty($gift_image)) {
                    $this->validate($request, [
                        'gift_image' => 'mimes:jpeg,png,jpg',
                    ]);

                    $image_name = str_random(20);
                    $ext = strtolower($gift_image->getClientOriginalExtension());
                    $image_full_name .= $image_name . '.' . $ext;

                    $upload_path = 'gift_images/';
                    $image_url = $upload_path . $image_full_name;
                    $success = $gift_image->move($upload_path, $image_full_name);

                    $dataImage = [
                        'gift_id' => $param2,
                        'gift_image' => $image_full_name
                    ];


                    $data_insertImage = DB::table('mktk_gift_media')->insert($dataImage);

                    $request->session()->put('temp_creator', '');
                    return Redirect('/list-of-gifts')->with('success', 'Gift Information {Images} has been Updated');
                } else {
                    $request->session()->put('temp_creator', 'temp_data');
                    return Redirect('/create-gifts')->with('error', 'Please select Image');
                }
            } else {

                $image_full_name = '';
                if (!empty($gift_image)) {
                    $this->validate($request, [
                        'gift_image' => 'mimes:jpeg,png,jpg',
                    ]);

                    $image_name = str_random(20);
                    $ext = strtolower($gift_image->getClientOriginalExtension());
                    $image_full_name .= $image_name . '.' . $ext;

                    $upload_path = 'gift_images/';
                    $image_url = $upload_path . $image_full_name;
                    $success = $gift_image->move($upload_path, $image_full_name);

                    $dataImage = [
                        'gift_id' => $param2,
                        'gift_image' => $image_full_name
                    ];


                    $data_insertImage = DB::table('mktk_gift_media')->insert($dataImage);

                    $request->session()->put('temp_creator', 'temp_data');
                    return Redirect('/create-gifts')->with('success', 'Gift Information {Image} has been Updated');
                } else {
                    $request->session()->put('temp_creator', 'temp_data');
                    return Redirect('/create-gifts')->with('error', 'Please select Image');
                }
            }
        }


        if ($param1 == 'meta_data') {

            if (isset($_POST['save_exit_seven'])) {
                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'meta_keywords' => $meta_keywords,
                    'meta_des' => $meta_des,
                    'updated_at' => Carbon::now()
                ]);
                $request->session()->put('temp_creator', '');
                return Redirect('/list-of-gifts')->with('success', 'Gift Information Has been Updated');
            } else {
                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'meta_keywords' => $meta_keywords,
                    'meta_des' => $meta_des,
                    'updated_at' => Carbon::now()
                ]);
                $request->session()->put('temp_creator', 'temp_data');
                return Redirect('/create-gifts')->with('success', 'Gift Information Has been Updated');
            }
        }
        
        
        
        
         if ($param1 == 'gift_attribute') {
             $name=$request->attvalname;
             $price=$request->attPrice;
             $quantity=$request->attQuantity;
             foreach ($name as $key => $value) {
                  $att_name=$value;
                 $att_price= $price[$key];
                 $att_quantity= $quantity[$key];
                
                  $data=['gift_id'=>$param2,'attribute_id'=>$request->att_name,'value'=>$att_name,'additional_price'=>$att_price,'quantity'=>$att_quantity];
                   $data_insertImage = DB::table('mktk_gift_attribute')->insert($data);
                
             }
             $request->session()->put('temp_creator', 'temp_data');
             return Redirect('/create-gifts')->with('success', 'Attribute Has been Updated');
        }
        
        
        
        
        
    }

    public function getList_of_gifts(Request $request, $param1 = '', $param2 = '') {

        $giftList = DB::table('mktk_gift')
                ->leftjoin('mktk_gift_categories', 'mktk_gift.cat_id', '=', 'mktk_gift_categories.id')
                ->select('mktk_gift.id as giftId', 'mktk_gift.gift_name', 'mktk_gift.gift_sku', 'mktk_gift.short_decription', 'mktk_gift.long_decription', 'mktk_gift.active_price', 'mktk_gift.sell_price', 'mktk_gift.special_price', 'mktk_gift.special_price', 'mktk_gift.discount_type', 'mktk_gift.discount_value', 'mktk_gift.discounted_price', 'mktk_gift.quantity', 'mktk_gift.stock_status', 'mktk_gift.lower_stock', 'mktk_gift.featured', 'mktk_gift.new_arrival', 'mktk_gift.access', 'mktk_gift.hits', 'mktk_gift.rating', 'mktk_gift.publish', 'mktk_gift.created_at', 'mktk_gift.updated_at', 'mktk_gift_categories.name')
                ->orderBy('giftId', 'desc')
                ->get();

        $producNumber = COUNT($giftList);
        $value = [];
        foreach ($giftList as $key => $val) {
            $value[$key] = $val;
        }
        return view('admin.gifts.admin_list_of_gifts', [
            'value' => $value,
            'totalgifts' => $producNumber
        ]);
    }

    public function update_gifts(Request $request, $id = '') {

        $categories = DB::table('mktk_gift_categories')->get();
        $catValue = [];
        foreach ($categories as $key => $val) {
            $catValue[$key] = $val;
        }
        $gifts = DB::table('mktk_gift')->where('id', '=', $id)->get();

        $gift_id = $gifts[0]->id;
        $cat_id = $gifts[0]->cat_id;
        $gift_name = $gifts[0]->gift_name;
        $gift_sku = $gifts[0]->gift_sku;
        $alias = $gifts[0]->alias;
        $featured = $gifts[0]->featured;
        $access = $gifts[0]->access;
        $publish_status = $gifts[0]->publish;
        $new_arrival = $gifts[0]->new_arrival;
        $sell_price = $gifts[0]->sell_price;
        $special_price = $gifts[0]->special_price;
        $active_price = $gifts[0]->active_price;
        $discount_type = $gifts[0]->discount_type;
        $discount_value = $gifts[0]->discount_value;
        $discounted_price = $gifts[0]->discounted_price;
        $short_decription = $gifts[0]->short_decription;
        $long_decription = $gifts[0]->long_decription;

        $quantity = $gifts[0]->quantity;
        $stock_status = $gifts[0]->stock_status;
        $lower_stock = $gifts[0]->lower_stock;
        $meta_keywords = $gifts[0]->meta_keywords;
        $meta_des = $gifts[0]->meta_des;



        $sell_price = number_format($sell_price, 2);
        $special_price = number_format($special_price, 2);
        $active_price = number_format($active_price, 2);
        $discounted_price = number_format($discounted_price, 2);


        $gift_images = DB::table('mktk_gift_media')->where('gift_id', '=', $gift_id)->get();
        $giftImg = [];
        foreach ($gift_images as $img => $dat) {
            $giftImg[$img] = $dat;
        }



        return view('admin.gifts.admin_update_gift', [
            'categories' => $catValue,
            'cat_id' => $cat_id,
            'gift_name' => $gift_name,
            'gift_sku' => $gift_sku,
            'alias' => $alias,
            'featured' => $featured,
            'access' => $access,
            'publish_status' => $publish_status,
            'new_arrival' => $new_arrival,
            'sell_price' => $sell_price,
            'special_price' => $special_price,
            'active_price' => $active_price,
            'discount_type' => $discount_type,
            'discount_value' => $discount_value,
            'discounted_price' => $discounted_price,
            'gift_id' => $gift_id,
            'short_decription' => $short_decription,
            'long_decription' => $long_decription,
            'quantity' => $quantity,
            'stock_status' => $stock_status,
            'lower_stock' => $lower_stock,
            'meta_keywords' => $meta_keywords,
            'meta_des' => $meta_des,
            'giftImages' => $giftImg
        ]);
    }

    public function update_gifts_save(Request $request, $param1 = '', $param2 = '') {

        $userId = $request->session()->get('user.id');


        if ($param1 == 'basic_settings') {
            $gift_name = $request->gift_name;
            $gift_alias = $request->gift_alias;
            $gift_sku = $request->gift_sku;
            $gift_category = $request->gift_category;
            $gift_status = $request->gift_status;
            $gift_access = $request->gift_access;
            $gift_featured = $request->gift_featured;
            $gift_new = $request->gift_new;

            if ($gift_featured == 'on') {
                $gift_featured = 1;
            } else {
                $gift_featured = 0;
            }
            if ($gift_new == 'on') {
                $gift_new = 1;
            } else {
                $gift_new = 0;
            }

            $getAlias = DB::table('mktk_gift')
                    ->where('alias', '=', $gift_alias)
                    ->where('id', '!=', $param2)
                    ->get();

            $aliasNumber = COUNT($getAlias);



            if (isset($_POST['save_exit'])) {
                if ($aliasNumber == 0) {
                    $dataUpdate = DB::table('mktk_gift')
                            ->where('id', $param2)
                            ->update([
                        'cat_id' => $gift_category,
                        'gift_name' => $gift_name,
                        'alias' => $gift_alias,
                        'publish' => $gift_status,
                        'gift_sku' => $gift_sku,
                        'access' => $gift_access,
                        'featured' => $gift_featured,
                        'new_arrival' => $gift_new,
                        'updated_at' => Carbon::now()
                    ]);

                    return Redirect('/list-of-gifts')->with('success', 'Gift Information Has been Updated');
                } else {
                    return redirect()->back()->with('error', 'Gift Item with same \'alias\' is arealy exists! Please try new alias');
                }
            } else {
                if ($aliasNumber == 0) {
                    $dataUpdate = DB::table('mktk_gift')
                            ->where('id', $param2)
                            ->update([
                        'cat_id' => $gift_category,
                        'gift_name' => $gift_name,
                        'alias' => $gift_alias,
                        'publish' => $gift_status,
                        'gift_sku' => $gift_sku,
                        'access' => $gift_access,
                        'featured' => $gift_featured,
                        'new_arrival' => $gift_new,
                        'updated_at' => Carbon::now()
                    ]);

                    return redirect()->back()->with('success', 'Gift Information Has been Updated');
                } else {
                    return redirect()->back()->with('error', 'Gift Item with same \'alias\' is arealy exists! Please try new alias');
                }
            }
        }

        if ($param1 == 'gift_pricing') {
            $sell_price = $request->sell_price;
            $special_price = $request->special_price;
            $active_price = $request->active_price;
            $discount_type = $request->discount_type;
            $discount_value = $request->discount_value;
            $discounted_price = $request->discounted_price;

            $sell_price = trim($sell_price);
            $sell_price = str_replace(",", "", $sell_price);

            $active_price = trim($active_price);
            $active_price = str_replace(",", "", $active_price);

            $discounted_price = trim($discounted_price);
            $discounted_price = str_replace(",", "", $discounted_price);

            if (isset($_POST['save_exit_two'])) {

                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([

                    'sell_price' => $sell_price,
                    'active_price' => $active_price,
                    'special_price' => $special_price,
                    'discount_type' => $discount_type,
                    'discount_value' => $discount_value,
                    'discounted_price' => $discounted_price,
                    'updated_at' => Carbon::now()
                ]);
                return Redirect('/list-of-gifts')->with('success', 'Gift Information Has been Updated');
            } else {
                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([

                    'sell_price' => $sell_price,
                    'active_price' => $active_price,
                    'special_price' => $special_price,
                    'discount_type' => $discount_type,
                    'discount_value' => $discount_value,
                    'discounted_price' => $discounted_price,
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->back()->with('success', 'Gift Information Has been Updated');
            }
        }

        if ($param1 == 'gift_description') {
            $short_decription = $request->short_description;
            $long_decription = $request->long_description;

            if (isset($_POST['save_exit_three'])) {

                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([

                    'short_decription' => $short_decription,
                    'long_decription' => $long_decription,
                    'updated_at' => Carbon::now()
                ]);
                return Redirect('/list-of-gifts')->with('success', 'Gift Information Has been Updated');
            } else {
                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'short_decription' => $short_decription,
                    'long_decription' => $long_decription,
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->back()->with('success', 'Gift Information Has been Updated');
            }
        }

        if ($param1 == 'gift_quantity') {

            $quantity = $request->quantity;
            $stock_status = $request->stock_status;
            $lower_stock = $request->lower_stock;


            if (isset($_POST['save_exit_four'])) {

                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'quantity' => $quantity,
                    'stock_status' => $stock_status,
                    'lower_stock' => $lower_stock,
                    'updated_at' => Carbon::now()
                ]);
                return Redirect('/list-of-gifts')->with('success', 'Gift Information Has been Updated');
            } else {
                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'quantity' => $quantity,
                    'stock_status' => $stock_status,
                    'lower_stock' => $lower_stock,
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->back()->with('success', 'Gift Information Has been Updated');
            }
        }

        if ($param1 == 'gift_images') {

            $gift_image = $request->gift_image;

            if (isset($_POST['save_exit_five'])) {

                $image_full_name = '';
                if (!empty($gift_image)) {
                    $this->validate($request, [
                        'gift_image' => 'mimes:jpeg,png,jpg',
                    ]);

                    $image_name = str_random(20);
                    $ext = strtolower($gift_image->getClientOriginalExtension());
                    $image_full_name .= $image_name . '.' . $ext;

                    $upload_path = 'gift_images/';
                    $image_url = $upload_path . $image_full_name;
                    $success = $gift_image->move($upload_path, $image_full_name);

                    $dataImage = [
                        'gift_id' => $param2,
                        'gift_image' => $image_full_name
                    ];


                    $data_insertImage = DB::table('mktk_gift_media')->insert($dataImage);


                    return Redirect('/list-of-gifts')->with('success', 'Gift Information {Images} has been Updated');
                } else {
                    return redirect()->back()->with('error', 'Please select Image');
                }
            } else {

                $image_full_name = '';
                if (!empty($gift_image)) {
                    $this->validate($request, [
                        'gift_image' => 'mimes:jpeg,png,jpg',
                    ]);

                    $image_name = str_random(20);
                    $ext = strtolower($gift_image->getClientOriginalExtension());
                    $image_full_name .= $image_name . '.' . $ext;

                    $upload_path = 'gift_images/';
                    $image_url = $upload_path . $image_full_name;
                    $success = $gift_image->move($upload_path, $image_full_name);

                    $dataImage = [
                        'gift_id' => $param2,
                        'gift_image' => $image_full_name
                    ];


                    $data_insertImage = DB::table('mktk_gift_media')->insert($dataImage);


                    return redirect()->back()->with('success', 'Gift Information {Images} has been Updated');
                } else {
                    return redirect()->back()->with('error', 'Please select Image');
                }
            }
        }


        if ($param1 == 'meta_data') {

            $meta_keywords = $request->meta_keywords;
            $meta_des = $request->meta_des;



            if (isset($_POST['save_exit_seven'])) {

                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'meta_keywords' => $meta_keywords,
                    'meta_des' => $meta_des,
                    'updated_at' => Carbon::now()
                ]);
                return Redirect('/list-of-gifts')->with('success', 'Gift Information Has been Updated');
            } else {
                $dataUpdate = DB::table('mktk_gift')
                        ->where('id', $param2)
                        ->update([
                    'meta_keywords' => $meta_keywords,
                    'meta_des' => $meta_des,
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->back()->with('success', 'Gift Information Has been Updated');
            }
        }
    }

    public function AdminDelete_gifts(Request $request, $param1 = '') {

        DB::table('mktk_gift')->where('id', '=', $param1)->delete();
        return redirect()->back()->with('success', 'Gift has been deleted successfully.');
    }

    public function giftDefault_Image($param1 = '', $param2 = '') {

        if ($param1 == 'make_default') {

            $updateStatus = DB::table('mktk_gift_media')
                    ->where('media_id', $param2)
                    ->update(['default_image' => 1]);
            return redirect()->back()->with('success', 'Image has been set as default');
        }

        if ($param1 == 'remove_default') {

            $updateStatus = DB::table('mktk_gift_media')
                    ->where('media_id', $param2)
                    ->update(['default_image' => 0]);
            return redirect()->back()->with('success', 'Image has been removed as default');
        }
    }

    public function AdminDelete_gifts_Images(Request $request, $param1 = '') {

        $getCurrentImage = DB::table('mktk_gift_media')->where('media_id', '=', $param1)->get();
        $currImg = $getCurrentImage[0]->gift_image;
        $currImg_fullPath = public_path() . '/gift_images/' . $currImg;
        @unlink($currImg_fullPath);

        DB::table('mktk_gift_media')->where('media_id', '=', $param1)->delete();
        return redirect()->back()->with('success', 'Gift Image has been deleted successfully.');
    }
    
    public function AdminDelete_AttributeName(Request $request, $param1 = '') {

       

        DB::table('mktk_gift_attribute')->where('attribute_id', '=', $param1)->delete();
        return redirect()->back()->with('success', 'Attribute Name has been deleted successfully.');
    }
    
     public function AdminDelete_AttributeValue(Request $request, $param1 = '') {

        DB::table('mktk_gift_attribute')->where('id', '=', $param1)->delete();
        return redirect()->back()->with('success', 'Attribute Value has been deleted successfully.');
    }

    public function AdminPublishUnpublish_gifts($param1 = '', $param2 = '') {

        if ($param1 == 'unpublish') {
            //dd($param1);
            //exit();
            $unpublishVal = 0;
            $dataUnpublish = DB::table('mktk_gift')
                    ->where('id', $param2)
                    ->update([
                'publish' => $unpublishVal
            ]);
            return Redirect('/list-of-gifts')->with('success', 'Gift has been Unpublished.');
        }
        if ($param1 == 'publish') {
            //dd($param1);
            //exit();
            $publishVal = 1;
            $dataUnpublish = DB::table('mktk_gift')
                    ->where('id', $param2)
                    ->update([
                'publish' => $publishVal
            ]);
            return Redirect('/list-of-gifts')->with('success', 'Gift has been Published.');
        }
    }

    public function getGift_attributes() {

        $attributes = DB::table('mktk_attributes')->get();
        $attRibute = [];
        foreach ($attributes as $att => $value) {
            $attRibute[$att] = $value;
        }

        return view('admin.gifts.admin_gift_attributes', ['attRibute' => $attRibute]);
    }

    public function getGift_attributes_save(Request $request, $param1 = '', $param2 = 0) {

        if ($param1 == 'create') {
            $this->validate($request, [
                'attribute_name' => 'required'
            ]);
            $attributeName = $request->attribute_name;
            $data = [];
            $data = ['attribute_name' => $attributeName];
            $data_insert = DB::table('mktk_attributes')->insert($data);
            return Redirect('/gift-attributes')->with('success', 'Attribute has been created successfully.');
        }

        if ($param1 == 'update') {

            $updatedAttributeName = $request->update_attribute_name;
            $dataUpdate = DB::table('mktk_attributes')
                    ->where('attribute_id', $param2)
                    ->update([
                'attribute_name' => $updatedAttributeName
            ]);

            return Redirect('/gift-attributes')->with('success', 'Attribute has been Updated successfully.');
        }

        if ($param1 == 'delete') {
            $attributeDelete = DB::table('mktk_attributes')->where('attribute_id', '=', $param2)->delete();
            return Redirect('/gift-attributes')->with('success', 'Attribute has been Updated successfully.');
        }

        if ($param1 == 'unpublish') {
            dd($param1);
            exit();
            $unpublishVal = 0;
            $dataUnpublish = DB::table('mktk_attributes')
                    ->where('attribute_id', $param2)
                    ->update([
                'status' => $unpublishVal
            ]);
            return Redirect('/gift-attributes')->with('success', 'Attribute has been Unpublished.');
        }
    }

    public function getGift_attributes_status($param1 = '', $param2 = '') {

        if ($param1 == 'unpublish') {
            //dd($param1);
            //exit();
            $unpublishVal = 0;
            $dataUnpublish = DB::table('mktk_attributes')
                    ->where('attribute_id', $param2)
                    ->update([
                'status' => $unpublishVal
            ]);
            return Redirect('/gift-attributes')->with('success', 'Attribute has been Unpublished.');
        }
        if ($param1 == 'publish') {
            //dd($param1);
            //exit();
            $unpublishVal = 1;
            $dataUnpublish = DB::table('mktk_attributes')
                    ->where('attribute_id', $param2)
                    ->update([
                'status' => $unpublishVal
            ]);
            return Redirect('/gift-attributes')->with('success', 'Attribute has been Published.');
        }
    }

    public function getWishlist_categories() {
       $wishlist_category = DB::table('mktk_wishlist_category')->get();
       return view('admin.gifts.admin_wishlist_categories',compact('wishlist_category'));
   }

    public function getMmanage_user_wishlist() {
        return view('admin.gifts.admin_wishlist');
    }

    public function getSystem_settings() {


        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'system_title')->get();
        $system_title = $system1[0]->details;

        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'system_email')->get();
        $system_email = $system1[0]->details;

        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'cell_no')->get();
        $cell_no = $system1[0]->details;

        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'telephone')->get();
        $telephone = $system1[0]->details;

        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'address')->get();
        $address = $system1[0]->details;

        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'system_offline')->get();
        $system_offline = $system1[0]->details;

        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'coupon_service')->get();
        $coupon_service = $system1[0]->details;

        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'description')->get();
        $description = $system1[0]->details;

        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'meta_key_word')->get();
        $meta_key_word = $system1[0]->details;

        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'meta_description')->get();
        $meta_description = $system1[0]->details;

        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'image')->get();
        $image = $system1[0]->details;
        
        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'currency_name')->get();
        $currency_name = $system1[0]->details;
        
        $system1 = DB::table('mktk_system_detail')->where('type', '=', 'currency_symbol')->get();
        $currency_symbol = $system1[0]->details;



        return view('admin.admin_system_settings', [
            'system_title' => $system_title,
            'system_email' => $system_email,
            'cell_no' => $cell_no,
            'telephone' => $telephone,
            'address' => $address,
            'system_offline' => $system_offline,
            'coupon_service' => $coupon_service,
            'description' => $description,
            'meta_key_word' => $meta_key_word,
            'meta_description' => $meta_description,
            'image' => $image,
            'currency_name' => $currency_name,
            'currency_symbol' => $currency_symbol
        ]);
    }

    public function getSystem_settings_save(Request $request, $param1 = '') {

        if ($param1 == 'system_settings') {

            $image_full_name = '';
            $system_title = $request->system_title;
            $system_email = $request->system_email;
            $cell_no = $request->cell_no;
            $telephone = $request->telephone;
            $address = $request->address;
            //$image = $request->logo;

            $image = $request->file('site_logo');




            if (!empty($image)) {
                $this->validate($request, [
                    'image' => 'mimes:jpeg,png,jpg',
                ]);
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name .= $image_name . '.' . $ext;

                $upload_path = 'frontend/images/logo/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);

                $current_image_path = public_path() . '/frontend/images/logo/' . $request->current_image;
                @unlink($current_image_path);
            } else {
                $image_full_name .= $request->current_image;
            }

            $updateInfo = DB::table('mktk_system_detail')->where('type', 'system_title')->update(['details' => $system_title]);
            $updateInfo = DB::table('mktk_system_detail')->where('type', 'system_email')->update(['details' => $system_email]);
            $updateInfo = DB::table('mktk_system_detail')->where('type', 'cell_no')->update(['details' => $cell_no]);
            $updateInfo = DB::table('mktk_system_detail')->where('type', 'telephone')->update(['details' => $telephone]);
            $updateInfo = DB::table('mktk_system_detail')->where('type', 'address')->update(['details' => $address]);
            $updateInfo = DB::table('mktk_system_detail')->where('type', 'image')->update(['details' => $image_full_name]);
        }
        if ($param1 == 'system_permission') {
            $system_offline = $request->system_offline;
            $coupon_service = $request->coupon_service;

            $updateInfo = DB::table('mktk_system_detail')->where('type', 'system_offline')->update(['details' => $system_offline]);
            $updateInfo = DB::table('mktk_system_detail')->where('type', 'coupon_service')->update(['details' => $coupon_service]);
        }
        
        if ($param1 == 'currency_settings') {
            $currency_name = $request->currency_name;
            $currency_symbol = $request->currency_symbol;

            $updateInfo = DB::table('mktk_system_detail')->where('type', 'currency_name')->update(['details' => $currency_name]);
            $updateInfo = DB::table('mktk_system_detail')->where('type', 'currency_symbol')->update(['details' => $currency_symbol]);
        }

        if ($param1 == 'meta_data') {

            $description = $request->description;
            $meta_key_word = $request->meta_key_word;
            $meta_description = $request->meta_description;

            $updateInfo = DB::table('mktk_system_detail')->where('type', 'description')->update(['details' => $description]);
            $updateInfo = DB::table('mktk_system_detail')->where('type', 'meta_key_word')->update(['details' => $meta_key_word]);
            $updateInfo = DB::table('mktk_system_detail')->where('type', 'meta_description')->update(['details' => $meta_description]);
        }
        return Redirect('/system-settings')->with('success', 'Syetem Information Updated');
    }

    public function getManage_orderlist() {
        return view('admin.gifts.admin_manage_orderlist');
    }

}
