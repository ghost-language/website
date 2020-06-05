<?php

namespace App\View\Components;

use App\Documentation;
use Illuminate\View\Component;

class Sidebar extends Component
{
     protected $docs;

    public function __construct(Documentation $docs)
    {
        $this->docs = $docs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $index = $this->docs->getIndex(DEFAULT_VERSION);

        return view('components.sidebar', compact('index'));
    }
}
