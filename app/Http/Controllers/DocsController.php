<?php

namespace App\Http\Controllers;

use App\Documentation;
use Symfony\Component\DomCrawler\Crawler;

class DocsController extends Controller
{
    /**
     * @var \App\Documentation
     */
    protected $docs;

    /**
     * Create a new DocsController instance.
     *
     * @param  \App\Documentation  $docs
     */
    public function __construct(Documentation $docs)
    {
        $this->docs = $docs;
    }

    /**
     * Redirect to the default version documentation.
     */
    public function index()
    {
        return redirect('docs/'.DEFAULT_VERSION);
    }

    /**
     * Show the specified documentation if specified, otherwise
     * load the Getting Started page.
     *
     * @param  string  $version
     * @param  string|null  $page
     */
    public function show($version, $page = null)
    {
        if (! $this->isVersion($version)) {
            return redirect('docs/'.DEFAULT_VERSION.'/'.$version, 301);
        }

        if (! defined('CURRENT_VERSION')) {
            define('CURRENT_VERSION', $version);
        }

        $page    = $page ?: 'getting-started';
        $content = $this->docs->get($version, $page);

        if (is_null($content)) {

        }

        $title = (new Crawler($content))->filterXPath('//h1');

        $section   = '';

        if ($this->docs->sectionExists($version, $page)) {
            $section .= '/'.$page;
        } elseif (! is_null($page)) {
            return redirect('/docs/'.$version);
        }

        $canonical = null;

        if ($this->docs->sectionExists(DEFAULT_VERSION, $page)) {
            $canonical = 'docs/'.DEFAULT_VERSION.'/'.$page;
        }

        return view('docs', [
           'title'          => count($title) ? $title->text() : null,
           'index'          => $this->docs->getIndex($version),
           'content'        => $content,
           'currentVersion' => $version,
           'versions'       => Documentation::getDocVersions(),
           'currentSection' => $section,
           'canonical'      => $canonical,
        ]);
    }

    /**
     * Determine if the provided version is valid.
     *
     * @param  string  $version
     * @return bool
     */
    protected function isVersion($version)
    {
        return array_key_exists($version, Documentation::getDocVersions());
    }
}