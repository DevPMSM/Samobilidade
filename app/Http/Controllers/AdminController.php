<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        //busca por palavra chave
        if($request->has('search')){
            $search = $request->get('search');
            $query->where('name', 'LIKE', "%$search%")
                ->orWhere('role', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%");
        }

        $users = $query->paginate(5);


        return view('admin.dashboard', compact("users"))->with('users', $users);
    }

    public function create()
    {
        $users = User::all();

        return view('admin.create_user', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'role' => ['required'],
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('users.index')->with('status', 'user-created');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.show_user', compact('user'));
    }

    public function edit(int $id)
    {
        $users = User::find($id);

        return view('admin.edit_user', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->fill($validatedData);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('users.index')->with('status', 'user-updated');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('status', 'user-deleted');
    }
}
