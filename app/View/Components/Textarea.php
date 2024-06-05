<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $id;
    public $rows;
    public $cols;
    public $class;

    public function __construct($name, $id = null, $rows = 10, $cols = 30, $class = 'form-control')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->rows = $rows;
        $this->cols = $cols;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.textarea');
    }
}