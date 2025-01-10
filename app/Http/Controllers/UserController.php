<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

        $users = $query->paginate(10);

        return view('users', compact('users'));
    }

    public function destroy(User $user)
    {
        if ($user->id == Auth::id() || Auth::user()->role === 'admin') {
            $user->delete();
            return redirect()->route('users')->with('success', 'User deleted successfully.');
        }
        
        return redirect()->route('users')->with('error', 'You are not authorized to delete this user.');
    }
}
