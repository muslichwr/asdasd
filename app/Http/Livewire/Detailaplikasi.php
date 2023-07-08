<?php

namespace App\Http\Livewire;

use App\Models\Detailaplikasi as ModelsDetailaplikasi;
use App\Models\ambilrefopdid as Modelsambilrefopdid;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Detailaplikasi extends Component
{
    public function render()
    {
        $refOpds = Modelsambilrefopdid::all(); // Replace with your RefOpds model
        $aplikasis = ModelsDetailaplikasi::all(); // Replace with your RefOpds model


        return view('livewire.detailaplikasi', compact('refOpds', 'aplikasis'));
    }
}