<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;

class RoleConroller extends Controller
{
    public function createRole()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        return 'Role created successfully';
    }

    public function assignRole()
    {
        $admin = User::find(1);
        $admin->assignRole('admin');

        $user = User::find(2);
        $user->assignRole('user');
        return 'Role assigned successfully';
    }
}
