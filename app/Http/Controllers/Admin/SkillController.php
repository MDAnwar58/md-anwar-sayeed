<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    function index()
    {
        $skills = DB::table('skills')->latest()->paginate(5);
        return view('admin.skill.index', compact('skills'));
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $about = DB::table('skills');
        $about->insert([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Skill content is added successfully!');
    }
    function edit($id)
    {
        $skill = DB::table('skills')->find($id);
        return view('admin.skill.edit', compact('skill'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        DB::table('skills')->where('id', $id)
            ->update([
                'name' => $request->name,
            ]);

        return redirect()->route('admin.skill')->with('success', 'Skill content has been updated successfully!');
    }

    function destroy($id)
    {
        $skill = DB::table('skills')->where('id', $id);
        $skill->delete();

        return redirect()->back()->with('success', 'Skill has been deleted successfully!');
    }
}
