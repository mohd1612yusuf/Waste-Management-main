<?php

namespace App\Http\Controllers;

use App\Models\Garbage;
use Illuminate\Http\Request;


class GarbageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = session('user')->email;
        $history = Garbage::where('user_email', $email)->orderBy('created_at', 'desc')->get();
        return view('garbage.index', ['history' => $history]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('garbage.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'description' => 'nullable|string',
        ]);
        $request['user_email'] = session('user')->email;
    
        Garbage::create($request->all());
        return redirect()->route('garbage.index')->with('success', 'Garbage entry created.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Garbage $garbage)
    {
        $garbage = Garbage::find($id);
        return view('garbages.show', compact('garbage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garbage $garbage)
    {
        $garbage = Garbage::findOrFail($id);
        return view('garbages.edit', compact('garbage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garbage $garbage)
    {
        // $request->validate([
        //     'type' => 'required',
        //     'description' => 'nullable|string',
        //     'user_email' => 'required|email',
        // ]);

        $garbage->status = 'picked';
        $garbage->update($request->all());
    
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garbage $garbage)
    {
        $garbage = Garbage::findOrFail($id);
        $garbage->delete();

        return redirect()->route('garbages.index')->with('success', 'Garbage deleted.');
    }
}
