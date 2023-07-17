<?php

namespace App\View\Components\Front;

use Illuminate\View\Component;

class InputLabel extends Component
{
    public $compoData = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($compoData)
    {
        $this->compoData = $compoData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.input-label');
    }
}
