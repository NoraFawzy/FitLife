<?php

namespace App\Http\Controllers;
use Laracasts\Flash\Flash; // Import the Flash class

use App\Models\User_Class;
use Illuminate\Http\Request;

class UserClassController extends Controller
{
    // Store a newly created user-class relationship in storage
    public function store(Request $request)
    {
        $user = auth()->user(); // Get the authenticated user

        $request->validate([
            'class_id' => 'required|exists:classes,id',
        ]);

        // Check if the user is already enrolled in the class
        $enrollmentExists = User_Class::where('user_id', $user->id)
            ->where('class_id', $request->class_id)
            ->exists();

        if ($enrollmentExists) {
            alert()->warning('fail', 'You are already enrolled in this class');
            return redirect()->back();
        }

        // Create the new enrollment
        User_Class::create([
            'user_id' => $user->id,
            'class_id' => $request->class_id,
        ]);
        alert()->success('success', 'You have just enrolled in this class');

        return redirect()->back()->with('success', 'You have been enrolled in the class successfully.');
    }
}

