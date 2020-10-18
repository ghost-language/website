<?php

namespace App\Http\Controllers;

use App\Blog;

class BlogFeedController extends Controller
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
    public function __invoke()
    {
        $posts = $this->blog->getAll();
        $feed  = [
            'version'       => 'https://jsonfeed.org/version/1.1',
            'title'         => 'Ghost Blog',
            'home_page_url' => url('/'),
            'feed_url'      => url('blog.json'),
            'items'         => $posts->map(function($post) {
                return [
                    'id'             => $post->slug,
                    'title'          => $post->title,
                    'url'            => $post->url,
                    'content_html'   => $post->content,
                    'date_published' => $post->date->toAtomString(),
                ];
            })
        ];

        return response()->view('blog.feed', compact('feed'), 200)
            ->header('Content-Type', 'application/json;charset=UTF-8')
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Credentials', 'true');
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