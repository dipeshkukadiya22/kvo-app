<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_bookings extends Model
{
    use HasFactory;
    protected $table = 'personal_details';
    protected $primaryKey = 'p_id';
    public $timestamps = false;
}
