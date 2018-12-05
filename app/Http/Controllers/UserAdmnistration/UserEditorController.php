<?php

namespace App\Http\Controllers\UserAdmnistration;

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

class UserEditorController extends Controller
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

    public function registerView(Request $request, Response $response)
    {
        if(!Auth::user()->hasAnyRole(['admin','superadmin','manager']))
        {
            abort(403);
        }

        return view('pagesDashboard.registerUser');
    }

    public function list(Request $request, Response $response)
    {
        $userList = User::all();

        return response()->json($userList,200);
    }

    public function create(CreateUserRequest $request, Response $response)
    {
        $validated = $request->validated();
        $newUser = new User;
        $newUser->firstName = $validated['firstname'];
        $newUser->lastName = $validated['lastname'];
        $newUser->email = $validated['email'];
        $newUser->password = Hash::make($validated['password']);
        $newUser->save();

        $newUser->assignRole($validated['role']);

        return redirect()->route('userAdministration');
    }
    public function disableAccess(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $user->disable()->save();

        return response()->json($user,200);
    }
    public function enableAccess(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $user->enable()->save();

        return response()->json($user,200);
    }
    public function toggleAccess(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $user->toggleAccess()->save();

        return response()->json($user,200);
    }
    public function delete(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $user->delete();

        return response()->json(200);
    }


    public function edit(EditUserRequest $request, Response $response)
    {
        $validatedData = $request->validated();
        $user = User::find($validatedData['id']);

        if( !(Auth::User()->can('edit users') || Auth::User()->id == $user->id) ){ return abort(403); }

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

        if(array_key_exists('role',$validatedData))
        {
            $user->syncRoles([$validatedData['role']]);
        }

        return Redirect::back();
    }

    public function editSelf(EditSelfUserRequest $request, Response $response)
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

    public function addRole(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $validatedData = $request->validate(['role' => ['required', Rule::in(Role::all())]]);

        $user->assignRole($validatedData['role']);
        return response()->json($user,200);
    }
    public function removeRole(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $validatedData = $request->validate(['role' => ['required', Rule::in(Role::all())]]);

        $user->removeRole($validatedData['role']);
        return response()->json($user,200);
    }

    private function canEditUser($editedUserId)
    {
        if( (Auth::User()->hasAnyRole(['superadmin','admin'])) || (Auth::User()->id == $editedUserId) )
        {
            return true;
        }
        return false;
    }

    private function getUserToEdit(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:'.(new User)->getTable().',id'
        ]);
        return User::find($validatedData['id']);
    }

}
