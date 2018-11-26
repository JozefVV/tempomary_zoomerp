<?php

namespace App\Http\Controllers\UserAdmnistration;

use App\Rules\TableContainsId;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserEditorController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request, Response $response)
    {
        if(!Auth::user()->hasRole('admin'))
        {
            abort(403);
        }

        return view('userAdministration.list');
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
        $newUser->firstName = $validated->firstName;
        $newUser->lastName = $validated->lastName;
        $newUser->email = $validated->email;
        $newUser->password = $validated->password;
        $newUser->save();

        return response()->json($newUser,200);
    }
    public function disable(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $user->disable()->save();

        return response()->json($user,200);
    }
    public function enable(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $user->enable()->save();

        return response()->json($user,200);
    }
    public function delete(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $user->delete();

        return response()->json(200);
    }


    public function edit(Request $request, Response $response)
    {
        $parametersAndValidations = [
            'id' => 'bail|required|integer|exists:'.(new User)->getTable().',id',
            'firstname' => 'nullable|string',
            'lastname' => 'nullable|string',
            'nickname' => 'nullable|string',
            'email' => 'nullable|string',
        ];
        $validatedData = $request->validate($parametersAndValidations);

        $user = User::find($validatedData['id']);
        unset($parametersAndValidations['id']);

        //iterate through all optionall parameters and
        //update model with only those that exist in request
        foreach($parametersAndValidations as $parameterName=>$rule)
        {
            if(array_key_exists($parameterName,$validatedData))
            {
                $user[$parameterName] = $validatedData[$parameterName];
            }
        }
        $user->save();

        return response()->json($user,200);
    }

    public function addRole(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $validatedData = $request->validate(['role' => ['required', Rule::in($this->allAuthRoles())]]);

        $user->assignRole($validatedData['role']);
        return response()->json($user,200);
    }
    public function removeRole(Request $request, Response $response)
    {
        $user = $this->getUserToEdit($request);
        $validatedData = $request->validate(['role' => ['required', Rule::in($this->allAuthRoles())]]);

        $user->removeRole($validatedData['role']);
        return response()->json($user,200);
    }

    private function allAuthRoles()
    {
        $rolesCollection = Spatie\Permission\Models\Role::all();
        $roleNames = [];
        foreach($rolesCollection as $roleItem)
        {
            $roleNames[] = $roleItem->name;
        }
        return $roleNames;
    }

    private function getUserToEdit(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:'.(new User)->getTable().',id'
        ]);
        return User::find($validatedData['id']);
    }

}
