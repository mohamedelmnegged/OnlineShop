<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkout';
    protected $fillable = ['email', 'name', 'address', 'city', 'provance', 'postal', 'phone', 'nameOnCard', 'credit', 'user_id'];

}
