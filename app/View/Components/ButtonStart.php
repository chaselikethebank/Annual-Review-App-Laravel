<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonStart extends Component
{
    /**
     * The URL or route the button links to.
     *
     * @var string|null
     */
    public $href;

    /**
     * The type of button (e.g., "button" or "submit").
     *
     * @var string|null
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param string|null $href
     * @param string|null $type
     */
    public function __construct(string $href = null, string $type = 'button')
    {
        $this->href = $href;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-start');
    }
}
