<?php

namespace App\Http\Controllers;

use App\Models\Classes; 
use Illuminate\Http\Request;
use App\Models\Coach;

class ClassController extends Controller
{
    // Display a listing of the classes
    public function index()
    {
        // Eager load the coach relationship
        $classesx = Classes::with('coach')->get();
        return view('admin.classes-list', compact('classesx'));
    }
    
    // public function userClasses()
    // {
    //     $classesx = Classes::all(); // Fetch all classes
    //     return view('index', compact('classesx')); // Return the view with the classes
    // }

    public function userClasses()
{
    $classesx = Classes::all(); // Fetch all classes
    return view('index', compact('classesx')); // Return the view with the classes
}



    public function show($id)
    {
        $class = Classes::with('coach')->findOrFail($id);
        return view('users.class_sub', compact('class'));
    }





    public function create()
    {
        $coaches = Coach::all(); // Fetch all coaches
        return view('admin.add-class', compact('coaches')); // Pass users and coaches to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'coach_id' => 'nullable|exists:coaches,id',
            'start_time' => 'required|date_format:H:i', // Validation for start time
            'end_time' => 'required|date_format:H:i',   // Validation for end time
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload'), $imageName);
        } else {
            $imageName = null; // No image uploaded
        }

        // تأكد من تخزين الاسم فقط في قاعدة البيانات
        Classes::create(array_merge($request->all(), ['image' => $imageName]));

        return redirect()->route('classes.index')->with('success', 'Class added successfully!');
    }



    // Show the form for editing the specified class
    public function edit(Classes $class)
    {
        $coaches = Coach::all();
        return view('admin.class-edit', compact('class', 'coaches'));
    }

    // Update the specified class
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
            'coach_id' => 'nullable|exists:coaches,id' // Validate coach exists in the coaches table
        ]);
    
        // Update class fields
        $class->name = $request->input('name');
        $class->description = $request->input('description');
        $class->price = $request->input('price');
        $class->date = $request->input('date');
        $class->coach_id = $request->input('coach_id'); // Update coach
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($class->image && file_exists(public_path('upload/' . $class->image))) {
                unlink(public_path('upload/' . $class->image));
            }
    
            // Store the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload'), $imageName);
    
            // Update the image path in the class
            $class->image = $imageName;
        }
    
        // Save the updated class
        $class->save();
    
        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }
    
    
    

    // Remove the specified class
    public function destroy(Classes $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }

    public function joinClass($classId)
{
    // Get the currently authenticated user
    $user = auth()->user();
    
    // Check if the user is authenticated
    if (!$user) {
        return redirect()->route('login')->with('error', 'You need to be logged in to join a class.');
    }

    // Check if the user is an admin
    if ($user->role === 'admin') { // Check if the user's role is 'admin'
        alert()->error('Error', 'Admins cannot join classes.');
        return redirect()->route('classes.index'); // Redirect back to the classes list or any other appropriate page
    }

    // Find the class by its ID
    $class = Classes::findOrFail($classId);

    // Check if the user has already joined this class
    if ($user->classes->contains($class->id)) {
        alert()->warning('Warning', 'You have already joined this class.');
        return redirect()->route('profile.show');
    }

    // Attach the class to the user (this will insert into the user_class table)
    $user->classes()->attach($class->id, [
        'joined_at' => now(),
    ]);

    // Save the user instance and return success
    alert()->success('Success', 'Successfully joined the class.');
    return redirect()->route('profile.show');
}


}
