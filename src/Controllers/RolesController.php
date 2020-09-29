<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function create(Request $request)
    {
        if ($role = Role::where('name', $request->role_name)->first())
            return response('Role already exists', 400);
        if (!isset($request->role_name))
            return response('you should put role name', 400);

        Role::create([
            'name' => $request->role_name,
        ]);
        return response('Role created successfully', 200);
    }

    public function addUserRole(Request $request, $user_id)
    {
        if (!$user = User::where('id', $user_id)->first())
            return response('User Not found', 404);
        if (!$role = Role::where('name', $request->role_name)->first())
            return response('Role Not found', 404);

        $user->roles()->attach($role->id);
        return response('Role added to user successfully', 200);
    }

    public function removeUserRole(Request $request, $user_id)
    {
        if (!$user = User::where('id', $user_id)->first())
            return response('User Not found', 404);
        if (!$role = Role::where('name', $request->role_name)->first())
            return response('Role Not found', 404);

        $user->roles()->detach($role->id);
        return response('Role removed to user successfully', 200);
    }
}
