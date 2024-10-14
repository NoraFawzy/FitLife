<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $users = User::where('email', 'LIKE', "%{$search}%")->get();
        } else {
            $users = User::with('plan')->orderBy('id', 'asc')->get(); 
        }
        return view('admin.users-list', compact('users'));
    }


    public function create()
    {
        $plans = Plan::all();
        return view('users.create', compact('plans')); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
            'plan_id' => 'nullable|exists:plans,id',
            'gender' => ['required', 'string', 'in:male,female'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'plan_id' => $request->plan_id,
            'gender' => $request->gender, 
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully.');
    }

    public function show($id)
    {
        $user = User::with('plan')->findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $plans = Plan::all(); 
        return view('users.edit', compact('user', 'plans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string',
            'plan_id' => 'nullable|exists:plans,id',
            'gender' => 'required|string|in:male,female', 
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'plan_id' => $request->plan_id,
            'gender' => $request->gender, 
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
