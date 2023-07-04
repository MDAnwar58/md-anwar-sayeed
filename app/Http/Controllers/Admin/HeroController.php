<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;

class HeroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index()
    {
        $heros = DB::table('heroproperties')->get();
        foreach ($heros as $heroData) {
            $hero = $heroData;
        }
        return view('admin.hero.index', compact('heros', 'hero'));
    }
    function store(Request $request)
    {
        $heros = DB::table('heroproperties')->get();

        if ($heros->count() > 0) {
            return redirect()->back()->with("error", "Already hero added!please don't try");
        }

        $request->validate([
            'keyLine' => 'required|max:100',
            'title' => 'required|max:100',
            'short_title' => 'required|max:100',
            'img' => 'required|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-hero-' . $extension;
            $file->move('upload/images/hero', $filename);
        }

        $hero = DB::table('heroproperties');
        $hero->insert([
            'keyLine' => $request->keyLine,
            'title' => $request->title,
            'short_title' => $request->short_title,
            'img' => $filename,
        ]);

        return redirect()->back()->with('success', 'Hero content is added successfully!');
    }

    function update(Request $request)
    {
        $request->validate([
            'keyLine' => 'required|max:100',
            'title' => 'required|max:100',
            'short_title' => 'required|max:100',
            'img' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);

        $hero = DB::table('heroproperties')->find($request->id);

        if ($request->hasFile('img')) {
            $file_path = public_path() . '/upload/images/hero/' . $hero->img;

            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-heroUpdate-' . $extension;
            $file->move('upload/images/hero', $filename);
        }

        DB::table('heroproperties')->where('id', $request->id)
            ->update([
                'keyLine' => $request->keyLine,
                'title' => $request->title,
                'short_title' => $request->short_title,
                'img' => $filename,
            ]);

        return redirect()->back()->with('success', 'Hero has been updated successfully!');
    }
}
