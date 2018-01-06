<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id = 0, $params = '')
    {
        if ($params == 'update' && $id != 0) {

            if (!empty($request->user_name) || $request->user_name = '') {
                $userName = $request->user_name;
            } else {
                $userName = $request->current_user_name;
            }

            if (!empty($request->user_email) || $request->user_email = '') {
                $userEmail = $request->user_email;
            } else {
                $userEmail = $request->current_user_email;
            }

            if (!empty($request->new_password) || $request->new_password = '') {
                $userPass = sha1($request->new_password);
            } else {
                $userPass = $request->current_user_password;
            }
            $sqlUpdate = DB::table('mktk_users')
                ->where('mktk_users.id', $id)
                ->update(['user_name' => $userName, 'user_email' => $userEmail, 'password' => $userPass]);
            return Redirect::to('/manage_users')->with('success', 'Successfully updated');

        } elseif ($params == 'delete' && $id != 0) {

            $sqlDelete = DB::table('mktk_users')
                ->where('mktk_users.id', $id)
                ->delete();
            return Redirect::to('/manage_users')->with('success', 'Successfully Deleted');
        } elseif ($params == 'enable' && $id != 0) {

            $sqlEnable = DB::table('mktk_user_settings')
                ->where('user_id', $id)
                ->update(['activation' => 1]);
            return Redirect::to('/manage_users')->with('success', 'Successfully Enabled');
        } elseif ($params == 'disable' && $id != 0) {

            $sqlDisable = DB::table('mktk_user_settings')
                ->where('user_id', $id)
                ->update(['activation' => 0]);
            return Redirect::to('/manage_users')->with('success', 'Successfully Disabled');
        } else {

            $users = DB::table('mktk_users')
                ->leftjoin('mktk_users_detail', 'mktk_users.id', '=', 'mktk_users_detail.user_id')
                ->leftjoin('mktk_user_settings', 'mktk_users.id', '=', 'mktk_user_settings.user_id')
                ->where('mktk_users.user_type', 2)
                ->select('mktk_users.id', 'mktk_users.user_name', 'mktk_users.password', 'mktk_users.user_email', 'mktk_users.veryfiy_status', 'mktk_users_detail.first_name', 'mktk_users_detail.last_name', 'mktk_user_settings.activation')
                ->get();

            $value = [];
            foreach ($users as $key => $val) {
                $value[$key] = $val;
            }
            return view('admin.admin_manage_users')->with('value', $value);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        echo $user_id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
