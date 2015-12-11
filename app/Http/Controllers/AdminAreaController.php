<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;


class AdminAreaController extends Controller
{
    /**
     * Show the form for admin login
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {  
        if (Auth::user()) {
            return redirect('/admin/dashboard');
        }

        return view('login');
    }

    /**
     * Log in admin, or go back to form
     *
     * @param  \Illuminate\Http\AdminLoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function loginRequest(AdminLoginRequest $request)
    {   
        return redirect('/admin/dashboard');
    }

    /**
     * Display admin dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminDashboard()
    {   
        $userCount = User::all()->where('role_id', NULL)->count();
        return view('admin.dashboard')->with('admin', Auth::user())
                                      ->with('userCount', $userCount);
    }

    /**
     * Show users of application
     *
     * @return \Illuminate\Http\Response
     */
    public function usersTable()
    {
        $users = User::all();
        return view('admin.users')->with('admin', Auth::user())
                                  ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
