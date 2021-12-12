<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextArea extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    /**
     * Textarea number of columns
     *
     * @var int
     */

    public $cols;


    /**
     * Textarea number of rows
     *
     * @var int
     */

    public $rows;

    public function __construct($cols = 50, $rows = 5)
    {
        $this->cols = $cols;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-area');
    }
}
