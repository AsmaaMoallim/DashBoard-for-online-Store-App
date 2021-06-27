<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Controllers\PositionController;
class tableComponentes extends Component
{
    public $rows;
    public $columns;
    public $tables;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rows,$columns,$tables)
    {
        $this->rows = $rows;
        $this->columns =$columns;
        $this->tables =$tables;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tableComponentes');
;
    }
}
