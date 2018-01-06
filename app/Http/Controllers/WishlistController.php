<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class WishlistController extends Controller {
    public function saveWishlist(Request $request)
    {
        $this->validate($request, [
            'category_name'=>'required',
            'category_alias'=>'required',
        ]);

        $data = request()->all();
        unset($data['_token']);
        $wishlist_category = DB::table('mktk_wishlist_category')->insert($data);
        if($wishlist_category){
            return Redirect::to('/wishlist-categories')->with('success','Wishlist category inserted');
        }
    }

    public function updateWishlistCategory(Request $request, $id)
    {
        $this->validate($request, [
            'category_name'=>'required',
            'category_alias'=>'required',
        ]);

        $data = request()->all();
        unset($data['_token']);
        $update_wishlist = DB::table('mktk_wishlist_category')->where('id',$id)->update($data);
        if($update_wishlist){
            return Redirect::to('/wishlist-categories')->with('success','Wishlist category updated');
        }
    }

    public function deleteWishlistCategory($id)
    {
        $delete_wishlist = DB::table('mktk_wishlist_category')->where('id',$id)->delete();
        if($delete_wishlist){
            return Redirect::to('/wishlist-categories')->with('success','Wishlist category deleted');
        }
    }
}
