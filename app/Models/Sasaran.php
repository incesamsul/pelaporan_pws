<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    use HasFactory;
    protected $table = 'sasaran';
    protected $guarded = [''];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten', '');
    }
}
