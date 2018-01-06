<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GlobalAccessorController extends Controller
{
    public static function catList()
    {
    	$category_list = DB::table('mktk_gift_categories')->get();
    	return $category_list;
    }
}
