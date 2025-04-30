<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Garbage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        // return view('users.index', compact('users'));

        return redirect()->route('garbage.index');
    }

    public function create()
    {
        // return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string',
            'sector' => 'required|alpha_num',
        ]);

        $requestData = $request->all();
        $requestData['password'] = bcrypt($request->password);

        User::create($requestData);

        return redirect()->route('login');

    }

    public function edit()
    {
        $user = User::user(session('user')->id);
        return view('user.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string',
            'sector' => 'required|alpha_num',
        ]);

        $user = User::findOrFail($id);

        // Only update password if it's different
        if (!Hash::check($request->password, $user->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->address = $request->address;
        $user->sector = $request->sector;

        $user->save();

        return redirect()->route('profile')->with('success', 'Successfully Updated!');
    }


    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->route('users.index')->with('success', 'User deleted.');
    // }

}

