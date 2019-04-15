<?php

namespace App\Http\Controllers\UserAdmnistration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function profile(User $user)
    {
        $this->authorize('view');
        $roles = Role::where('hidden', false)->get();

        return view('pages.userProfile', ['user' => $user, 'roles' => $roles]);
    }
}
