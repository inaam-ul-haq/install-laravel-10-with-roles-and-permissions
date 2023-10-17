<?php

namespace App\View\Components\Front;

use Illuminate\View\Component;

class InputButton extends Component
{
    public $btnClass = null;
    public $btnType = null;
    public $btnValue = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($btnClass = null, $btnType, $btnValue)
    {
        $this->btnClass = $btnClass;
        $this->btnType = $btnType;
        $this->btnValue = $btnValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.input-button');
    }
}
