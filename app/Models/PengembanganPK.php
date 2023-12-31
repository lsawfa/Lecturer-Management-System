<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembanganPK extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $guarded = ['id'];
}
