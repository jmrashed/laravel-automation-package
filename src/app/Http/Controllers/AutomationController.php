<?php

namespace Jmrashed\Automation\App\Http\Controllers;

use Jmrashed\Automation\App\Http\Controllers\Controller;

class AutomationController extends Controller
{

    public function __construct()
    {
        $this->middleware('automation');
    }
    public function index()
    {
        $data = [];
        $data['title'] = 'Automation Title';

        return view('automation::automations.automations', compact('data'));
    }

    public function show()
    {
        //
    }

    public function store()
    {
        // Let's assume we need to be authenticated
        // to create a new post
        if (!auth()->check()) {
            abort(403, 'Only authenticated users can create new posts.');
        }

        request()->validate([
            'status_id' => 'required',
        ]);

        // Assume the authenticated user is the post's author
        $author = auth()->user();

        $post = $author->posts()->create([
            'status_id'     => request('status_id'),
        ]);

        return redirect()->back();
    }
}
