<?php

namespace App;

use App;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Contracts\Cache\Repository as Cache;

class Blog
{
    /**
     * The filesystem implementation.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The filesystem implementation.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * Create a new documentation instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
     * @return void
     */
    public function __construct(Filesystem $files, Cache $cache)
    {
        $this->files = $files;
        $this->cache = $cache;
    }

    public function getAll()
    {
        return $this->cache->remember("blog.all", 5, function() {
            return collect($this->files->allFiles(base_path('resources/blog')))
                ->filter(function($path) {
                    return Str::endsWith($path, '.md');
                })
                ->reject(function($path) {
                    return Str::startsWith($path->getFilename(), 'README');
                })
                ->map(function($path) {
                    $filename                  = Str::after($path, 'blog/');
                    [$date, $slug, $extension] = explode('.', $filename, 3);
                    $date                      = Carbon::createFromFormat('Y-m-d', $date);
                    $document                  = YamlFrontMatter::parse($this->files->get($path));

                    return (object) [
                        'path'      => $path->getPathName(),
                        'date'      => $date,
                        'year'      => $date->format('Y'),
                        'month'     => $date->format('m'),
                        'day'       => $date->format('d'),
                        'slug'      => $slug,
                        'url'       => route('blog.show', [$date->format('Y'), $date->format('m'), $slug]),
                        'title'     => $document->title,
                        'published' => $document->published,
                        'excerpt'   => (new Parsedown)->text($document->excerpt),
                        'content'   => (new Parsedown)->text($document->body()),
                    ];
                })
                ->filter(function($post) {
                    // Is the post published?
                    // And if not, are we working locally?
                    if (! App::environment('local')) {
                        return $post->published;
                    }

                    return true;
                })
                ->sortByDesc('date');
            });
    }

    public function get($year, $month, $slug)
    {
        return $this->cache->remember("blog.{$year}.{$month}.{$slug}", 5, function() use ($year, $month, $slug) {
            $post = $this->getAll()
                ->where('year', $year)
                ->where('month', $month)
                ->where('slug', $slug)
                ->first();

            if (! $post) {
                return null;
            }

            return $post;
        });
    }
}