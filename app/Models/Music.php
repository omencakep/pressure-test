<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $table='music';
    protected $primaryKey='id';
    protected $fillable = [
        'album_id',
        'title',
        'duration',
    ];
}
