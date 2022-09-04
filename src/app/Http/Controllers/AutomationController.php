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

        return view('automation::automations.index', compact('data'));
    }
    public function dashboard()
    {
        $data = [];
        $data['title'] = 'Automation Dashboard';
        $data['breadcumb'] = [
            [
                'url' => route('automations.index'),
                'text' => 'Automation'
            ],
            [
                'url' => route('automations.dashboard'),
                'text' => 'Dashboard'
            ],
        ];

        return view('automation::automations.dashboard', compact('data'));
    }
    function update_env($data = []): void
    {

        $path = base_path('.env');

        if (file_exists($path)) {
            foreach ($data as $key => $value) {
                file_put_contents($path, str_replace(
                    $key . '=' . env($key),
                    $key . '=' . $value,
                    file_get_contents($path)
                ));
            }
        }
    }
    public function env()
    {
        $data = [];
        $data['title'] = 'Automation Dashboard';
        $data['breadcumb'] = [
            [
                'url' => route('automations.index'),
                'text' => 'Automation'
            ],
            [
                'url' => route('automations.env'),
                'text' => 'ENV'
            ],
        ];


        $data['env'] = file_get_contents(base_path('.env'));


        return view('automation::automations.env', compact('data'));
    }
    public function models()
    {
        $data = [];
        $data['title'] = 'Automation models';
        $data['breadcumb'] = [
            [
                'url' => route('automations.index'),
                'text' => 'Automation'
            ],
            [
                'url' => route('automations.models'),
                'text' => 'models'
            ],
        ];
        $modelPath = base_path('app/Models');
        $files = scandir($modelPath);
        $files = array_diff(scandir($modelPath), array('.', '..'));


        $filebooks = [];

        foreach ($files as $file) {
            $path = $modelPath . "/" . $file;
            $pathinfo = pathinfo($path);
            $filebooks[$file]['basename'] = $pathinfo['basename'];
            $filebooks[$file]['extension'] = $pathinfo['extension'];
            $filebooks[$file]['filename'] = $pathinfo['filename'];
            $filebooks[$file]['filesize'] = filesize($path);
            $filebooks[$file]['filemtime'] = filemtime($path);
            $filebooks[$file]['fileperms'] =  substr(sprintf('%o', fileperms($path)), -4);
        }

        $data['models'] = $filebooks;

        return view('automation::automations.models', compact('data'));
    }
    public function migrations()
    {
        $data = [];
        $data['title'] = 'Automation migrations';
        $data['breadcumb'] = [
            [
                'url' => route('automations.index'),
                'text' => 'Automation'
            ],
            [
                'url' => route('automations.migrations'),
                'text' => 'migrations'
            ],
        ];
        $modelPath = base_path('database/migrations');
        $files = scandir($modelPath);
        $files = array_diff(scandir($modelPath), array('.', '..'));


        $filebooks = [];

        foreach ($files as $file) {
            $path = $modelPath . "/" . $file;
            $pathinfo = pathinfo($path);
            $filebooks[$file]['basename'] = $pathinfo['basename'];
            $filebooks[$file]['extension'] = $pathinfo['extension'];
            $filebooks[$file]['filename'] = $pathinfo['filename'];
            $filebooks[$file]['filesize'] = filesize($path);
            $filebooks[$file]['filemtime'] = filemtime($path);
            $filebooks[$file]['fileperms'] =  substr(sprintf('%o', fileperms($path)), -4);
        }

        $data['migrations'] = $filebooks;

        return view('automation::automations.migrations', compact('data'));
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
