<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    function index()
    {
        $educations = DB::table('educations')->latest()->paginate(5);
        return view('admin.education.index', compact('educations'));
    }
    function store(Request $request)
    {
        $request->validate([
            'duration' => 'required|max:50',
            'institutionName' => 'required|max:50',
            'field' => 'required|max:200',
            'details' => 'required',
        ]);

        $about = DB::table('educations');
        $about->insert([
            'duration' => $request->duration,
            'institutionName' => $request->institutionName,
            'field' => $request->field,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'Education content is added successfully!');
    }
    function edit($id)
    {
        $education = DB::table('educations')->find($id);
        return view('admin.education.edit', compact('education'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'duration' => 'required|max:50',
            'institutionName' => 'required|max:50',
            'field' => 'required|max:200',
            'details' => 'required',
        ]);

        DB::table('educations')->where('id', $id)
            ->update([
                'duration' => $request->duration,
                'institutionName' => $request->institutionName,
                'field' => $request->field,
                'details' => $request->details,
            ]);

        return redirect()->route('admin.education')->with('success', 'Education content has been updated successfully!');
    }

    function destroy($id)
    {
        $experience = DB::table('educations')->where('id', $id);
        $experience->delete();

        return redirect()->back()->with('success', 'Education has been deleted successfully!');
    }
}
