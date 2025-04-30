<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Garbage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Staff;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pending = Garbage::where('status', 'pending')->count();
        $picked = Garbage::where('status', 'picked')->count();

        $pendingSectors = User::whereHas('garbages', function($query) {
            $query->where('status', 'pending');
        })
        ->distinct()
        ->pluck('sector');
        
        $staffs = User::whereHas('staff')->get();
        //if entry exits then update role
        return view('admin.index', ['pending' => $pending, 'picked' => $picked, 'pendingSectors' => $pendingSectors, 'staffs' => $staffs]);

    }

    public function assignSector(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'sector' => 'required|string',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user) {
        // Update if staff already exists, else create
        Staff::updateOrCreate(
            ['email' => $request->email],
            ['sector' => $request->sector]
        );
        $user->role = 'staff';
        $user->save();
    }

    return redirect()->back()->with('success', 'Sector assigned to staff.');
}

public function createStaff(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'sector' => 'required|string',
    ]);

    // If user exists, assign staff role
    $user = User::firstOrCreate(
        ['email' => $request->email],
        [
            'name' => $request->name,
            'password' => bcrypt('password'), // default password
            'address' => 'NA',
            'sector' => $request->sector,
        ]
    );

    $user->addRole('staff');

    // Create/Update staff table
    Staff::updateOrCreate(
        ['email' => $user->email],
        ['sector' => $request->sector]
    );

    return redirect()->back()->with('success', 'Staff created/updated successfully.');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
