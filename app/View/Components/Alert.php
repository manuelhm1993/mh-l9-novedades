<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    // ---------------- Las propiedades deben ser públicas
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color = 'gray')
    {
        // ---------------- Rescatar el valor color y establecerlo
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
