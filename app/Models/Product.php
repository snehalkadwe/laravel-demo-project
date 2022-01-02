<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'product_name', 'cost', 'quantity'
    ];

    public function user()
    {
        return $this->belongsTo('User::class');
    }
}