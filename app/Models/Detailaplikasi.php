<?php

namespace App\Models;
use App\Models\ambilrefopdid as Modelsambilrefopdid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailaplikasi extends Model
{
    use HasFactory;

    protected $table = 'aplikasi';

    public function opds()
    {
        return $this->belongsTo(Modelsambilrefopdid::class, 'ref_opd_id');
    }
}
