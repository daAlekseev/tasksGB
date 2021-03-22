<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->isMethod('post')) {
            $request->validate($this->getRules(), [], $this->getAttributes());
            $request->flash();
            if (Hash::check($request->input('password'), $user->password)
                && $request->input('password') != $request->input('newPassword')) {
                $user->fill([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('newPassword')),
                ])->save();
                return redirect()->route('profile');
            } else {
                return redirect()
                    ->route('profile')
                    ->with('errorMessage', 'Старый пароль введен не верно или пароли совпадают!');
            }
        }
        return view('profile.index')->with('user', Auth::user());
    }

    public function getRules()
    {
        return [
            'email' => 'required|unique:App\Models\User,email',
            'name' => ['required', 'min:3', 'max:25'],
            'password' => ['required'],
            'newPassword' => ['required'],
        ];
    }

    public function getAttributes()
    {
        return [
            'newPassword' => 'Новый пароль',
        ];
    }
}
