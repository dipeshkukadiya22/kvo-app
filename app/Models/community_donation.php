<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class community_donation extends Model
{
    use HasFactory;
    protected $table = 'community_donation';
    protected $primaryKey = 'donation_id';
    public $timestamps = false;

    public function member()
    {
        return $this->belongsTo(add_members::class, 'donation_id');
    }
}
