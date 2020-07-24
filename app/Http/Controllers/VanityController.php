<?php

namespace App\Http\Controllers;

class VanityController extends Controller
{
    /**
     * Show the blog index page.
     */
    public function __invoke()
    {
        $project    = request('project');
        $repository = config('ghost.repositories.'.$project);

        if (! $repository) {
            abort(404);
        }

        return view('vanity', compact('repository', 'project'));
    }
}