<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminContactController extends Controller
{
    function index()
    {
        $contacts = DB::table('contacts')->latest()->paginate(5);
        return view('admin.contact.index', compact('contacts'));
    }
    // function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|max:100',
    //         'previewLink' => 'required|max:300',
    //         'thumbnailLink' => 'required|max:300',
    //         'details' => 'required',
    //     ]);

    //     $project = DB::table('projects');
    //     $project->insert([
    //         'title' => $request->title,
    //         'previewLink' => $request->previewLink,
    //         'thumbnailLink' => $request->thumbnailLink,
    //         'details' => $request->details,
    //     ]);

    //     return redirect()->back()->with('success', 'Contact content is added successfully!');
    // }
    function view($id)
    {
        $contact = DB::table('contacts')->find($id);

        if($contact->is_read == 0)
        {
            $contactRead = DB::table('contacts')->where('id', $id)
            ->update([
                'is_read' => 1
            ]);
        }

        return view('admin.contact.view', compact('contact'));
    }
    function destroy($id)
    {
        $contact = DB::table('contacts')->where('id', $id);
        $contact->delete();

        return redirect()->back()->with('success', 'Contact has been deleted successfully!');
    }
}
