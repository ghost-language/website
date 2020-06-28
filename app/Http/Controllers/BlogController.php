<?php

namespace App\Http\Controllers;

use App\Blog;

class BlogController extends Controller
{
    /**
     * @var \App\Blog
     */
    protected $blog;

    /**
     * Create a new BlogController instance.
     *
     * @param  \App\Blog  $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Show the blog index page.
     */
    public function index()
    {
        $posts = $this->blog->getAll();
        $post  = $posts->first();
        $posts = $posts->groupBy('year')->map(function($posts) {
            return $posts->groupBy('month');
        });

        return view('blog.index', compact('post', 'posts'));
    }

    /**
     * Show the specific blog post page.
     */
    public function show($year, $month, $slug)
    {
        $post = $this->blog->get($year, $month, $slug);

        if (! $post) {
            abort(404);
        }

        $posts = $this->blog->getAll()->groupBy('year')->map(function($posts) {
            return $posts->groupBy('month');
        });

        return view('blog.show', compact('post', 'posts'));
    }
}