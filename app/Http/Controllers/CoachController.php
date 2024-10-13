<?php
namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::all();
        return view('admin.coaches-list', compact('coaches'));
    }

    public function create()
    {
        return view(view: 'admin.add-coach');
    }


    public function show(Coach $coach)
    {
        return view('admin.coaches-list', compact('coach'));
    }

    public function edit(Coach $coach)
    {
        return view('admin.coaches-edit', compact('coach'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'experience' => 'required|string', // Change to string for paragraphs
            
        ]);

        Coach::create($request->all());
        return redirect()->route('admin.coaches-list')->with('success', 'Coach created successfully.');
    }

    public function update(Request $request, Coach $coach)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'experience' => 'required|string', // Change to string for paragraphs
        ]);

        $coach->update($request->all());
        return redirect()->route('coaches.index')->with('success', 'Coach updated successfully.');
    }


    public function destroy(Coach $coach)
    {
        $coach->delete();
        return redirect()->route('coaches.index')->with('success', 'Coach deleted successfully.');
    }
}
