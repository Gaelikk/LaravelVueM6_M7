<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loggedUser(): Factory|View|Application
    {
        return view("/account", ["user" => Auth::user()]);
    }

    public function handle($request, $next)
    {
        if (auth()->user()->isAdmin()) {
            return $next($request);
        }
        return redirect('menu');
    }


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function menu()
    {
        if (Auth::check()) {
            return view('menu');
        }

        return redirect("register")->withSuccess('You are not allowed to access');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
