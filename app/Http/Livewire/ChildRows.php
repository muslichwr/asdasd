<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChildRows extends Component
{
    public $refOpdId;

    public function mount($refOpdId)
    {
        $this->refOpdId = $refOpdId;
    }

    
}
