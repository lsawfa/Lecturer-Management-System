<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendamping extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $guarded = ['id'];
}
