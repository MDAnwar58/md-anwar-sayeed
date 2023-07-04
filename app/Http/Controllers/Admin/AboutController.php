<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    function index()
    {
        $abouts = DB::table('abouts')->get();
        foreach ($abouts as $aboutData) {
            $about = $aboutData;
        }
        return view('admin.about.index', compact('abouts', 'about'));
    }

    function store(Request $request)
    {
        $heros = DB::table('abouts')->get();

        if ($heros->count() > 0) {
            return redirect()->back()->with("error", "Already hero added!please don't try");
        }

        $request->validate([
            'title' => 'required|max:100',
            'details' => 'required',
        ]);

        $about = DB::table('abouts');
        $about->insert([
            'title' => $request->title,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'About content is added successfully!');
    }

    function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'details' => 'required',
        ]);

        DB::table('abouts')->where('id', $request->id)
            ->update([
                'title' => $request->title,
                'details' => $request->details,
            ]);

        return redirect()->back()->with('success', 'About content has been updated successfully!');
    }
}
