<?php

namespace App\View\Components\User\Pages\User;

use Illuminate\View\Component;

class All extends Component
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
        return view('components.user.pages.user.all');
    }
}
