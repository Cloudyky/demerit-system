<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OffenseRecord;
use App\Models\User;
use App\Models\Offense;

class OffenseRecordController extends Controller
{
    public function assign(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'offense_id' => 'required|exists:offenses,id'
        ]);

        $offense = Offense::findOrFail($request->offense_id);
        OffenseRecord::create([
            'user_id' => $request->user_id,
            'offense_id' => $offense->id,
            'demerit_points' => $offense->demerit,
        ]);

        return redirect()->back()->with('success', 'Offense assigned successfully');
    }
}

