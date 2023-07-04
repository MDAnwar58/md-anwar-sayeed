<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperienceController extends Controller
{
    function index()
    {
        $experiences = DB::table('experiences')->latest()->paginate(5);
        return view('admin.experience.index', compact('experiences'));
    }

    function store(Request $request)
    {
        $request->validate([
            'duration' => 'required|max:50',
            'title' => 'required|max:50',
            'designation' => 'required|max:200',
            'details' => 'required',
        ]);

        $about = DB::table('experiences');
        $about->insert([
            'duration' => $request->duration,
            'title' => $request->title,
            'designation' => $request->designation,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'Experience content is added successfully!');
    }
    function edit($id)
    {
        $experience = DB::table('experiences')->find($id);
        return view('admin.experience.edit', compact('experience'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'duration' => 'required|max:50',
            'title' => 'required|max:50',
            'designation' => 'required|max:200',
            'details' => 'required',
        ]);

        DB::table('experiences')->where('id', $id)
            ->update([
                'duration' => $request->duration,
                'title' => $request->title,
                'designation' => $request->designation,
                'details' => $request->details,
            ]);

        return redirect()->route('admin.experience')->with('success', 'Experience content has been updated successfully!');
    }

    function destroy($id)
    {
        $experience = DB::table('experiences')->where('id', $id);
        $experience->delete();

        return redirect()->back()->with('success', 'Experience has been deleted successfully!');
    }
}
