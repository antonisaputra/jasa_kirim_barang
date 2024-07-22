<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //

    public function index(){
        $user = User::latest()->get();
        return view('user.index', ['user' => $user]);
    }

    public function tambah(){
        return view('user.tambah');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $data['password'] = bcrypt($request->password);

        $data['role'] = $request->role;

        User::create($data);
        return redirect('/user');
    }

    public function edit(User $user){
        return view('user.edit', ['user' => $user]);
    }

    public function aksi_edit(User $user, Request $request){
       
        $data = $request->validate([
            'name' => 'required'
        ]);

        $data['role'] = $request->role;

        User::where('id', $user->id)->update($data);
        return redirect('/user');
    }

    public function edit_password(User $user){
        return view('user.password', ['user' => $user]);
    }

    public function aksi_edit_password(User $user, Request $request){
        $data = $request->validate([
            'password' => 'required'
        ]);

        $data['password'] = bcrypt($request->password);

        User::where('id', $user->id)->update($data);
        return redirect('/user');
    }

    public function delete(User $user){
        User::destroy('id', $user->id);
        return redirect('/user');
    }
}
