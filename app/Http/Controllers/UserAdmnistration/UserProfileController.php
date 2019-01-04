<?php

namespace App\Http\Controllers\UserAdministration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\EditSelfUserRequest;
use App\Http\Controllers\Controller;
use App\Rules\TableContainsId;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request, Response $response)
    {
        if(!Auth::user()->hasAnyRole(['admin','superadmin']))
        {
            abort(403);
        }
        $userList = User::all();

        return view('pagesDashboard.userAdministration',['users' => $userList]);
    }

    public function edit(EditSelfUserRequest $request, Response $response)
    {
        $validatedData = $request->validated();
        $user = Auth::User();

        $ignoreParams = ['id','role','password'];
        foreach($validatedData as $parameterName=>$value)
        {
            if(!in_array($parameterName,$ignoreParams))
            {
                $user[$parameterName] = $value;
            }
        }

        if(array_key_exists('password',$validatedData))
        {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return Redirect::back();
    }

}
