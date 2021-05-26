<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covers extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cover', 
    ];    
}
