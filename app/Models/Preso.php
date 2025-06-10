<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Preso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'documento_identidade',
        'data_nascimento',
        'crime',
        'data_condenacao',
        'status',
        'cela_id',
    ];

    public function cela()
    {
        return $this->belongsTo(Cela::class);
    }
}
