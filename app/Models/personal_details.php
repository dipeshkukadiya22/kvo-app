<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal_details extends Model
{
    use HasFactory;
    protected $table = 'personal_details';
    protected $primaryKey = 'p_id';
    public $timestamps = false;

    public function member()
    {
        return $this->belongsTo(add_members::class, 'p_id');
    }
}
