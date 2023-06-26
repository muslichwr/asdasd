<?php

namespace App\Http\Livewire;

use App\Models\Detailaplikasi as ModelsDetailaplikasi;
use App\Models\ambilrefopdid as Modelsambilrefopdid;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Detailaplikasi extends Component
{
    use WithPagination;

    public function render()
    {
        $opds = Modelsambilrefopdid::with('aplikasis')->get();
        return view('livewire.detailaplikasi', compact('opds'));
    }

   
}
