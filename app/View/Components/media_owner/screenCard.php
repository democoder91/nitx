<?php

namespace App\View\Components\media_owner;

use Illuminate\View\Component;

class screenCard extends Component
{
    public $status;
    public $name;
    public $id;
    public $type;
    public $sequence;

    public function __construct($status, $name, $id, $type, $sequence)
    {
        $this->status = $status;
        $this->name = $name;
        $this->id = $id;
        $this->type = $type;
        $this->sequence = $sequence;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.media_owner.screen-card');
    }
}
