<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
   
    public function index()
    {
        $users=User::all();
        return view('user.index', compact('users'));
    }

  
    public function create()
    {
        return view('user.create');
    }

    
    public function store(StoreUserRequest $request)
    {
        

        $data=$request->validated();
        User::firstOrCreate(['email'=>$data['email']], $data);

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

 
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

 
    public function update(UpdateUserRequest $request, User $user)
    {
        $data=$request->validated();
        $user->update($data);

        return view('user.show', compact('user'));
    }

 
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
