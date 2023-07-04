<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    function index()
    {
        $socials = DB::table('socials')->get();
        foreach ($socials as $socialData) {
            $social = $socialData;
        }
        return view('admin.social.index', compact('socials', 'social'));
    }
    function store(Request $request)
    {
        $heros = DB::table('socials')->get();

        if ($heros->count() > 1) {
            return redirect()->back()->with("error", "Already Social added!please don't try");
        }

        $request->validate([
            'twitterLink' => 'required|max:300',
            'githubLink' => 'required|max:300',
            'linkedinLink' => 'required|max:300',
        ]);

        $about = DB::table('socials');
        $about->insert([
            'twitterLink' => $request->twitterLink,
            'githubLink' => $request->githubLink,
            'linkedinLink' => $request->linkedinLink,
        ]);

        return redirect()->back()->with('success', 'Social content is added successfully!');
    }

    function update(Request $request)
    {
        $request->validate([
            'twitterLink' => 'required|max:300',
            'githubLink' => 'required|max:300',
            'linkedinLink' => 'required|max:300',
        ]);

        DB::table('socials')->where('id', $request->id)
            ->update([
                'twitterLink' => $request->twitterLink,
                'githubLink' => $request->githubLink,
                'linkedinLink' => $request->linkedinLink,
            ]);

        return redirect()->back()->with('success', 'Social content has been updated successfully!');
    }
}
