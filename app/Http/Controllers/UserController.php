<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;

            $query->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('ic', 'like', '%' . $searchTerm . '%')
                         ->orWhere('name', 'like', '%' . $searchTerm . '%');
            });
        }

        $users = $query->get();
        $count = $users->count();

        return view('user.index', compact('users', 'count'));
    }
    
    public function show($id, $name)
    {
        $user = User::where('id', $id)->where('name', urldecode($name))->firstOrFail();
        return view('user.personal', compact('user'));
    }

    public function remove($id)
    {
        $user = User::findOrFail($id);
        
        DB::table('removed_users')->insert([
            'name' => $user->name,
            'email' => $user->email,
            'ic' => $user->ic,
            'role' => $user->role,
            'email_verified_at' => $user->email_verified_at,
            'password' => $user->password,
            'removed_by' => auth()->id(), // Assuming you have a user authentication system
            'remember_token' => $user->remember_token,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $user->delete();
        
        return redirect()->route('users')->with('success', 'User removed successfully.');
    }

    // public function destroy(User $user)
    // {
    //     if ($user->id == Auth::id() || Auth::user()->role === 'admin') {
    //         $user->delete();
    //         return redirect()->route('users')->with('success', 'User deleted successfully.');
    //     }
        
    //     return redirect()->route('users')->with('error', 'You are not authorized to delete this user.');
    // }
}
