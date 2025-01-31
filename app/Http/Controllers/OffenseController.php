<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offense;

class OffenseController extends Controller
{
    //
    public function index(Request $request)
    {
        $offenses = Offense::all();
        return view('offense.offense', compact('offenses'));
    }

    public function destroy(Offense $offense)
    {
        $offense->delete();
        return redirect()->route('offense')->with('success', 'Offense deleted successfully.');
    }

    public function edit(Offense $offense)
    {
        return view('offense.edit', compact('offense'));
    }

    public function update(Request $request, Offense $offense)
    {
        $request->validate([
            'offense' => 'required|string|max:255',
            'points' => 'required|integer|min:0',
        ]);

        $offense->update([
            'jenis_kesalahan' => $request->input('offense'),
            'dimerit' => $request->input('points'),
        ]);

        return redirect()->route('offense')->with('success', 'Offense updated successfully.');
    }

    public function show()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return abort(403, 'Unauthorized access');
        }

        return view('offense.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'points' => 'required|integer|min:0',
        ]);

        Offense::create([
            'jenis_kesalahan' => $request->input('description'),
            'dimerit' => $request->input('points'),
        ]);

        return redirect()->route('offense')->with('success', 'Offense added successfully.');
    }

}
