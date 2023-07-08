<?php

namespace App\Models;

use App\Models\Detailaplikasi as ModelsDetailaplikasi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ambilrefopdid extends Model
{
    use HasFactory;

    protected $table = 'ref_opd';

    public $timestamps = false;
}
