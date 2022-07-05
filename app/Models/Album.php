<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table='album';
    protected $primaryKey='id';
    protected $fillable = [
        'musician_id',
        'title',
    ];

    // public function musician()
    // {
    //     return $this->belongsTo('App\Models\Musician', 'musician_id', 'id');
    // }
}
