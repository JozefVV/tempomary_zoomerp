<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }

    public function profile(Request $request, $id = null)
    {
        if($id === null)
        {
            $user = Auth::User();
        }else{
            $user = User::findOrFail($id);
        }
        return view('pagesDashboard.userProfile',['user' => $user]);
    }
}
