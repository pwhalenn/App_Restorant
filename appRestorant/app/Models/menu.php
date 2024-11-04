<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'price',
        'availability',];
    
    protected $primaryKey = 'menu_id';
}
