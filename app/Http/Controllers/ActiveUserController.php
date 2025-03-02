<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ActiveUserController extends Controller
{
    //
    public function index()
    {
        $totalUsers = DB::table('users')->count();

        $activeUsers = DB::table('users')
            ->where('last_activity', '>=', Carbon::now()->subMinutes(5)) 
            ->count();

        return view('welcome', compact('totalUsers', 'activeUsers'));
    }

    public function getUserStats()
    {
        return response()->json([
            'totalUsers' => DB::table('users')->count(),
            'activeUsers' => DB::table('users')
                ->where('last_activity', '>=', Carbon::now()->subMinutes(5))
                ->count()
        ]);
    }


}
