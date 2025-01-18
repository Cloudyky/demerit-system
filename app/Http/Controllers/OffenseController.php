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
        return view('offense', compact('offenses'));
    }

    public function destroy(Offense $offense)
    {
        $offense->delete();
        return redirect()->route('offense')->with('success', 'Offense deleted successfully.');
    }

    public function edit(Offense $offense)
    {
        return view('edit_offense', compact('offense'));
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

}
