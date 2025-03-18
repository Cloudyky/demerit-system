<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContributionRecord;
use App\Models\User;
use App\Models\Contribution;

class ContributionRecordController extends Controller
{
    public function assign(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'contribution_id' => 'required|exists:contributions,id'
        ]);

        $contribution = Contribution::findOrFail($request->contribution_id);
        ContributionRecord::create([
            'user_id' => $request->user_id,
            'contribution_id' => $contribution->id,
            'merit_points' => $contribution->merit,
        ]);

        return redirect()->back()->with('success', 'Contribution assigned successfully');
    }
}
