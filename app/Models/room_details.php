<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_details extends Model
{
    use HasFactory;
    protected $table = 'room_details';
    protected $primaryKey = 'r_id';
    public $timestamps = false;
    public function member()
    {
        return $this->belongsTo(room_details::class, 'r_id');
    }
}
