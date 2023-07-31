<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_room extends Model
{
    use HasFactory;
    protected $table = 'add_room';
    protected $primaryKey = 'room_no';
    public $timestamps = false;
}
