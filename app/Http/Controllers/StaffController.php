<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\Garbage;
use App\Models\User;

class StaffController extends Controller
{
    public function index()
    {
        $sector = Staff::where('email', session('user')->email)->pluck('sector')->first();
        $users = User::whereHas('garbages', function($query) {
            $query->where('status', 'pending');
        })->where('sector', $sector)->get();

        return view('staff.index', ['sector' => $sector, 'users' => $users]);
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:staffs,email',
            'sector' => 'required|numeric',
        ]);

        Staff::create($request->all());

        return redirect()->route('staff.index')->with('success', 'Staff added.');
    }

    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $request->validate([
            'email' => "required|email|unique:staffs,email,$id",
            'sector' => 'required|numeric',
        ]);

        $staff->update($request->all());

        return redirect()->route('staff.index')->with('success', 'Staff updated.');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff deleted.');
    }
}
