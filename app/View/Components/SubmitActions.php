<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubmitActions extends Component
{
    public $isEdit;
    public $value;
    public $cancelHref;

    /**
     * Create a new component instance.
     */
    public function __construct($isEdit = false, $value = null, $cancelHref = null)
    {
        $this->isEdit = $isEdit;
        $this->value = $value;
        $this->cancelHref = $cancelHref;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.submit-actions');
    }
}
