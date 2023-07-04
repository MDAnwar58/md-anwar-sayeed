<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    function index()
    {
        $languages = DB::table('languages')->latest()->paginate(5);
        return view('admin.language.index', compact('languages'));
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $about = DB::table('languages');
        $about->insert([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Language content is added successfully!');
    }
    function edit($id)
    {
        $language = DB::table('languages')->find($id);
        return view('admin.language.edit', compact('language'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        DB::table('languages')->where('id', $id)
            ->update([
                'name' => $request->name,
            ]);

        return redirect()->route('admin.language')->with('success', 'Language content has been updated successfully!');
    }

    function destroy($id)
    {
        $language = DB::table('languages')->where('id', $id);
        $language->delete();

        return redirect()->back()->with('success', 'Language has been deleted successfully!');
    }
}
