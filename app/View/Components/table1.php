<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Controllers\PositionController;
class table1 extends Component
{
    public $rows;
    public $columns;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rows,$columns)
    {
        $this->rows = $rows;
        $this->columns =$columns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table1');
;
    }
}
