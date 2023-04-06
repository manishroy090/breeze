<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $tablename = "menus";
    protected $primarykey = "menuid";
    protected $fillable = [
        'menuid',
        'menu',
        'menulinks'
    ];
    use HasFactory;
}
