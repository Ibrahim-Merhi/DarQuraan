<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usergroup;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    //constructor to make sure only logged in users can access this controller
    public function __construct()
    {
        // $this->middleware('auth');
        //if user is not admin, redirect to home page
    }
    public function index()
    {
        //return all users
        if ($this->isAdmin()) {
            $users = User::all();

            return view('admin.users.index', compact('users'));
        }
        return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //check if user is admin
        if ($this->isAdmin()) {
            return view('admin.users.create');
        }
        return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($this->isAdmin()) {
            //
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',

                'sex' => 'required|in:m,f',

            ]);
            $user = new User();
            $user->name = $request->name;
            $user->m_name = $request->m_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->address = $request->address;

            $user->email = $request->email;

            $user->password = bcrypt($request->password);
            $user->group = 2;
            $user->save();
            return redirect('/users');
        }
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usergroup  $usergroup
     * @return \Illuminate\Http\Response
     */
    public function show(Usergroup $usergroup, $id)
    {
        //int
        //check if user is admin

        if ($this->isAdmin()) {
            $user = User::find($id);
            //if !user, redirect to home page
            if (!$user) {
                return redirect('/home');
            }
            return view('admin.users.show', compact('user'));
        }
        $user = User::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($user) {
            return view('admin.users.show', compact('user'));
        }
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usergroup  $usergroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::where('id', $id)->first();
        // return $user;
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usergroup  $usergroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;

        if (!$this->isAdmin()) {
            return redirect()->route('admin.users.index');
        }
        $user = User::where('id', $id)->first();
        if (!$user) {
            return redirect()->route('admin.users.index');
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->m_name = $request->input('m_name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->active = $request->input('active');
        // $user->sex=$request->input('sex');
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usergroup  $usergroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usergroup $usergroup)
    {
        //

    }

    //check if user is admin
    public function isAdmin()
    {

        $user = auth()->user();
        if ($user && $user->group == 1) {
            return true;
        }
        return false;
    }

    public function ChangePassword(Request $request)
    {
        $user = User::find($request->input('id'));

        if (!$user) {
            return redirect()->route('users.index');
        }

        if (auth()->user()->group == 1) {
            $user = User::find($request->id);
        } else {
            $user = auth()->user();
        }

        if (!$user) {
            return redirect('/home');
        }
        return view('admin.users.changePassword', compact('user'));
    }

    public function UpdatePassword(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return redirect('/home');
        }
        $this->validate($request, [
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6|same:password',
        ]);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Password updated successfully');
    }
    //search
    public function Search(Request $request)
    {
    }
}
