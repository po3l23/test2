<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all milestones
        $milestones = Milestone::all();
        return view('milestones.index', compact('milestones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('milestones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:personal,work',
            'due_date' => 'nullable|date',
        ]);

        Milestone::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'due_date' => $request->due_date,
            'completed' => false,
        ]);

        return redirect()->route('milestones.index')->with('success', 'Milestone added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        return view('milestones.show', compact('milestone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        return view('milestones.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:personal,work',
            'due_date' => 'nullable|date',
            'completed' => 'boolean',
        ]);

        $milestone->update($request->all());

        return redirect()->route('milestones.index')->with('success', 'Milestone updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        $milestone->delete();

        return redirect()->route('milestones.index')->with('success', 'Milestone deleted successfully!');
    }
}
