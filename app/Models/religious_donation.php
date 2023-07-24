<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class religious_donation extends Model
{
    use HasFactory;
    protected $table = 'religious_donation';
    protected $primaryKey = 'religious_donation_id';
    public $timestamps = false;

    public function member()
    {
        return $this->belongsTo(add_members::class, 'religious_donation_id');
    }
}
