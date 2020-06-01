<?php

namespace App;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Cache\Repository as Cache;

class Documentation
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

    /**
     * Get the documentation index page.
     */
    public function getIndex($version)
    {
        return $this->cache->remember('docs.'.$version.'.index', 5, function() use($version) {
            $path = base_path('resources/docs/'.$version.'/index.md');

            if ($this->files->exists($path)) {
                return $this->replaceLinks($version, (new Parsedown())->text($this->files->get($path)));
            }

            return null;
        });
    }

    public function get($version, $page)
    {
        return $this->cache->remember('docs.'.$version.'.'.$page, 5, function() use ($version, $page) {
            $path = base_path('resources/docs/'.$version.'/'.$page.'.md');

            if ($this->files->exists($path)) {
                return $this->replaceLinks($version, (new Parsedown)->text($this->files->get($path)));
            }

            return null;
        });
    }

    public static function replaceLinks($version, $content)
    {
        return str_replace('{{version}}', $version, $content);
    }

    public function sectionExists($version, $page)
    {
        return $this->files->exists(base_path('resources/docs/'.$version.'/'.$page.'.md'));
    }

    public function versionsContainingPage($page)
    {
        return collect(static::getDocVersions())
            ->filter(function($version) use ($page) {
                return $this->sectionExists($version, $page);
            });
    }

    public static function getDocVersions()
    {
        return [
            'master' => 'Master',
        ];
    }
}