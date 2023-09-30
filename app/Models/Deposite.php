<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposite extends Model
{
    protected $table = 'booking_deposite';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
