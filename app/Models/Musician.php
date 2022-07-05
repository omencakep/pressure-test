<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    use HasFactory;
    protected $table='musician';
    protected $primaryKey='id';
    protected $fillable = [
        'name',
    ];
}
