<?php

namespace App\Http\Controllers\UserAdmnistration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
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
        $userList = User::paginate(15);

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

        // return response()->json($newUser,200);

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
        if(!$this->canEditUser($validatedData['id'])){ return abort(403); }

        //iterate through all optionall parameters and
        //update model with only those that exist in request
        unset($parametersAndValidations['id']);
        foreach($parametersAndValidations as $parameterName=>$rule)
        {
            if(array_key_exists($parameterName,$validatedData))
            {
                $user[$parameterName] = $validatedData[$parameterName];
            }
        }
        $user->save();

        if($request->has('role'))
        {
            $newRole = $request->input('role');
            if(!(Role::where('name','=',$newRole)->first()))
            {
                $errors = ['role' => 'Error: could not find role specified as new role.'];
                return Redirect::back()->withInput(Input::all())->withErrors($errors, $this->errorBag());
            }
            $user->syncRoles([$newRole]);
        }

        // return response()->json($user,200);
        return Redirect::back();

    }

    public function changePassword(Request $request, Response $response)
    {
        $parametersAndValidations = [
            'id' => 'bail|required|integer|exists:'.(new User)->getTable().',id',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        $validatedData = $request->validate($parametersAndValidations);
        $user = User::find($validatedData['id']);

        if(!$this->canEditUser($validatedData['id'])){ return abort(403); }

        if( !( ($this->passwordMatches($user->password,$validatedData['password'])) || (Auth::user()->hasAnyRole(['superadmin','admin'])) ) )
        {
            $errors = ['password_old' => 'Error: old password does not match current one, cant change to new.'];
            return Redirect::back()->withInput(Input::all())->withErrors($errors, $this->errorBag());
        }

        $user->password = Hash::make($validatedData['password']);
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

    private function passwordMatches($hash,$plaintext)
    {
        return Hash::check($hash, $plaintext);
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
