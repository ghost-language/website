<?php

namespace App\Http\Controllers;

use App\Documentation;
use Symfony\Component\DomCrawler\Crawler;

class DocsController extends Controller
{
    protected $docs;

    public function __construct(Documentation $docs)
    {
        $this->docs = $docs;
    }

    public function index()
    {
        return redirect('docs/'.DEFAULT_VERSION);
    }

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

    protected function isVersion($version)
    {
        return array_key_exists($version, Documentation::getDocVersions());
    }
}