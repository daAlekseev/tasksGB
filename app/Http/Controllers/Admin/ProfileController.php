<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::query()->where('id', $request->id)->first();
            $user->isAdmin = !$user->isAdmin;
            $user->save();
        }
        return view('admin.profile')
            ->with('users', User::query()->where('id', '!=', Auth::id())->paginate(5));
    }
}
