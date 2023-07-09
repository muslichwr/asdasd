<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenTatakelola extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'dokumen_tatakelola';
    protected $fillable = ['dokumen_id', 'filepath', 'filename'];
    
    public function aplikasi()
    {
        return $this->belongsTo(Aplikasi::class);
    }

}
