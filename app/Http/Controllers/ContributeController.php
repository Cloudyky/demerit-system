<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;

class ContributeController extends Controller
{
    //
    public function index(Request $request)
    {
        $contributes = Contribution::all();
        return view('contribution.index', compact('contributes'));
    }

    public function destroy(Contribution $contribution)
    {
        $contribution->delete();
        return redirect()->route('contribution')->with('success', 'Contribute deleted successfully.');
    }

    public function edit(Contribution $contribution)
    {
        return view('contribution.edit', compact('contribution'));
    }

    public function update(Request $request, Contribution $contribution)
    {
        $request->validate([
            'contribution' => 'required|string|max:255',
            'points' => 'required|integer|min:0',
        ]);

        $contribution->update([
            'contribute_type' => $request->input('contribution'),
            'merit' => $request->input('points'),
        ]);

        return redirect()->route('contribution')->with('success', 'Contribution updated successfully.');
    }

    public function show()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return abort(403, 'Unauthorized access');
        }

        return view('contribution.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'points' => 'required|integer|min:0',
        ]);

        Contribution::create([
            'contribute_type' => $request->input('description'),
            'merit' => $request->input('points'),
        ]);

        return redirect()->route('contribution')->with('success', 'Contribution  added successfully.');
    }

}
