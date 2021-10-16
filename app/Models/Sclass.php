<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sclass extends Model
{
    use HasFactory;
    protected $table = "sclassess";
    protected $fillable = [
        'class_name',
    ];
}
