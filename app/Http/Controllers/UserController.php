<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //
    public function index(): View
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit($user): View

    {
        $user = User::find($user);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $userRoles = Role::all()->pluck('name','name');

        return view('users.edit',compact('user','roles','userRole', 'userRoles'));
    }


    public function create(): View
    {
        return view('users.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $user->assignRole($request->role);

        event(new Registered($user));



        return redirect(route('users.index'));
    }


    public function update(Request $request, User $user): RedirectResponse
    {


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->syncRoles([]);

        $user->assignRole($request->role);




        $user->update($validated);
        return redirect(route('users.index'));
    }

    public function destroy(User $user): RedirectResponse
    {
//werkt nog niet



        $user->delete();



        return redirect(route('users.index'));
    }




}
