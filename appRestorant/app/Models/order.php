<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'menu_id',
        'quantity',
        'status',
        'order_date',
        'created_at',
        'updated_at',];
    
        protected $primaryKey = 'order_id';

        // If your primary key is not an auto-incrementing integer, set this to false
        public $incrementing = true;

        public function customer()
        {
            return $this->belongsTo(Customer::class);
        }

    
}
