<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tale_number',
        'contact',
        'created_at',
        'updated_at',];
    
    protected $primaryKey = 'customer_id';
}
