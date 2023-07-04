<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProjectController extends Controller
{
    function index()
    {
        $projects = DB::table('projects')->latest()->paginate(5);
        return view('admin.project.index', compact('projects'));
    }
    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'previewLink' => 'required|max:300',
            'thumbnailLink' => 'required|max:300',
            'details' => 'required',
        ]);

        $project = DB::table('projects');
        $project->insert([
            'title' => $request->title,
            'previewLink' => $request->previewLink,
            'thumbnailLink' => $request->thumbnailLink,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'Project content is added successfully!');
    }
    function edit($id)
    {
        $project = DB::table('projects')->find($id);
        return view('admin.project.edit', compact('project'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'previewLink' => 'required|max:300',
            'thumbnailLink' => 'required|max:300',
            'details' => 'required',
        ]);

        DB::table('projects')->where('id', $id)
            ->update([
                'title' => $request->title,
                'previewLink' => $request->previewLink,
                'thumbnailLink' => $request->thumbnailLink,
                'details' => $request->details,
            ]);

        return redirect()->route('admin.project')->with('success', 'Project content has been updated successfully!');
    }

    function destroy($id)
    {
        $project = DB::table('projects')->where('id', $id);
        $project->delete();

        return redirect()->back()->with('success', 'Project has been deleted successfully!');
    }
}
