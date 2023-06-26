<?php

namespace App\Http\Livewire;

use App\Models\Detailaplikasi as ModelsDetailaplikasi;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Detailaplikasi extends Component
{

    use WithPagination;

    public $selectedRowId = null;
    public $showChildRow = false;

    public function render()
    {
        $data = ModelsDetailaplikasi::all();

        return view('livewire.detailaplikasi', compact('data'));
    }

    public function toggleChildRow($rowId)
    {
    if ($this->selectedRowId === $rowId) {
        $this->selectedRowId = null;
        $this->showChildRow = false;
    } else {
        $this->selectedRowId = $rowId;
        $this->showChildRow = true;
    }
    }
}
