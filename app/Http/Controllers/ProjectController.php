<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $projects = Portfolio::latest()->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form to create a new project.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store the new project.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        // Save project
        Portfolio::create([
            'title' => $request->title,
            'description' => $request->description,
            'project_url' => $request->project_url,
            'image_path' => $imagePath ?? null,
            'status' => $request->status,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function update(Request $request, $id) 
    {
        $project = Portfolio::findOrFail($id);

        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'project_url' => 'nullable|url',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:draft,published',
        ]);

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image_path = $imagePath;
        }
        
        $project->title = $request->title;
        $project->description = $request->description;
        $project->project_url = $request->project_url;
        $project->status = $request->status;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    public function edit($id)
    {
        $project = Portfolio::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function destroy($id)
    {
        $project = Portfolio::findOrFail($id);

        // Optional: delete image file if needed
        if ($project->image_path && \Storage::disk('public')->exists($project->image_path)) {
            \Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }


}
