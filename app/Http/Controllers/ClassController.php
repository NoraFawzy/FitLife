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
        $classesx = Classes::all();
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

        return redirect()->route('classes.user')->with('success', 'Class added successfully!');
    }



    // Show the form for editing the specified class
    public function edit(Classes $class)
    {
        return view('admin.class-edit', compact('class')); // Ensure you have this view
    }

    // Update the specified class
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $class->update($request->all());
        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    // Remove the specified class
    public function destroy(Classes $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
