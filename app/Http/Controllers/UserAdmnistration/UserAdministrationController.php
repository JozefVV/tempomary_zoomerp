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

class UserAdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function viewList(Request $request)
    {
        $this->authorize('viewList');

        $userList = User::UserList()->get();

        return view('pagesDashboard.userAdministration', ['users' => $userList]);
    }

    public function registerFormView(Request $request)
    {
        $this->authorize('create');

        return view('pagesDashboard.registerUser');
    }

    public function create(CreateUserRequest $request)
    {
        $this->authorize('create');

        $validatedValues = $request->validated();
        $role = array_pull($validatedValues, 'role');

        $newUser = User::create($validatedValues);
        $newUser->assignRole($role);

        return redirect()->route('userAdministration');
    }

    public function disableAccess(User $user)
    {
        $this->authorize('update', $user);
        $user->disable()->save();
        return Redirect::back();
    }
    public function enableAccess(User $user)
    {
        $this->authorize('update', $user);
        $user->enable()->save();
        return Redirect::back();
    }
    public function toggleAccess(User $user)
    {
        $this->authorize('update', $user);
        $user->toggleAccess()->save();
        return Redirect::back();
    }
    public function delete(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return Redirect::back();
    }

    public function edit(EditUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $validatedData = $request->validated();
        $role = array_pull($validatedData, 'role');

        $user->update($validatedData);

        if ($role) {
            $user->syncRoles([$role]);
        }

        return Redirect::back();
    }
}
