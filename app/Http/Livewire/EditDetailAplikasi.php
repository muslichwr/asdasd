<?php

namespace App\Http\Livewire;

use App\Models\aplikasi;
use App\Models\Detailaplikasi;
use Livewire\Component;

class EditDetailAplikasi extends Component
{
    public $successMessage;
    public $errorMessage;
    public $aplikasi;
    public $aplikasi_id;
    public $detailaplikasi;
    public $activeTab = 'detailaplikasi';
    public $no_asset;
    public $hostname;
    public $ipaddress;
    public $ref_status_id;
    public $keterangan;
    public $tgl_launching;
    public $namaEksternal;
    public $lokasi;
    

       
    public function mount($id)
    {
        $aplikasi = aplikasi::where('id', $id)->first();
        $this->aplikasi_id = $aplikasi->aplikasi_id;
        $this->hostname = $aplikasi->hostname;
        
    }


    public function save()
    {
        // Logic to save the updated data for the application with $this->appId
        
        try {
            // Save the data
            
            // Show success message
            $this->successMessage = 'Data updated successfully.';
        } catch (\Exception $e) {
            // Handle the error
            
            // Show error message
            $this->errorMessage = 'Failed to update data. Please try again.';
        }
    }
    public function render()
{
    return view('livewire.edit-detail-aplikasi')
        ->layout('admin.template')
        ->with([
            'aplikasi' => $this->aplikasi,
            'no_asset' => $this->no_asset,
            'hostname' => $this->hostname,
            'namaEksternal' => $this->namaEksternal,
            'lokasi' => $this->lokasi,
        ]);
}
}
