<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{    use HasFactory;
    protected $fillable = [
        'user_id',
        'about',
        'name1',
        'Photo1', 
        'name2', 
        'Photo2',
    ];    
}
