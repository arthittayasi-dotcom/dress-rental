<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    public function create(): View
    {
        return view('auth.login');
    }



    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();


        $user = Auth::user();



        if ($user->role === 'admin') {

            return redirect()
                ->route('admin.dashboard');

        }



        if ($user->role === 'owner') {

            return redirect()
                ->route('owner.dashboard');

        }



        return redirect()
            ->route('customer.home');

    }





    public function destroy(Request $request): RedirectResponse
    {

        $user = Auth::user();



        Auth::guard('web')->logout();



        $request->session()->invalidate();



        $request->session()->regenerateToken();




        // staff logout กลับ stafflogin

        if ($user && in_array($user->role, ['admin', 'owner'])) {

            return redirect('/stafflogin');

        }



        // customer logout กลับ login ปกติ

        return redirect('/login');

    }

}