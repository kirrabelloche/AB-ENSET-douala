<?php

namespace App\Http\Controllers\Admin;

use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Foundation\Console\Presets\Vue;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
class UsersController extends Controller
{

    public function __construct(){


        $this->middleware('auth');

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return View('admin.users.index')->with('users', $users);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
       
       if( Gate::denies('edit-users')){
        return redirect()->route('admin.users.index ');
       }
       $roles = Role::all();

        return view('admin.users.edit' , [
            'user' => $user,
            'roles' => $roles
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {

        if( Gate::denies('delete-users')){
            return redirect()->route('admin.users.index');
           }


      $user->roles()->detach();
      $user->delete();

      return redirect()->route('admin.users.index');
    }
}
