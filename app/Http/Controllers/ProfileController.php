<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */


    public function user()
    {

        $users = User::all();
        return view('profile.user', ['users' => $users]);
    }

    public function create()
    {
        return view('profile.createUser');
    }

    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique($request->user()->getTable())->ignore($request->user()->id),
            ],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return Redirect::route('user')->with('status', 'profile-updated');
    }



    public function edit(Request $request): View
    {
        return view('profile.editUser', [
            'user' => $request->user(),
        ]);
    }
    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique($request->user()->getTable())->ignore($request->user()->id),
            ],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        $user = $request->user();
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return Redirect::route('user')->with('status', 'profile-updated');
    }


    public function permssion($id): View
    {
        $user = User::find($id);
        return view('profile.userPermission', ['user' => $user]);
    }

    public function updatePermission(Request $request, $id): RedirectResponse
    {
        dd("permissions");
        $user = User::find($id);
        $user->role = $request->input('role');
        $user->save();

        return Redirect::route('user')->with('status', 'permission-updated');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        if ((int) Auth::id() === (int) $id) {
            return Redirect::route('user')->with('error', 'You cannot delete your own account.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return Redirect::route('user')->with('success', 'User deleted successfully.');
    }
}
